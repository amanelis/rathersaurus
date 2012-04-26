<?
/* Check if form has been submitted from signup.php */
if($_SERVER['REQUEST_METHOD'] !='POST'){
	echo "ERROR: post not submitted<br />";
	exit(-1);
}	

/* Include database connection class */
include("/home/51949/users/.home/domains/rathersaur.us/p_includes/init.php");

$f_username = mysql_real_escape_string($_POST['f_username']);
$f_email 	= mysql_real_escape_string($_POST['f_email']);
$fb_uid 	= mysql_real_escape_string($_POST['f_fbuid']);

$f_today = date("Y-m-d");

if(isset($_POST['f_username']) && isset($_POST['f_email']) && isset($_POST['f_fbuid'])){ 
	if($f_username == NULL){
		echo "Hey, it seems you left your <strong>username</strong> field blank! Please go back and re-enter it.<br />";
		exit(-1);
	} else {
		$check_user_query = ("SELECT username FROM rathersauras_users WHERE username = '$f_username'");
		$check_user_result = mysql_query($check_user_query);
		$check_user_rows = mysql_num_rows($check_user_result);
		
		if($check_user_rows != 0) { /* This means username is unavailable, user must resubmit form */
			echo "This username: <strong>$f_username</strong> is already taken, please choose another<br />";
			mysql_free_result($check_user_result);
			exit(-1); 
		}
		mysql_free_result($check_user_result);
	}
	if($f_email == NULL){
		echo "Hey, it seems you left your <strong>email</strong> field blank! Please go back and re-enter it.<br />";
		exit(-1);
	} else {
		$check_email_query = ("SELECT email FROM rathersauras_users WHERE email = '$f_email'");
		$check_email_result = mysql_query($check_email_query);
		$check_email_rows = mysql_num_rows($check_email_result);
		
		if($check_email_rows != 0) { /* This means username is unavailable, user must resubmit form */
			echo "This email address: <strong>$f_email</strong> is already taken, please use another<br />";
			mysql_free_result($check_email_result);
			exit(-1); 
		}
		mysql_free_result($check_email_result);
	}
	
	if($fb_uid == NULL){
		echo "There seems to be an error with your facebook user id. Please re login with your facebook username!<br />";
		exit(-1);
	} else {
		$check_fb_query = ("SELECT fb_uid FROM rathersauras_users WHERE fb_uid = '$fb_uid'");
		$check_fb_result = mysql_query($check_fb_query);
		$check_fb_rows = mysql_num_rows($check_fb_result);
		
		if($check_fb_rows != 0) { 
			echo "Your facebook user id is already been registered with the system, sorry :(<br />";
			mysql_free_result($check_fb_result);
			exit(-1); 
		}
		mysql_free_result($check_fb_result);
	}
	
	$query_register = "INSERT INTO rathersauras_users(fb_uid, username, email,date,plogin) 
					   VALUES ('$fb_uid','$f_username', '$f_email','$f_today','$f_today')";
	$query_register_result = mysql_query($query_register);
	if(!$query_register_result){
		echo "There was an error registering you, please go back and try again<br />";
		mysql_close($conn);
		exit(-1);
	}
	echo "<h2>Thank you for registering<br />";

}
$close = mysql_close($conn); 
?>