<?php 
$past = time() - 10;
setcookie(theUserSession, date("F jS - g:i a"), $past);
header( 'Location: http://rathersaur.us/admin/' ) ;