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
							<h1>What would YOU do? RAWR!!!!</h1>
							<hr />
							</div>
                
                <div class="main-text services">
                 
                <?
                $rather_id = (int)$_GET['rid'];
                if(!empty($rather_id)){
                	$rathers_query = "SELECT * FROM rathersauras_rathers WHERE id = '$rather_id' AND status = 0";
                	$rathers_query_result = mysql_query($rathers_query);
                	$rathers_num_rows = mysql_num_rows($rathers_query_result);
             
             		if($rathers_num_rows == 0){
             			show_dino('Your rather is invalid or missing, click the dinosaur\'s face!');
             			mysql_free_result($rathers_query_result);
               		}

			while($rso = mysql_fetch_array($rathers_query_result, MYSQL_ASSOC)){
	                	$rath_id		= $rso['id'];
    	            		$rath_fb_uid	= $rso['fb_uid'];
        	        	$rath_opt1		= $rso['option_1'];
            	    		$rath_opt2		= $rso['option_2'];
                		$rath_status	= $rso['status']; 
                		
                		if(($_GET['page'] == 1) || (empty($_GET['page']))){
                			?>
                			<div class="post">
                			<h3>Would you rather <? echo $rath_opt1; ?> or <? echo $rath_opt2; ?>?</h3>
                			<div class="social"> 
                			<?
                			if($r_fbuid == $fb_uid){
                		 		echo "By <strong>YOU!</strong>";
                			} else {
                				$o_username = getUsernameByID($rath_fb_uid);
                				echo "From: <strong>$o_username</strong>";
                			}
                			?>
							<!--<input type="button" onclick="callPublish('',null,null);return false;" value="Post to Wall" />-->
                	
<a href="#" onclick="callPublish('<? echo $w_name; ?>','<? echo $r_option1; ?>','<? echo $r_option2; ?>','<? echo $rath_id; ?>'); return false;">
                				<img src="http://rathersaur.us/img/smbtn/icon_facebook_26.png" alt="Share on Facebook"/> 
                			</a>
                	
                			<a href="http://www.twitter.com/home?status=http://rathersaur.us">
                				<img src="http://rathersaur.us/img/smbtn/icon_twitter_26.png" alt="Share on Twitter"/>
                			</a>
                	
                			<a href="mailto:?subject=Would you Rathersaurus?&body=WOULD YOU RATHER">
                				<img src="http://rathersaur.us/img/smbtn/icon_email_26.png" alt="E-mail to a friend"/>
                			</a>
                			</div>
                		<?
                		} else {
                			continue;
                		}
                		?>
                		</div>
                		<fb:comments> </fb:comments>
                		<?
                	}// while($rathers_row_out =...
                	if(($_GET['page'] == 1) || (empty($_GET['page']))){
                		?>
                		<br />
                		<br />
                		<?
                	}
                	?>
                	<h3>Answer More</h3>
                	<?
                	include("includes/ps_pagination.php");                               
                	$real_rathers = "SELECT * FROM rathersauras_rathers WHERE status = 0 AND id != '$rather_id' ORDER BY id DESC";
                
                	$page_num = "rid=$rather_id";
                
                	$pager = new PS_Pagination($conn, $real_rathers, 8, 5, $page_num);
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
					<?
					}//end of loop
                	
					mysql_free_result($rs);
                	mysql_free_result($rathers_query_result);
             		mysql_close($conn);
                } else {
                	show_dino('Your rather is invalid or missing, click the dinosaur\'s face!');
                	mysql_free_result($rs);
                	mysql_free_result($rathers_query_result);
             		mysql_close($conn);
                }// End if(!empty...
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
