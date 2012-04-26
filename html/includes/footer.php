<!-- Fix Footer -->
	<div class="clear"></div>
	
	<!-- Start Footer -->
	<div id="footer">
		<!-- Start Footer Wrap -->
		<div class="footerWrap">

			<!-- End Footer Lists -->
		<div class="copyright">
			Rathersaur.us is a project of <a href="http://kiwigrove.com" title="Kiwi Grove">Kiwi Grove</a>. &copy;2010. <a href="privacy.html" rel="facebox">Privacy</a> | <a href="terms.html" rel="facebox">Terms</a>
		</div>
		
		</div>
		<!-- End Footer Wrap -->
	</div>
	<!-- End Footer -->
	
<!-- START FB CONNECT JS INCLUDE -->
<script type="text/javascript" src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php">
</script>
<!-- END FB CONNECT JS INCLUDE -->

<!-- START KISSinsights code for rathersaur.us -->
<script type="text/javascript" id="ki_loader" src="http://j.kissinsights.com/1.0/load.js?site=rathersaur.us">
</script>
<script type="text/javascript" charset="utf-8">
     KI.identify('<? echo $fb_uid; ?>');
</script>
<!-- END KISSinsights code for rathersaur.us -->

<!-- START GOOGLE ANALYTICS -->
<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	try {
		var pageTracker = _gat._getTracker("UA-10020436-17");
		pageTracker._trackPageview();
	} catch(err) {
	
	}
</script>
<!-- END GOOGLE ANALYTICS -->

<!-- START FB CONNECT FUNCTIONS, INIT -->
<script type="text/javascript">
function callPublish(name, op1, op2, id) {
	var actionLinks = [{ "text": "Rathersaur.us", "href": "http://rathersaur.us/"}];
	var attachment = {
		'name':'Rathersaur.us says, Would you rather...?',
		'href':'http://rathersaur.us/rather.php?rid=' +id+'',
		'caption':''+name+ ' wants to know, Would you rather ' +op1+ ' or ' +op2+ '?',
		'media':[{
			'type':'image',
			'src':'http://rathersaur.us/img/fb_logo.png',
			'href':'http://rathersaur.us/'}]
	};

	FB.ensureInit(function () {
		FB.Connect.streamPublish('', attachment, actionLinks);
	});
}

function refresh_page(){
	window.location.reload();
}
FB.init("212413c9ac9f08bd750dc9cccdc42285", "http://rathersaur.us/xd_receiver.htm", {"forceBrowserPopupForLogin":true});
</script>
<!-- END FB CONNECT FUNCTIONS, INIT -->

<? $close = mysql_close($conn); ?>
</body>
</html>