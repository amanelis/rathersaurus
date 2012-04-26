<?php
/*---------------------------------------------------------------------
*Written by: Alex Manelis
*Date: June 10, 2008
*Email: amanelis@gmail.com
*File: session.php
*Purpose: this page will manage the sessions of the users. Currently it 
*is being used only on the development side that has a user login. Only
*to be used with logging in. 
-----------------------------------------------------------------------
*/

session_start();
session_register('myusername');
session_register($myusername);

$token = md5(uniqid(rand(), true));
$_SESSION['token'] = $token;

if(!session_is_registered($myusername)){
	header("location:index.php");
} else {
	$mainUser = $HTTP_SESSION_VARS ["myusername"] = $myusername;
	$_SESSION['usersLoggedIn'] = $myusername;
}

?>