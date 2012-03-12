## About

This tutorial uses a small PHP library that implements the relevant calls to the OneID web services.

If you have any questions, join us on #OneID on Freenode.

## Implementing

Implementing OneID sign-in is a two-step process. On the page where you want the sign-in button, you must include a script tag and decide where to place the button. The PHP library has helper variables and functions to make this simple:

	<?php require ("oneid.php"); ?>
	<?php echo $oneid_script; // This inserts the script tag ?>
	<?php echo OneID_Button("oneid_demo/login.php", "oneid_demo/login.php", "localhost") // This inserts the sign-in button ?>

In the OneID_Button function, pass in the the target destination for new users followed by the target for an existing user who is signing in. These should be PHP destinations on your website. This example uses the same destination target for both cases: oneid_demo/login.php.

oneid_demo/login.php is a file that handles the response when the user clicks the OneID button. The code is:

	<?php 
	require ("oneid.php");
	$attrs = OneID_Response(); // This function handles validation of
							    // the response from OneID and returns an 
							    // array of attributes for the user.
	// Local code to "log in" the user
	session_start();
	$_SESSION['email'] = $attrs['EMAIL']['VALUE'];
	// Return the response 
	echo OneID_Redirect('account.php');

account.php is the destination where you want the client’s browser to be sent after signing in successfully.