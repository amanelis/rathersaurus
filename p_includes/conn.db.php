<?php
/*---------------------------------------------------------------------
*Written by: Alex Manelis
*Date: June 10, 2008
*Email: amanelis@gmail.com
*File: db.php
*Purpose: this page contains all variables, usernames, and passwords
*required to make a database connection.
-----------------------------------------------------------------------
*/

$host 		= "internal-db.s51949.gridserver.com"; 			// Host name 
$username 	= "db51949"; 									// Mysql username 
$password 	= "5432@1gxy+V_}"; 								// Mysql password 
$db_name 	= "db51949_rathersaurus";	 					// Database name
	
// Connect to server and select databse.
$conn = mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
$dbselct = mysql_select_db("$db_name")or die("cannot select DB");
