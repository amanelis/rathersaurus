<!-- Start Right Content -->
			<div class="right">
				<?
				//if fb user is null or cookie is null show login button
				if(!$fb_uid || !$fb_user_cookie){
				?>
					<a href="http://rathersaur.us/notloggedin.php" rel="facebox">
						<img src="http://rathersaur.us/img/index/index_right_get_started.jpg" alt="Make your own Rather" />
					</a>
				<?
				} else {
				?>
					<a href="http://rathersaur.us/make.php?fb_uid=<? echo $fb_uid; ?>" rel="facebox">
						<img src="http://rathersaur.us/img/index/index_right_get_started.jpg" alt="Make your own Rather" />
					</a>	
				<?
				}
				?>

						
				<!-- Start Sidebar -->
				<div class="sidebar">
				
					<!-- Sidebar Top  -->
					<div class="sidebar_top"></div>
						<div class="txt">

										
								<div class="saur">
								<img src="http://rathersaur.us/img/saur.png" alt="Rathersaur" /><p>Rathersaurus by <a href="http://kickingshadows.deviantart.com/">kickingshadows</a></p>
							</div>
							
							<h2>About Rathersaur.us</h2>
							<hr />
							
							<p>While playing an intense game of "would you rather..." through text, we decided there had to be a better way to find out what people would rather do. Rathersaurus was born. Started in 2010, this is a Kiwi Grove project.</p>
							
							<h2>Contact us</h2>
							<hr />
							
							<p>alex@kiwigrove.com
			     			 
			     			 <br class="clear"></br></p>
		
							
						</div>
					<!-- Sidebar Normal Bottom -->
					<div class="sidebar_normal_bottom"></div>
				</div>	
				<!-- End Sidebar -->
<!-- Start Adsense -->
<div class="ad">
<script type="text/javascript"><!--
google_ad_client = "pub-7254682766798150";
/* Rathersaur.us */
google_ad_slot = "0859035022";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>	
			</div>
			<!-- End Right Content -->
