<?
include('../../p_includes/conn.db.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title>Adminus &#9679; Login</title>
	
    <style type="text/css" media="all">
		@import url("css/style.css");
		@import url("css/jquery.wysiwyg.css");
		@import url("css/facebox.css");
		@import url("css/visualize.css");
		@import url("css/date_input.css");
    </style>
	
	<!--[if lt IE 8]><style type="text/css" media="all">@import url("css/ie.css");</style><![endif]-->
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.img.preload.js"></script>
	<script type="text/javascript" src="js/jquery.filestyle.mini.js"></script>
	<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="js/jquery.date_input.pack.js"></script>
	<script type="text/javascript" src="js/facebox.js"></script>
	<script type="text/javascript" src="js/excanvas.js"></script>
	<script type="text/javascript" src="js/jquery.visualize.js"></script>
	<script type="text/javascript" src="js/jquery.select_skin.js"></script>
	<script type="text/javascript" src="js/jquery.pngfix.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>

</head>




<body>
	
	<div id="hld">
	
		<div class="wrapper">		<!-- wrapper begins -->
		
		
		
		
		
		
			
			
			
			
			
			
			
			<div class="block small center login">
			
				<div class="block_head">
					<h2>Login</h2>
					<ul>
						<li><a href="http://rathersaur.us/">back to the site</a></li>
					</ul>
				</div>		<!-- .block_head ends -->
				
				
				
				
				<div class="block_content">
					
					<!--<div class="message info"><p>Just click login, this is an example.</p></div>-->
					
					<form action="authenticate.php" method="post">
						<p>
							<label>Username:</label> <br />
							<input type="text" class="text" id="f_username" name="f_username" />
						</p>
						
						<p>
							<label>Password:</label> <br />
							<input type="password" class="text" id="f_password" name="f_password" />
						</p>
						
						<p>
							<input type="submit" class="submit" value="Login" /> &nbsp; 
							<input type="checkbox" class="checkbox" checked="checked" id="rememberme" /> 
							<label for="rememberme">Remember me</label>
						</p>
					</form>
					
				</div>		<!-- .block_content ends -->
					
					
								
			</div>		<!-- .login ends -->
			
			
			
			
			
			
			
			
			
			
			
		
		
		</div>						<!-- wrapper ends -->
		
	</div>		<!-- #hld ends -->
	
</body>
</html>
<?
$close = mysql_close($conn);
?>