<? include "includes/header.php"; ?>

<!-- Define Page -->
<body id="sub_page" onload="facebox()">
	
	<!-- Page Container -->
	<div id="container">
	
		
<? include "includes/navigation.php"; ?>	
		
		<!-- Content Container -->
		<div id="content">
			<!-- normal Content Container -->
			<div class="normal">
				<!-- Normal Content Top -->
				<div class="top"></div>
					<!-- Normal Content Text -->
					<div class="txt">
						<div class="attention">
							<h1>Most Recent Rathers</h1>
								<div class="subHeading">
									Latest | Popular</div>
						</div>
						<hr />
                
                <div class="main-text services">
                
                
                <? 
                include("includes/ps_pagination.php");                               
                $real_rathers = "SELECT * FROM rathersauras_rathers WHERE status = 0 ORDER BY id DESC";
                
                $pager = new PS_Pagination($conn, $real_rathers, 8, 5);
                $pager->setDebug(true);
                $rs = $pager->paginate();

				if(!$rs) die(mysql_error());
                /* GRAB DATA AND OUTPUT */
                while($rather_row = mysql_fetch_array($rs, MYSQL_ASSOC)){
                	$r_id			= $rather_row['id'];
                	$r_option1 		= $rather_row['option_1'];
                	$r_option2		= $rather_row['option_2'];
                	$r_fbuid		= $rather_row['fb_uid'];
                	$r_status		= $rather_row['status'];
                	?>
                	<div class="post">
                	<h3>Would you rather 
                	<? if(isset($fb_uid)){ ?>
			   			<a href="process/register_like.php?uid=<? echo $fb_uid; ?>&rid=<? echo $r_id; ?>&option=1"><? echo $r_option1; ?></a>
                	   or 
                	   <a href="process/register_like.php?uid=<? echo $fb_uid; ?>&rid=<? echo $r_id; ?>&option=2"><? echo $r_option2; ?></a>?
				<? } else { ?>
			   			<? echo $r_option1; ?>
                	   or 
                	   	<? echo $r_option2; ?>?
				<? } ?>
                	</h3>
                	<div class="social"> 
                	<?
                	if($r_fbuid == $fb_uid){
                		echo "By <strong>YOU!</strong>";
                	} else {
                		$o_username = getUsernameByID($r_fbuid);
                		echo "From: <strong>$o_username</strong>";
                	}
                	?>
					<!--<input type="button" onclick="callPublish('',null,null);return false;" value="Post to Wall" />-->
                	
<a href="#" onclick="callPublish('<? echo $w_name; ?>','<? echo $r_option1; ?>','<? echo $r_option2; ?>','<? echo $r_id; ?>'); return false;">
                		<img src="http://rathersaur.us/img/smbtn/icon_facebook_26.png" alt="Share on Facebook"/> 
                	</a>
                	
                	<a href="http://www.twitter.com/home?status=http://rathersaur.us/rathers/<? echo $r_id; ?>">
                		<img src="http://rathersaur.us/img/smbtn/icon_twitter_26.png" alt="Share on Twitter"/>
                	</a>
                	
                	</div>
                	</div>
				<?
				}//end of loop
				mysql_free_result($real_rathers_result);
				echo "<div class=\"social\"><h2>".$pager->renderFullNav()."</h2></div>";
				?>                
	</div>
						<!-- ClearFIX -->

					</div>
					<!-- End Content Text -->
					
				<!-- Normal Content Bottom -->	
				<div class="normal_bottom"></div>	
			</div>
			<!-- End Normal Content -->
			
<? include "includes/sidebar.php"; ?>				
			
		
					</div>
	</div>
	<!-- Page Container -->
	
	
<? include "includes/footer.php"; ?>