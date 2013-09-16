<script type="text/javascript">
function linked (val)
{
window.location.href='<?php echo get_option('siteurl'); ?>/contact-press-people/contact?country='+val;
}



</script>
<div class="span-11 last">
            
	<div class="span-7">
	
		<div class="sidebar left-sidebar">
        <br />
        <ul>
                    <li>
                   <form name="fc">
		
<b style="text-align:center;">Select CW in country</b>
		<Select  name="country-select" onchange="linked(this.value);" style="width:250px; text-align:left;">
				<Option value="Choose country">Choose country</Option>
				
				<Option value="CW"<?php if($_GET['country'] == 'CW') print " selected" ?>>World Wide Base</Option>
				<Option value="bolivia"<?php if($_GET['country'] == 'bolivia') print " selected" ?>>Bolivia</Option>				
				<Option value="china"<?php if($_GET['country'] == 'china') print " selected" ?>>China</Option>
				<Option value="colombia"<?php if($_GET['country'] == 'colombia') print " selected" ?>>Colombia</Option>
				<Option value="india"<?php if($_GET['country'] == 'india') print " selected" ?>>
                India</Option>
                <Option value="kenya"<?php if($_GET['country'] == 'kenya') print " selected" ?>>
                Kenya</Option>
				<Option value="spain"<?php if($_GET['country'] == 'spain') print " selected" ?>>Spain</Option>
				<Option value="sweden"<?php if($_GET['country'] == 'sweden') print " selected" ?>>Sweden</Option>
				<Option value="malmo"<?php if($_GET['country'] == 'malmo') print " selected" ?>> - Malmo</Option>
				<Option value="vasteras"<?php if($_GET['country'] == 'vasteras') print " selected" ?>>- Vasteras</Option>
				<Option value="tunisia"<?php if($_GET['country'] == 'tunisia') print " selected" ?>>Tunisia</Option>
				<!-- Option value="sweden"<?php //if($_GET['country'] == 'sweden') print " selected" ?>>Sweden</Option> 
				<Option value="russia"<?php //if($_GET['country'] == 'china') print " selected" ?>>Russia</Option>-->

		  </Select>
		</form>
                    </li>
</ul>
		 <div  id="topsearch">
                <?php get_search_form(); ?> 
            </div>
            <br />

		<?php if(get_theme_option('socialnetworks') != '') {
			?>
    			<div class="addthis_toolbox">   
    			    <div class="custom_images">
    			            <a class="addthis_button_twitter"><img src="<?php bloginfo('template_directory'); ?>/images/socialicons/twitter.png" width="32" height="32" alt="Twitter" /></a>
    			            <a class="" href="http://www.facebook.com/pages/CW-Connecting-World/220202124672682" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/socialicons/facebook.png" width="32" height="32" alt="Facebook" border="0" /></a>
    			          
                            <a class="addthis_button_linkedin"><img src="<?php bloginfo('template_directory'); ?>/images/socialicons/linkedin.png" width="32" height="32" alt="linkedin" /></a>
                            
                            <a class="addthis_button_favorites"><img src="<?php bloginfo('template_directory'); ?>/images/socialicons/favorites.png" width="32" height="32" alt="Favorites" /></a>
    			            
                            <a class="addthis_button_more"><img src="<?php bloginfo('template_directory'); ?>/images/socialicons/more.png" width="32" height="32" alt="More" /></a>
    			    </div>
    			   <script src="<?php bloginfo('template_directory'); ?>/js/addthis_widget.js" type="text/javascript"></script>
                </div>
    			<?php
    		}
    	?>
		
        <?php
		if(get_theme_option('rssbox') == 'true') {
			?>
    			<div class="rssbox">
    				<a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/rss.png"  alt="RSS Feed" title="RSS Feed" style="vertical-align:middle; margin-right: 5px;"  /></a><a href="<?php bloginfo('rss2_url'); ?>"><?php echo get_theme_option('rssboxtext'); ?></a>
    			</div>
    			<?php
    		}
    	?>
    	  
    	<?php
    		if(get_theme_option('twitter') != '') {
    			?>
    			<div class="twitterbox">
    				<a href="<?php echo get_theme_option('twitter'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/twitter.png"  alt="<?php echo get_theme_option('twittertext'); ?>" title="<?php echo get_theme_option('twittertext'); ?>" style="vertical-align:middle; margin-right: 5px;"  /></a><a href="<?php echo get_theme_option('twitter'); ?>"><?php echo get_theme_option('twittertext'); ?></a>
    			</div>
    			<?php
    		}
    	?>
        
        <?php if(get_theme_option('video') != '') {
			?>
			<div class="sidebarvideo">
				<ul> <li><h2 style="margin-bottom: 10px;">Featured Video</h2>
				<object width="270" height="200"><param name="movie" value="http://www.youtube.com/v/<?php echo get_theme_option('video'); ?>&hl=en&fs=1&rel=0&border=1"></param>
					<param name="allowFullScreen" value="true"></param>
					<param name="allowscriptaccess" value="always"></param>
					<embed src="http://www.youtube.com/v/<?php echo get_theme_option('video'); ?>&hl=en&fs=1&rel=0&border=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="270" height="200"></embed>
				</object>
				</li>
				</ul>
			</div>
		<?php
		}
		?>
        
		<div id="googletext" style="display:none">
                        <img src="<?php bloginfo('template_url'); ?>/images/close.png" width="25" height="25" style="float:right; margin: 5px 5px 0 0;" alt="close" />
                        <b style="font-size: 14px; font-family: arial; color: rgb(0, 56, 130);margin-left: 25px;">
                        TRANSLATION</b><br />
                        <p style="width:170px; text-align: center; font-size:11px; font-weight:normal;">
                                <b>Note!</b>
								<br />
                                This translation is automatically
                                generated using <a href="http://www.microsofttranslator.com/widget/?ref=MSTWidget">Bing
                                Translate</a>. Please be advised that
                                the translation will not be 100%
                                accurate.<br /><br />
                                This is a test version. Please
                                use the <img src="<?php bloginfo('template_url'); ?>/images/bingtr.gif" width="26" height="20" alt="bing translate button" /> button when
                                switching from one language to
                                another, otherwise a mix of two
                                or more languages may occur.       </p>                 
         </div>
		 
    	<!--affichage des news -->
			<?php  if(is_front_page() )  { ?>
			<div class="bloc_news" id="bloc_news2">				
				<a href="<?php $monUrl ?>/subscribe-for-cw-news"><IMG SRC="<?php bloginfo('template_url'); ?>/images/nl_index_news.jpg" WIDTH="291" name="nl_news" onmouseover="document.nl_news.src='<?php bloginfo('template_url'); ?>/images/nl_index_news_hoover.jpg'" onmouseout="document.nl_news.src='<?php bloginfo('template_url'); ?>/images/nl_index_news.jpg'" HEIGHT="54" BORDER="0" ALT=""></a><br />
				
				<div style="margin-top:10px; margin-left:5px;"> 					
					<Label><strong>Choose from News Archive </strong></Label><br />		
					<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">	
						<option> </option>
						<option value="<?php echo $monurl; ?>/archives-news">ALL</option>	
						<option disabled=""> ---- Year ---- </option>
						<?php wp_get_archives( 'cat=-1&type=yearly&format=option' ); ?>
					</select>				
				</div> 
				
				<?php
				query_posts("category_name=News&posts_per_page=2&order=DESC&orderby=post_date");
				while (have_posts()) : the_post(); ?>
				<div class="postnews" id="post-<?php the_ID(); ?>">
					<div class="datenews" style='background-image: url("<?php bloginfo('template_url'); ?>/images/news_date.bmp"); background-repeat: no-repeat;'>
						<strong><?php the_time('Y/m/d') ?></strong>
					</div>
					<div class="title_news"><a href="<?php echo $monurl; ?>/news" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
						<div class="entry">
						
							<?php if(catch_that_image() != "") {?>
							<img src="<?php echo catch_that_image(); ?>" class="img_colum" width="60" height="70"/>
							<?php } ?>
							
							<?php //the_content('read more'); ?>
							
							<?php //the_excerpt() 
							echo limit_words(get_the_excerpt(), '60');
							?>
							
						</div>
				</div>
				<?php
				endwhile;		
				?>
			</div>

			<div id="bloc_news1" style="display:none">				
				<a href="<?php $monUrl ?>/subscribe-for-cw-news"><IMG SRC="<?php bloginfo('template_url'); ?>/images/nl_index_news.jpg" WIDTH="291" name="nl_news" onmouseover="document.nl_news.src='<?php bloginfo('template_url'); ?>/images/nl_index_news_hoover.jpg'" onmouseout="document.nl_news.src='<?php bloginfo('template_url'); ?>/images/nl_index_news.jpg'" HEIGHT="54" BORDER="0" ALT=""></a><br />
				
				<div style="margin-top:10px; margin-left:5px;"> 					
					<Label><strong>Choose from News Archive </strong></Label><br />		
					<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">	
						<option> </option>
						<option value="<?php echo $monurl; ?>/archives-news">ALL</option>	
						<option disabled=""> ---- Year ---- </option>
						<?php wp_get_archives( 'cat=-1&type=yearly&format=option' ); ?>
					</select>				
				</div> 
				
				<?php
				query_posts("category_name=News&posts_per_page=2&order=DESC&orderby=post_date");
				while (have_posts()) : the_post(); ?>
				<div class="postnews" id="post-<?php the_ID(); ?>">
					<div class="datenews" style='background-image: url("<?php bloginfo('template_url'); ?>/images/news_date.bmp"); background-repeat: no-repeat;'>
						<strong><?php the_time('Y/m/d') ?></strong>
					</div>
					<div class="title_news"><a href="<?php echo $monurl; ?>/news" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
						<div class="entry">
						
							<?php if(catch_that_image() != "") {?>
							<img src="<?php echo catch_that_image(); ?>" class="img_colum" width="60" height="70"/>
							<?php } ?>
							
							<?php //the_content('read more'); ?>
							
							<?php //the_excerpt() 
							echo limit_words(get_the_excerpt(), '60');
							?>
							
						</div>
				</div>
				<?php
				endwhile;		
				?>
			</div>
			
		<!-- fin -->
		
		<!-- affichage liste des choix d'affichage les columnists --->		
		<h2>CW Columns</h2>
		<div style="margin-top:10px;"> 
			<strong>Welcome to the CW Columnists-read and enjoy</strong><br />
			<Label><strong>Choose from Archive </strong></Label><br />		
			<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">	
			<option> </option>
			<option value="<?php echo $monurl; ?>/archives">ALL</option>	
			<option disabled=""> ---- Year ---- </option>
			<?php wp_get_archives( 'cat=-18&type=yearly&format=option' ); ?>
			<!-- <option disabled=""> ---- Author ---- </option> -->
			<?php //wp_get_archives( 'cat=1&type=monthly&format=option' ); ?>
			</select>				
		</div> 
		
		<!-- affichage 2 columnistes -->
		<div class="box_columnit">
			<?php
				$i = 0 ;
				query_posts("cat=1&posts_per_page=2&order=DESC&orderby=post_date");
				while (have_posts()) : the_post(); ?>
				<div class="postnews" id="post-<?php the_ID(); ?>" >										
						<div class="entry" style="background-color: rgb(212, 231, 246); padding: 5px; border: 1px solid rgb(0, 56, 130); text-align: left; font-weight:normal; font-size:11px;" >
							<div class="title_news" style="margin-bottom:5px;"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></div>
							<?php //the_content('read more'); ?>
							
							<img src="<?php echo catch_that_image(); ?>" class="img_colum" width="60" height="70"/>
							
							<!-- <img src="<?php //bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php //echo catch_that_image() ?>&h=60&w=60&zc=1" /> -->
							
							<?php
							$i = $i + 1 ;
							if($i == 1)
							{
								//the_excerpt() 
								echo '<div class="present_colum">';
								echo limit_words(get_the_excerpt(), '37');						
								echo '</div>';
								echo '<div style="border-bottom: 3px solid rgb(0, 56, 130); width: 150px; margin-left: 70px;"></div>';
								echo '<br />';
								echo limit_words_pos(get_the_excerpt(), '60', '45');
							}
							else
							{
								//the_excerpt() 
								echo '<div class="present_colum">';
								echo limit_words(get_the_excerpt(), '39');									
								echo '<br />';
								echo limit_words_pos(get_the_excerpt(), '1', '39');
								echo '</div>';
								echo '<div style="border-bottom: 3px solid rgb(0, 56, 130); width: 150px; margin-left: 70px;"></div>';
								echo '<br />';
								echo limit_words_pos(get_the_excerpt(), '70', '47');
							}
							
							?>
							 </a>
						</div>												
					
				</div>
				<?php
				endwhile;		
				?>
			</div>
			
			<ul>
		
		
				<?php 
					
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 1') ) : ?>
	
					
				
					<li><h2><?php _e('Recent Posts'); ?></h2>
				               <ul>
						<?php wp_get_archives('type=postbypost&limit=5'); ?>  
				               </ul>
					</li>
					
					<li id="tag_cloud"><h2>Tags</h2>
						<?php wp_tag_cloud('largest=16&format=flat&number=20'); ?>
					</li>
				
					<li> 
						<h2>Calendar</h2>
						<?php get_calendar(); ?> 
					</li>
					
				
				
				<?php include (TEMPLATEPATH . '/recent-comments.php'); ?>
				<?php if (function_exists('get_recent_comments')) { get_recent_comments(); } ?>
				
				<li><h2>Meta</h2>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
						<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
						<?php wp_meta(); ?>
					</ul>
					</li>
						
					
					
				<?php endif; ?>
				
				<?php } ?>		
		<!-- fin  -->
			</ul>
			
		<?php if(get_theme_option('ad_sidebar1_bottom') != '') {
		?>
		<div class="sidebaradbox">
			<?php echo get_theme_option('ad_sidebar1_bottom'); ?>
		</div>
		<?php
		}
		?>
		
		
		</div>
	</div>
    
	<div class="span-4 last" id="span-4">
        
		<div class="sidebar right-sidebar">
            <?php if(get_theme_option('ads_125') != '') {
        		?>
        		<div class="sidebaradbox125">
        			<?php sidebar_ads_125(); ?>
        		</div>
        	<?php } ?>
            
          	
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
				document.getElementById('googletext').style.display = 'block';	
				document.getElementById('bloc_news1').style.display = 'block';	
				document.getElementById('bloc_news2').style.display = 'none';				
				}
				function noshow(){
				document.getElementById('googletext').style.display = 'none';
				document.getElementById('bloc_news1').style.display = 'none';
				document.getElementById('bloc_news2').style.display = 'block';					
				}
			</script>
                    <div id="translate" >
						<div id="MicrosoftTranslatorWidget" style="width: 142px; min-height: 83px; border-color: #3A5770; background-color: #78ADD0;">
						<noscript><a href="http://www.microsofttranslator.com/bv.aspx?a=http%3a%2f%2fcw-connectingworld.com%2f">Translator</a><br />Powered by <a href="http://www.microsofttranslator.com">Microsoft® Translator</a></noscript></div>
						<script type="text/javascript"> /* <![CDATA[ */ setTimeout(function() { var s = document.createElement("script"); s.type = "text/javascript"; s.charset = "UTF-8"; s.src = ((location && location.href && location.href.indexOf('https') == 0) ? "https://ssl.microsofttranslator.com" : "http://www.microsofttranslator.com" ) + "/ajax/v2/widget.aspx?mode=manual&from=en&layout=ts"; var p = document.getElementsByTagName('head')[0] || document.documentElement; p.insertBefore(s, p.firstChild); }, 0); /* ]]> */ </script> 
                        <!-- <div id="google-translate" onmouseover="zone_show()" onmouseout="noshow()"></div>
                        <input id="reset" type="reset" value="Reset" style="margin-top:12px; margin-bottom:16px;" /> -->
                            <p style="margin-top:-3px; font-size: 12px; font-weight:bold; font-family: arial; color: rgb(0, 56, 130);">
                                Choose your own<br />
                                language here.
                            </p>
                    </div>
                   
  
                <script type="text/javascript">
                    jQuery.noConflict();
                     jQuery(document).ready(function(){
                     jQuery(".jq-translate-ui").val("English");
					 jQuery("#MSTWHeaderText").text("Translator");
                    });
                     jQuery("div#translate").hover( function(){
                             jQuery("div#googletext").css("display", "block");
                             jQuery("div#translate").unbind('mouseenter mouseleave');
                    });
                     jQuery("div#googletext").click( function() {
                             jQuery(this).hide()
                    });
                </script>
            </li>
            <li>
            <br />
            <div align="center">
           <embed height="120" width="120" wmode="transparent" allowscriptaccess="always" flashvars="minurl=<?php bloginfo("url")?>/work-with-us/" quality="high"  name="einstein" id="einstein" style="undefined" src="<?php bloginfo('template_directory'); ?>/images/ads/120x120einstein.swf" type="application/x-shockwave-flash"></embed>
</div>
            </li>
			
             <li>
            <br /><br />
            <div align="center"><embed width="120" height="300" allowscriptaccess="always" flashvars="minurl=<?php bloginfo("url")?>/work-with-us/" quality="high"  name="banner_eng" id="banner_eng" style=" border:#003399 1px solid;" src="<?php bloginfo('template_directory'); ?>/images/ads/banner_eng.swf" type="application/x-shockwave-flash"></embed></div>
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
				<embed width="120" height="120" wmode="transparent" allowscriptaccess="always" flashvars="minurl=<?php bloginfo("url")?>/forum/" quality="high"  name="forum" id="forum" style="undefined" src="<?php bloginfo('template_directory'); ?>/images/ads/120x120forum.swf" type="application/x-shockwave-flash"></embed>
       </div>
            </li>
                 <li>
            <br /><br />
			
			
		            <div align="center">
          	<embed width="120" height="120" wmode="transparent" allowscriptaccess="always" flashvars="minurl=<?php bloginfo("url")?>/work-with-us/" quality="high"  name="become" id="become" style="undefined" src="<?php bloginfo('template_directory'); ?>/images/ads/120x120become.swf" type="application/x-shockwave-flash"></embed>

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
	
</div>
