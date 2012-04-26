<? include "includes/header.php"; ?>

<!-- Define Page -->
<body id="sub_page">
	
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
							<h1><? echo $u_username; ?></h1>
								<div class="subHeading">
									My Ratherings
									</div>
						</div>
						<hr />
						
                
                <div class="main-text services">
                <h3>Latest</h3>

                <? 
                include("includes/ps_pagination.php");                               
                $real_rathers = "SELECT * FROM rathersauras_rathers WHERE fb_uid = '$fb_uid' AND status = 0 ORDER BY id DESC";
                
                $pager = new PS_Pagination($conn, $real_rathers, 8, 5);
                $pager->setDebug(true);
                $rs = $pager->paginate();
                
                $count = 1;

				if(!$rs) die(mysql_error());
                /* GRAB DATA AND OUTPUT */
                while($rather_row = mysql_fetch_array($rs, MYSQL_ASSOC)){
                	$r_id			= $rather_row['id'];
                	$r_option1 		= $rather_row['option_1'];
                	$r_option2		= $rather_row['option_2'];
                	$r_fbuid		= $rather_row['fb_uid'];
                	
                	if($count == 1) {
                	?>
                	<div class="post">
                		<h3>Would you rather <? echo $r_option1; ?> or <? echo $r_option2; ?>?</h3>
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
                	
                		<a href="http://www.twitter.com/home?status=http://rathersaur.us">
                			<img src="http://rathersaur.us/img/smbtn/icon_twitter_26.png" alt="Share on Twitter"/>
                		</a>
                	
                		<a href="mailto:?subject=Would you Rathersaurus?&body=WOULD YOU RATHER">
                			<img src="http://rathersaur.us/img/smbtn/icon_email_26.png" alt="E-mail to a friend"/>
                		</a>
                		</div>
                	</div>
                	<h3>I would rather...</h3>
					<?
					//end of if($count....
					} else {
					?>
               			<ul class="bulletlist">
               				<li><strong><? echo $r_option1."</strong> or <strong>".$r_option2."</strong>?"; ?></li>
               			</ul>
					<?
					}
					//increment counter to get out of div
					$count++;
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