<?PHP
/***********************************************
This file initializes all neccesary include files,
functions, variables in order to properly start the
website.

Author: Alex Manelis
Date: 2010-1-8
***********************************************/

//include database connection, holds db credentials
//as well as starts a database connect, $conn
include('conn.db.php');

///////////FUNCTIONS/////////////////////////////
function getUsernameByID($user_id){
	//include("conn.db.php");

	$user_query = "SELECT fb_uid, username FROM rathersauras_users WHERE fb_uid = '$user_id' LIMIT 1";
	$user_query_result = mysql_query($user_query);
	
	$username_row = mysql_fetch_array($user_query_result, MYSQL_ASSOC);
	$u_username = $username_row['username'];
	mysql_free_result($user_query_result);
	
	if($u_username == NULL)
		return NULL;
	else
		return $u_username;

	$close = mysql_close($conn);
}

function show_dino($msg) {
	echo "<br /><div align=\"center\"><h2>$msg</h2><br />";
	echo "<a href=\"/\"><img src=\"http://rathersaur.us/img/404.png\"></a></div>";
}