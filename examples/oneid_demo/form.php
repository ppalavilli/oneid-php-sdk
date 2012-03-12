<script src="https://my.oneid.com/api/js/includeexternal.js"></script>
<script src="https://my.oneid.com/api/form/form.js"></script>
<script>
var billingAddressPostData = {
      "postFillFunction" : "postAddressFunction",
      "formData" : {
         "name" : {
             "oneid_attribute" :  ["firstname", "lastname"],
             "format" : "data['firstname'] + \" \" + data['lastname']"
          },
         "city" : {
           "oneid_attribute" : "billing_city"
         },
         "region_id" : {
           "oneid_attribute" : "billing_state"
         }
       }
   };

   function postAddressFunction() {
       console.log("Hello");
    }

</script>

<script type="text/javascript">
/*
 * Magento -> OneId attribute mapping functions
 */
var state_map = {
            AL:1,
            AK:2,
            AS:3,
            AZ:4,
            AR:5,
            AA:7,
            AE:9,
            AP:11,
            CA:12,
            CO:13,
            CT:14,
            DE:15,
            DC:16,
            FL:18,
            GA:19,
            GU:20,
            HI:21,
            ID:22,
            IL:23,
            IN:24,
            IA:25,
            KS:26,
            LY:27,
            LA:28,
            ME:29,
            MD:31,
            MA:32,
            MI:33,
            MN:34,
            MS:35,
            MO:36,
            MT:37,
            NE:38,
            NV:39,
            NH:40,
            NJ:41,
            NM:42,
            NY:43,
            NC:44,
            ND:45,
            MP:46,
            OJ:47,
            OK:48,
            OR:49,
            PA:51,
            PR:52,
            RI:53,
            SC:54,
            SD:55,
            TN:56,
            TX:57,
            UT:58,
            VT:59,
            VI:60,
            VA:61,
            WA:62,
            WV:63,
            WI:64,
            WY:65
        }

// OneIdUtil.registerAttributeMappingFunction takes in 3 parameters
// the oneid_attribute name
// mapping toOneId -- True if the function maps from your data standards to OneID, false if OneID to your standards.
// mapping function
        OneIdUtil.registerAttributeMappingFunction("billing_state", false, function(state_val){
            return state_map[state_val];
        });

        OneIdUtil.registerAttributeMappingFunction("billing_state", true, function(state_val){
            for (state in state_map){
                if (state_map[state] == state_val) {
                    return state;
                }
            }
            return null;
        });
 </script>


<form>
<input id="name"><br>
<input id="city"><br>
<select id="region_id" name="region_id" title="State/Province" class="validate-select" style="" defaultvalue="57">
                           <option value="">Please select region, state or province</option>
                        <option value="1">Alabama</option><option value="2">Alaska</option><option value="3">American Samoa</option><option value="4">Arizona</option><option value="5">Arkansas</option><option value="6">Armed Forces Africa</option><option value="7">Armed Forces Americas</option><option value="8">Armed Forces Canada</option><option value="9">Armed Forces Europe</option><option value="10">Armed Forces Middle East</option><option value="11">Armed Forces Pacific</option><option value="12">California</option><option value="13">Colorado</option><option value="14">Connecticut</option><option value="15">Delaware</option><option value="16">District of Columbia</option><option value="17">Federated States Of Micronesia</option><option value="18">Florida</option><option value="19">Georgia</option><option value="20">Guam</option><option value="21">Hawaii</option><option value="22">Idaho</option><option value="23">Illinois</option><option value="24">Indiana</option><option value="25">Iowa</option><option value="26">Kansas</option><option value="27">Kentucky</option><option value="28">Louisiana</option><option value="29">Maine</option><option value="30">Marshall Islands</option><option value="31">Maryland</option><option value="32">Massachusetts</option><option value="33">Michigan</option><option value="34">Minnesota</option><option value="35">Mississippi</option><option value="36">Missouri</option><option value="37">Montana</option><option value="38">Nebraska</option><option value="39">Nevada</option><option value="40">New Hampshire</option><option value="41">New Jersey</option><option value="42">New Mexico</option><option value="43">New York</option><option value="44">North Carolina</option><option value="45">North Dakota</option><option value="46">Northern Mariana Islands</option><option value="47">Ohio</option><option value="48">Oklahoma</option><option value="49">Oregon</option><option value="50">Palau</option><option value="51">Pennsylvania</option><option value="52">Puerto Rico</option><option value="53">Rhode Island</option><option value="54">South Carolina</option><option value="55">South Dakota</option><option value="56">Tennessee</option><option value="57">Texas</option><option value="58">Utah</option><option value="59">Vermont</option><option value="60">Virgin Islands</option><option value="61">Virginia</option><option value="62">Washington</option><option value="63">West Virginia</option><option value="64">Wisconsin</option><option value="65">Wyoming</option></select>


<br>



<button name="Load OneId Profile" type="button" onClick="OneIdForm.fill( billingAddressPostData)">Load OneId Profile</button>
<div id="one-id-form-billing-address" class="one-id-form" />
