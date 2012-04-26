<?PHP
include('../../p_includes/conn.db.php');
// username and password sent from signup form
//make_safe() strips any form variable from SQL
//injection by hackers, documentation, and method
//can be found in functions.php 
$myusername = mysql_real_escape_string(trim($_POST['f_username'])); 
$mypassword = mysql_real_escape_string(trim($_POST['f_password'])); 
$mypassword = sha1($mypassword);

$sql = "SELECT * FROM rathersauras_admin WHERE username = '$myusername' AND password = '$mypassword' LIMIT 1";
$result = mysql_query($sql);

// Mysql_num_row is counting table row
$count = mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1){
	session_start();
	session_register("myusername");
	session_register("mypassword"); 
	
	$Month = 2592000 + time();
	setcookie(theUserSession, date("F jS - g:i a"), $Month);
	
	$_SESSION['username'] = $myusername;
	
	header("location: posts.php");
} else {
	echo "Wrong Username or Password<br />";
}
mysql_close($conn);
?>