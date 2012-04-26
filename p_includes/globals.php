<?php
/*---------------------------------------------------------------------
*Written by: Alex Manelis
*Date: June 10, 2008
*Email: amanelis@gmail.com
*File: globals.php
*Purpose: this page holds global variables that can be accessed in every
*page that includes this file. Particularily, holds such variables that
*store the users IP then converts it to a long value that can be easily
*inserted into the database as well as date, users browser, and defines
*how many points the users are allowed
-----------------------------------------------------------------------
*/

//$today = is used to store the date function that is for the daily points.
$today 				= date("Y-m-d");

//$time = is used to store a complete string that contains the time only.
$time				= date('G').":".date('i');

//$zone = is used to pull the information about the time zone.
$zone				= date('e');

//$ipaddress = this simply gets the users IP in standard format 129.115.12.13.
$ipaddress 			= $_SERVER['REMOTE_ADDR'];

//Grab actual hostname
$hostname 			= gethostbyaddr($_SERVER['REMOTE_ADDR']);

//$currentTime = simply gets the current time in specified formatting string.
$currentTime 		= date("g:i:s");

//$browser = this variable simply obtains which browser the user is using
$browser			= $_SERVER['HTTP_USER_AGENT'];

//$dailyPoints = this is a very important variable that is used and specified in
//many pages, it is the variable representing how many points we give to users 
//for daily logins, CHANGE THIS AND IT CHANGES FOR THE ENTIRE SYSTEM *********
$dailyPoints		= 5;

//$userType1Points = this variable specifies the first login after signup on the
//points that are given to the user when they sign up. CHANGE THIS AND IT CHANGES
//FOR THE ENTIRE SYSTEM **************
$userType1Points	= 100;

//$userType2Points = this variable is used to specify a super user. It can be used
//to give total access to the site, and unlimited use. This account can only be
//granted through administrative database access. ACCOUNT CANNOT BE CREATED through
//the web.
$userType2Points	= 'UNLIMITED';
?>