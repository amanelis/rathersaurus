<?PHP 
//Facebook API, and secret
$appapikey = '212413c9ac9f08bd750dc9cccdc42285'; 
$appsecret = '388e162760b969b92a11ebd02fde0c8a'; 

//Initialize a facebook object
$facebook  = new Facebook($appapikey, $appsecret);

//Grab the logged in user by cookie, not by get_loggedin_user()
$fb_uid    		  = $facebook->get_loggedin_user();
$fb_uid_cookie    = $_COOKIE['212413c9ac9f08bd750dc9cccdc42285_user'];
