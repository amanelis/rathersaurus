<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Make Your Rather</title>
<link rel="stylesheet" type="text/css" href="http://rathersaur.us/css/form.css" />

<script language="javascript"  type="text/javascript">
function doHttpRequest() {
  http.open("POST", "http://rathersaur.us/process/register_make.php", true);
  http.onreadystatechange = getHttpRes;

  // Make our POST parameters string…
  var params = "f_option1=" + encodeURI(document.getElementById("f_option1").value)+
	"&f_option2=" + encodeURI(document.getElementById("f_option2").value)+
	"&f_fbuid=" + encodeURI(document.getElementById("f_fbuid").value);

  // Set our POST header correctly…
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.setRequestHeader("Content-length", params.length);
  http.setRequestHeader("Connection", "close");

  // Send the parms data…
  http.send(params);

}

function getHttpRes() {
  if (http.readyState == 4 && http.status == 200) { 
    res = http.responseText;  // These following lines get the response and update the page
    document.getElementById('cell1').innerHTML = res;
    window.location.reload();
  }
}

function getXHTTP() {
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
    <h1>Make Your Rather</h1>
    <p>What do you want to share with the world?</p>
    
    <label>Option #1
        <span class="small">Would you rather: this</span>
    </label>
    <input type="text" name="f_option1" id="f_option1" /><br />
    
    <label>Option #2
        <span class="small">or:</span>
    </label>
    <input type="text" name="f_option2" id="f_option2" />
    <input type="hidden" size="25" name="f_fbuid" id="f_fbuid" value="<? echo $_GET['fb_uid']; ?>"/>
    
    <div class="spacer"></div>
	<h2> Would you rather OPTION 1 or OPTION 2?</h2><br />
    
    <!--<button  type="submit">Submit</button>-->
    <input type="button" value="Submit a Rather" name="btn" onClick="doHttpRequest(); return false;" >
    <div class="spacer"></div>

  </form>
</div>

<table width=100% border=0 cellspacing=0>
   <tr><td id="cell1"></td><tr>
</table>

</body>
</html>
