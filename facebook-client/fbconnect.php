<?PHP
//Kill error reporting, just in case...
ini_set("error_reporting",0);
require_once 'facebook.php';

//our key and secret, create new Facebook api object
$appapikey = '212413c9ac9f08bd750dc9cccdc42285'; 
$appsecret = '388e162760b969b92a11ebd02fde0c8a'; 
$facebook = new Facebook($appapikey, $appsecret);
$fb_uid = $facebook->get_loggedin_user();
$fb_user_cookie = $_COOKIE['212413c9ac9f08bd750dc9cccdc42285_user'];

//very important*******
//try to grab facebook friends, if not then there is no user logged in
//kill any user cookie by set_user(NULL)
try {
    $friends = $facebook->api_client->friends_get();
} catch (Exception $e) {
    $facebook->set_user(null, null);
}

//if fb user is null or cookie is null show login button
if(!$fb_uid || !$fb_user_cookie){
	$page = $_SERVER['PHP_SELF'];
	?>
	<ul class="nav">
		<li>
		<a href="#" onclick="FB.Connect.requireSession(function() { window.location='http://rathersaur.us/index.php'; }); return false;">
			<img id="fb_login_image" src="http://rathersaur.us/img/fb-connect-large.png" alt="Connect" />
		</a>
	</li>
	</ul>
	<?
} else {
	if(isset($fb_uid)){
		/* We want to grab all data out of database about the user based on their fb_uid for later use in site */
		$q_check_user = "SELECT * FROM rathersauras_users WHERE fb_uid = '$fb_uid' LIMIT 1";
		$check_user_result = mysql_query($q_check_user);
		$check_user_num_rows = mysql_num_rows($check_user_result);
		
		while($user_info_row = mysql_fetch_array($check_user_result, MYSQL_ASSOC)){
			$u_id		= $user_info_row['id'];
			$u_username	= $user_info_row['username'];
			$u_email	= $user_info_row['email'];
			$u_plogin	= $user_info_row['plogin'];
			$u_nlogins	= $user_info_row['numlogins'];
			$u_status	= $user_info_row['status'];
		}
		mysql_free_result($check_user_result);
		
		/* We want to update in the database the previous login for the user and increment num_logins */
		$now = date("Y-m-d");
		$new = ($u_nlogins + 1);
		$update_plogin = "UPDATE rathersauras_users SET plogin = '$now', numlogins = '$new' WHERE fb_uid = '$fb_uid' LIMIT 1";
		$update_plogin_result = mysql_query($update_plogin);
		mysql_free_result($update_plogin_result);
		
		//Grab the facebook first_name, last_name.....etc..
		$fb_lname = $facebook->api_client->users_getStandardInfo($fb_uid,'last_name');
		$fb_fname = $facebook->api_client->users_getStandardInfo($fb_uid,'first_name');
		$fb_wname = $facebook->api_client->users_getStandardInfo($fb_uid,'name');
		$fb_uname = $facebook->api_client->users_getStandardInfo($fb_uid,'username');
		$fb_local = $facebook->api_client->users_getStandardInfo($fb_uid,'locale');
		$fb_prurl = $facebook->api_client->users_getStandardInfo($fb_uid,'profile_url');
		$fb_brday = $facebook->api_client->users_getStandardInfo($fb_uid,'birthday');
		$fb_sex   = $facebook->api_client->users_getStandardInfo($fb_uid,'sex');
		$fb_crloc = $facebook->api_client->users_getStandardInfo($fb_uid,'current_location');
		$fb_email = $facebook->api_client->users_getStandardInfo($fb_uid,'proxied_email');	
		
		//Parse any arrays, store values, prepare for auto form submission if new user
		$f_lname = $fb_lname[0]['last_name'];
		$f_fname = $fb_fname[0]['first_name'];
		$f_wname = $fb_wname[0]['name'];
		$f_uname = $fb_uname[0]['username'];
		$f_local = $fb_local[0]['locale'];
		$f_prurl = $fb_prurl[0]['profile_url'];
		$f_brday = $fb_brday[0]['birthday'];
		$f_sex	 = $fb_sex[0]['sex'];
		$f_email = $fb_email[0]['proxied_email'];
		$f_city  = $fb_crloc[0]['current_location']['city'];
		$f_state = $fb_crloc[0]['current_location']['state'];
		$f_crtny = $fb_crloc[0]['current_location']['country'];
		$f_zipco = $fb_crloc[0]['current_location']['zip'];
		
		$w_name = $fb_fname[0]['first_name']." ".$fb_lname[0]['last_name'];
		
		$f_today = date("Y-m-d");
		$f_ip = $_SERVER['REMOTE_ADDR'];
		
		//if no matching rows in query, NEW USER, grab values and send to a register form.
		if($check_user_num_rows == 0){
			?>
			<!--<meta http-equiv="REFRESH"  content="0;url=signup?fb_uid= //echo $fb_uid; ">-->
			<script type="text/javascript">
				jQuery.facebox('<div align="center">Hey <? echo $fb_fname[0]['first_name']; ?> your facebook worked!<br /><br /><a href="http://rathersaur.us/signup.php?fb_uid=<? echo $fb_uid; ?>" rel="facebox"><img src="http://rathersaur.us/img/continue.jpg"/></a></div>')
			</script>
			
			<?
		//else, returning facebook user, show their information
		}else {
			?>
			<!-- Navigation -->
				<ul class="nav">
					<li><fb:profile-pic uid="<? echo $fb_uid; ?>" facebook-logo="true" width="20" height="20"></fb:profile-pic></li>
					<li><a href="http://rathersaur.us/profile.php" class="active">Profile</a></li>
					<li><a href="#" onClick="FB.Connect.logoutAndRedirect('http://rathersaur.us/index.php')">Logout</a></li>
				</ul>
			<!-- End Navigation -->
			<?
		}
	//if enters into this else statement, there is a serious problem.....
	} else {
		echo "Please clear your cookies in your browser and login again if you see this!<br>";	
	}
}
?>
