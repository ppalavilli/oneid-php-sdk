<?php
require("oneid.php");

$attrs = OneID_Response();

// here you do whatever you need to log the user in.
session_start();

$_SESSION['email'] = $attrs['SIGNED_ATTRS']['EMAIL']['VALUE'];

// return the redirect to the next page
echo OneID_Redirect('account.php');
