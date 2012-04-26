<?
/* Check if form has been submitted from signup.php */
if($_SERVER['REQUEST_METHOD'] !='POST'){
	echo "ERROR: post not submitted<br />";
	exit(-1);
}	

/* Include database connection class */
include("/home/51949/users/.home/domains/rathersaur.us/p_includes/init.php");

$f_option1 = mysql_real_escape_string($_POST['f_option1']);
$f_option2 = mysql_real_escape_string($_POST['f_option2']);
$f_fbuid   = mysql_real_escape_string($_POST['f_fbuid']);

$f_today = date("Y-m-d");

if(isset($_POST['f_option1']) && isset($_POST['f_option2']) && isset($_POST['f_fbuid'])){
	if($f_option1 == NULL){
		echo "Hey, it seems you left your <strong>OPTION 1</strong> field blank! Please go back and fill it in.<br />";
		exit(-1);
	}
	if($f_option2 == NULL){
		echo "Hey, it seems you left your <strong>OPTION 2</strong> field blank! Please go back and fill it in.<br />";
		exit(-1);
	}
	if($f_fbuid == NULL){
		echo "Your facebook user was not submitted properly, please re login<br />";
		exit(-1);
	}

	$query_register_make = "INSERT INTO rathersauras_rathers(fb_uid,option_1,option_2,date) 
							VALUES('$f_fbuid','$f_option1','$f_option2','$f_today')";
	$query_register_result = mysql_query($query_register_make);
	if(!$query_register_result){
		echo "There was an error registering your rather, please go back and try again<br />";
		mysql_close($conn);
		exit(-1);
	}
	echo "Would you rather $f_option1 <strong>or</strong> $f_option2? Has been added. THANKS!!<br />";
} 
$close = mysql_close($conn);
?>
