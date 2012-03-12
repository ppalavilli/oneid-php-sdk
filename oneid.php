<?php

$oneid_server = "https://keychain.oneid.com";

// Set your values here
$oneid_api_id = "00010001-a6ca-4ece-9d74-0f97f63fac4d";
$oneid_api_key = "xxx";
$oneid_referral_code = "yyy";
$oneid_script = '<script src="https://my.oneid.com/api/js/includeexternal.js" type="text/javascript"></script>';

function _call_OneID($method, $post = null) {
  global $oneid_server, $oneid_api_id, $oneid_api_key;

  //$scope = "/repo";
  $scope = "";
  $ch = curl_init($oneid_server . $scope. "/" . $method);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERPWD, $oneid_api_id . ":" . $oneid_api_key);

  if ($post !== null) {
    curl_setopt($ch, CURLOPT_POST, 1);                                                                             
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);  
  }
  $json = curl_exec($ch);
  curl_close($ch);

  return json_decode($json, true);
}

function OneID_SetCredentials($id, $key) {
  global $oneid_api_id, $oneid_api_key;

  $oneid_api_id = $id;
  $oneid_api_key = $key;

}


function OneID_MakeNonce() {
  $arr =  _call_OneID("make_nonce");


  return $arr['NONCE'];
  
  
  //How to make a nonce locally.
  /*$time = time();
  
  $nonce = gmstrftime('%Y-%m-%dT%H:%M:%SZ', $time);

  $length = 6;
  $chars  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $chars .= 'abcdefghijklmnopqrstuvwxyz';
  $chars .= '1234567890';
 
  $unique = '';
  for ($i = 0; $i < $length; $i++) {
    $unique .= substr($chars, (rand() % (strlen($chars))), 1);
  }
 
  return $nonce . $unique;

  */
}

function OneID_Response() {
  $resp = file_get_contents('php://input');

  $validate = _call_OneID("validate", $resp);

  if ($validate["errorcode"] != 0) {
    return FALSE;
  } 

  $arr = json_decode($resp, true);
  
  return $arr;
}

function OneID_Button($callback) {
   return '<img class="oneidlogin" id="oneidlogin" CHALJ=\'{"NONCE":"' . OneID_MakeNonce() . '","ATTR":"","SATTR":"email","CALLBACK":"'. $callback . '"}\' src="https://my.oneid.com/api/images/btn_id_signin.gif" onclick="OneId.login()">';
}

function OneID_FormFill($attrs) {
   return '<img class="oneidlogin" id="oneidlogin" CHALJ=\'{}\' src="https://my.oneid.com/api/images/btn_id_signin.gif" onclick="OneId.login()">';
}

function OneID_Redirect($page) {
  return ('{"error":"success","url":"'. $page .'"}');
}

function OneID_Provision($emailAddress, $attrs, $callback) {
  global $oneid_referral_code;

  return ('<img id="getAOneIdButton" class="oneidlogin" 
            ref="' . $oneid_referral_code . '"
            CHALJ=\'{"NONCE":"' .  OneID_MakeNonce() . '","ATTR":"","SATTR":"email","CALLBACK":"' . $callback . '"}\'
            src="https://my.oneid.com/api/images/btn_id_signin.png"
            email= "' . $emailAddress . '"
            userAttrs = \'' . json_encode($attrs) . '\'
            simple= "simple"
            onclick="OneId.createOneId()" >');
}