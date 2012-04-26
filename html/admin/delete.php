<?
if(!isset($_COOKIE['theUserSession'])){
	header('Location: index.php');
}
session_start();
include('../../p_includes/conn.db.php');

$p_id = mysql_real_escape_string($_GET['id']); 
$p_ty = mysql_real_escape_string($_GET['type']);

if( (!isset($p_id)) || (!isset($p_ty)) ) {
	echo "There was an error with your delete, please try again!<br />";
	exit(-1);
} else if($p_ty == "rather") {
	$query = "DELETE FROM rathersauras_rathers WHERE id = '$p_id' LIMIT 1";
} else if($p_ty == "user") {
	$query = "DELETE FROM rathersauras_users WHERE id = '$p_id' LIMIT 1";
} else {
	$query = NULL;
	echo "You still have an error with your delte<br />";
	exit(-1);
} 

if($query !=NULL) {
	$result = mysql_query($query) or die ("Unable to execute query with params: $p_id, $p_ty<br />");
}

if($p_ty == "rather") {
	header('Location: http://rathersaur.us/admin/posts');
} else if($p_ty == "user") {
	header('Location: http://rathersaur.us/admin/users');
} else {
	header('Location: http://rathersaur.us/admin/posts');
}
	
$close = mysql_close($conn);
?>