<?
if(!isset($_COOKIE['theUserSession'])){
	header('Location: index.php');
}
session_start();
include('../../p_includes/conn.db.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title>Adminus &#9679; Page</title>
	
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
	
	
			
			<div id="header">
			
				<h1><a href="#">Rathersaur.us</a></h1>
				
				<ul id="nav">
					<li><a href="#">Dashboard</a></li>
					<li><a href="http://rathersaur.us/admin/posts">Posts</a></li>
					<li><a href="http://rathersaur.us/admin/users">Users</a></li>
				</ul>
				
				<p class="user">Hello, <strong><? echo $_SESSION['username']; ?></strong> | <a href="logout">Logout</a></p>
				
			</div>		<!-- #header ends -->
			
			
			
			
			
			<div class="block">
			
				<div class="block_head">
					<h2>POSTED RATHERS</h2>
				</div>		<!-- .block_head ends -->
				
				
				
				<div class="block_content">
					
						<table cellpadding="0" cellspacing="0" width="100%">
						
							<tr>
								<th>RID</th>
								<th>Rather</th>
								<th>Status</th>
								<th>Date created</th>
								<th>FB User</th>
								<td>&nbsp;</td>
							</tr>
							
						<?
						$rather_query  = "SELECT * FROM rathersauras_rathers ORDER BY id DESC";
						$rather_result = mysql_query($rather_query);
						$rather_rows   = mysql_num_rows($rather_result);
						while($row_rather = mysql_fetch_array($rather_result, MYSQL_ASSOC)) {
							$r_id		= $row_rather['id'];
							$r_fb_uid	= $row_rather['fb_uid'];
							$r_opt1		= $row_rather['option_1'];
							$r_opt2		= $row_rather['option_2'];
							$r_status	= $row_rather['status'];
							$r_date		= $row_rather['date'];
							
							if($r_status == 0)
								$status = "Published";
							else
								$status = "Banned";
						?>		
							<tr>
								<td><? echo $r_id; ?></td>
								<td><? echo $r_opt1." or ".$r_opt2; ?></td>
								<td><? echo $status; ?></td>
								<td><? echo $r_date; ?></td>
								<td><a href="http://facebook.com/profile.php?id=<? echo $r_fb_uid; ?>"><? echo $r_fb_uid; ?></a></td>
								<td class="delete"><a href="delete.php?id=<? echo $r_id; ?>&type=rather">Delete</a></td>
							</tr>
						<?
						}
						?>		
						</table>
					
				</div>		<!-- .block_content ends -->
				
			</div>		<!-- .block ends -->
			
			
						
			<div id="footer">
			
				<p class="left"><a href="http://rathersaur.us/">RATHERSAUR.US</a></p>
				
			</div>
		
		
		</div>						<!-- wrapper ends -->
		
	</div>		<!-- #hld ends -->
	
</body>
</html>
