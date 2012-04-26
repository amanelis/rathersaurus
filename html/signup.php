<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Make Your Rather</title>
<link rel="stylesheet" type="text/css" href="http://rathersaur.us/css/form.css" />

<script language="javascript"  type="text/javascript">
function doHttpRequest( ) {
  http.open("POST", "http://rathersaur.us/process/register_user.php", true);
  http.onreadystatechange = getHttpRes;

  // Make our POST parameters string…
  var params = "f_username=" + encodeURI(document.getElementById("f_username").value)+
	"&f_email=" + encodeURI(document.getElementById("f_email").value)+
	"&f_fbuid=" + encodeURI(document.getElementById("f_fbuid").value);

  // Set our POST header correctly…
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.setRequestHeader("Content-length", params.length);
  http.setRequestHeader("Connection", "close");

  // Send the parms data…
  http.send(params);

}

function getHttpRes( ) {
  if (http.readyState == 4 && http.status == 200) { 
    res = http.responseText;  // These following lines get the response and update the page
      document.getElementById('cell1').innerHTML = res;
      window.location.reload();
  }
}

function getXHTTP( ) {
  var xhttp;
   try {   // The following "try" blocks get the XMLHTTP object for various browsers…
      xhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e2) {
 		 // This block handles Mozilla/Firefox browsers...
	    try {
	      xhttp = new XMLHttpRequest();
	    } catch (e3) {
	      xhttp = false;
	    }
      }
    }
  return xhttp; // Return the XMLHTTP object
}
var http = getXHTTP(); // This executes when the page first loads.
</script>
</head>
<body>
<div id="stylized" class="myform">
  <form id="form1" name="form1" method="post" action="">
    <h1>Complete Signup</h1>
    <p>Last Step, just need a username and email</p>
        <label>Username
        <span class="small">this will be displayed under your rathers</span>
    </label>
    <input type="text" size="45" name="f_username" id="f_username" />
        <label>Email
        <span class="small">we won't spam you or give it out, promise</span>
    </label>
    <input type="text" size="25" name="f_email" id="f_email" />
    <input type="hidden" size="25" name="f_fbuid" id="f_fbuid" value="<? echo $_GET['fb_uid']; ?>"/>
    <div class="spacer"></div>
     <br />
    <!--<button type="submit" onclick="doHttpRequest();">Finish Sign-up</button>-->
    <input type="button" value="Register Me" name="btn" onClick="doHttpRequest();" >
    <div class="spacer"></div>

  </form>
</div>
<br><br><br>

<table width=100% border=0 cellspacing=0>
   <tr><td id="cell1"></td><tr>
</table>
</body>
</html>
