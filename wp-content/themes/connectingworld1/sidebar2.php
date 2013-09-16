<script language="javascript">
function linked (val)
{
window.location.href='<?php echo get_option('siteurl'); ?>/contact-press-people/contact?country='+val;
}

</script>
<div class="span-4 last" style="height:auto" >
		<div class="sidebar right-sidebar">
           
      
			 <ul>
			 
			  <li  id="Loginbutton2">
              <?php if ( is_user_logged_in() ) {
			  global $current_user;
      get_currentuserinfo();?>
 <a id="logoutt" href="<?php bloginfo('template_directory'); ?>/images/cw.jpg" ><b>Log out</b><br/></a> <?php } else { ?>
             <a href="/wp-login.php?redirect_to=www.cw-connectingworld.com/my-page-2" class="simplemodal-login" id="login">Log in</a>
             <?php } ?>
                    </li>


           <li id="mougala" style="width: 115px; height: auto; ">
           <?php include("clock/clock.php");?>
           </li>

			<li>
			<!-- function pour affichage de zoone translation jaune onmouseover -->
			<script type="text/javascript">
				function zone_show(){
				document.getElementById('googletext2').style.display = 'block';					
				}
				function noshow(){
				document.getElementById('googletext2').style.display = 'none';												
				}
			</script>
			
			<h2>Translator</h2>
            <div id="translate">
	<div id="google-translate"onmouseover="zone_show()" onmouseout="noshow()" ></div>
	<input id="reset" type="reset" value="Reset" style="margin-top:12px; margin-bottom:16px;" />
	<p style="margin-top:-8px; font-size: 12px; font-weight:bold; font-family: arial; color: rgb(0, 56, 130);">
	Choose your own<br />
	language here.
	</div>
	<div id="googletext2"style="display:none;">
    <img src="<?php bloginfo('template_url'); ?>/images/close.png" width="25px" height="25px" style="float:right; margin: 5px 5px 0 0;" alt="close" />
		<b style="font-size: 14px; font-family: arial; color: rgb(0, 56, 130);text-align:center; margin-top:10px;">
	<br /><br />TRANSLATION</b><br />
		<p style="text-align: center;"><b>Note!</b><br />
This translation is automatically
generated using Google
Translate. Please be advised that
the translation will not be 100%
accurate.<br /><br />
This is a test version. Please
use the "Reset" button when
switching from one language to
another, otherwise a mix of two
or more languages may occur.</p>
	</div>
<script type="text/javascript">
jQuery.noConflict();
 jQuery(document).ready(function(){
 jQuery(".jq-translate-ui").val("English");
});
 jQuery("div#translate").hover( function(){
	 jQuery("div#googletext2").css("display", "block");
	 jQuery("div#translate").unbind('mouseenter mouseleave');
});
 jQuery("div#googletext2").click( function() {
	 jQuery(this).hide()
});
</script>
            </li>
			        <li>
            <br />
            <div align="center">
           <embed height="120" width="120" wmode="transparent" allowscriptaccess="always" flashvars="minurl=<?php bloginfo("url")?>/work-with-us/" quality="high" name="einstein" id="einstein" style="undefined" src="<?php bloginfo('template_directory'); ?>/images/ads/120x120einstein.swf" type="application/x-shockwave-flash"></embed>
</div>
            </li>
			
             <li>
            <br /><br />
            <div align="center"><embed width="120" height="300" allowscriptaccess="always" flashvars="minurl=<?php bloginfo("url")?>/work-with-us/" quality="high" name="banner_eng" id="banner_eng" style="border:#003399 1px solid;" src="<?php bloginfo('template_directory'); ?>/images/ads/banner_eng.swf" type="application/x-shockwave-flash"></embed></div>
            </li>
                 <li>
				 
            <br /><br />
            <div align="center">
			 
				 <embed width="120" height="120" wmode="transparent" allowscriptaccess="always" flashvars="minurl=<?php bloginfo("url")?>/archives/" quality="high"  name="columnist" id="columnist" style="undefined" src="<?php bloginfo('template_directory'); ?>/images/ads/120x120columnist.swf" type="application/x-shockwave-flash"></embed>
         </div>
            </li>

                 <li>
            <br /><br />
            <div align="center" >
				<embed width="120" height="120" wmode="transparent" allowscriptaccess="always" flashvars="minurl=<?php bloginfo("url")?>/forum/" quality="high" name="forum" id="forum" style="undefined" src="<?php bloginfo('template_directory'); ?>/images/ads/120x120forum.swf" type="application/x-shockwave-flash"></embed>
       </div>
            </li>
                 <li>
            <br /><br />
			
			
		            <div align="center">
          	<embed width="120" height="120" wmode="transparent" allowscriptaccess="always" flashvars="minurl=<?php bloginfo("url")?>/work-with-us/" quality="high" bgcolor="#ffffff" name="become" id="become" style="undefined" src="<?php bloginfo('template_directory'); ?>/images/ads/120x120become.swf" type="application/x-shockwave-flash"></embed>

		  </div>
            </li>		
        
				<?php  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 2') ) : ?>
             
               <!-- <li><h2>Archives</h2>
					<ul>
					<?php //wp_get_archives('type=monthly'); ?>
					</ul>
				</li>*/-->
                 
				<?php //wp_list_bookmarks(); ?>
                        
				
	
				<?php endif; ?>
				
			</ul>
		<?php if(get_theme_option('ad_sidebar2_bottom') != '') {
		?>
		<div class="sidebaradbox">
			<?php echo get_theme_option('ad_sidebar2_bottom'); ?>
		</div>
		<?php
		}
		?>
          
		</div>
	</div>
