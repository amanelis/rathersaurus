<?
/* Check if form has been submitted from signup.php */
if($_SERVER['REQUEST_METHOD'] !='GET'){
	echo "ERROR: post not submitted properly.<br />";
	exit(-1);
}	

/* Include database connection class */
$host 		= "internal-db.s51949.gridserver.com"; 						// Host name 
$username 	= "db51949";		 							// Mysql username 
$password 	= "5432@1gxy+V_}"; 								// Mysql password 
$db_name 	= "db51949_rathersaurus";	 						// Database name
	
// Connect to server and select databse.
$conn = mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
$dbselct = mysql_select_db("$db_name")or die("cannot select DB");

$f_uid 		= mysql_real_escape_string($_GET['uid']);
$f_rid 		= mysql_real_escape_string($_GET['rid']);
$f_option 	= mysql_real_escape_string($_GET['option']);
$ip			= getenv('REMOTE_ADDR');
$ipaddr		= str_replace(".", "", $ip);

$check_query = "SELECT * FROM rathersauras_likes WHERE rather_id = '$f_rid' AND ipaddr = '$ipaddr' LIMIT 1";
$check_query_results = mysql_query($check_query);
$check_query_rows = mysql_num_rows($check_query_results);

if($check_query_rows == 1) {
	header('Location: http://rathersaur.us/index');
	exit(-1);
}

if(isset($f_uid) && isset($f_rid) && isset($f_option) && $check_query_rows == 0){ 

	$insert_query =  "INSERT INTO rathersauras_likes (user_id, rather_id, opt, ipaddr) VALUES ('$f_uid','$f_rid','$f_option','$ipaddr')";
	$insert_result = mysql_query($insert_query)or die(mysql_error());
	
	if(!$insert_result){
		echo "There was an error registering your like, please go back and try again<br />";
		mysql_close($conn);
		exit(-1);
	}
}
$close = mysql_close($conn); 
header('Location: http://rathersaur.us/');
?>
