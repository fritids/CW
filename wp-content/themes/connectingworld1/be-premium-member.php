<?php
 ob_start();
  /*
  Template Name: premium-member
  */
  
 get_header(); ?>
<?php 



 if(isset($_POST['submitted'])) {
	  $Errorfields='';
	  if ( !$user_ID ) {
		   $Errorfields .= '<li>You must be logged To upgrade your account.</li>';
		  $hasError = true;
	  }
	  else {
		     if(trim($_POST['acceptit']) == false) {
		  $Errorfields .= '<li>You must accept our condition first.</li>';
		  $hasError = true;
	  } else {
	
 $urlredirect= bloginfo('url').'/complete-your-profile-for-payment';
	  wp_redirect($urlredirect); exit;
	   }
	  }
	 
 }

?>

<div class="span-24" id="contentwrap" style="background-color:#FFF;">		
	<div class="span-13"   style="width:790px; background-color:#FFF; min-height:600px;"> 
	
    	<div id="content" style="background-color:#FFF;">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="entry">
                      <?php if($Errorfields != '') { ?>
						  <ul class="error"><? echo $Errorfields;?></ul> 
					  <?php }else
					 ?>
                    <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
                    
              
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                     <hr>
  <form action="/premium-member" method="POST">
 
<div align="left" style="text-align:left; padding-left:5px;">
  <input type="checkbox"  name="acceptit" id="acceptit" value="true"<?php if(isset($_POST['acceptit']) && $_POST['acceptit'] == true) echo ' checked="checked"'; ?> />
  <label for="acceptit" style="text-align:left;">
  I agree to the following. 
  </label> <span class="rouge"> *</span>
  </div>
    - I accept the  <a href="<?php bloginfo('url'); ?>/cw-terms?popup=true" title="CW Termes" rel="gb_pageset[nice_pages]" class="bluelink">
 CW Connecting Worlds Terms and Conditions</a> 
  

  and <a href="<?php bloginfo('url'); ?>/cw-privacy-policy?popup=true" title="CW Termes" rel="gb_pageset[nice_pages]" class="bluelink">CW Privacy Policy</A>  <br>
   <?php if ( !$user_ID ) {?> <a  href="<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_option('template'); ?>/premium_popup.php?redirect=<?php the_permalink(); ?>?iframe=false&width=100%&height=100%"   rel="gb_page_center[400,550]"><input	type="button" name="submitted" value="Go To Pay"></a><?php }
   else{
   $users = get_user_profile($user_ID);
   if($users->premium != NULL)
   {
		?> <a  href="<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_option('template'); ?>/premium_popup_prem.php?redirect=<?php the_permalink(); ?>?iframe=false&width=100%&height=100%"   rel="gb_page_center[400,550]"><input	type="button" name="submitted" value="Go To Pay"></a><?php
   }
   else {
   ?><input	type="submit" name="submitted" value="Go To Pay"><?php } } ?>
   
   </form>
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				</div>
			</div>
			</div>
	<?php
	if (is_page(62))
	{
$args = array( 'numberposts' => 3 );
$lastposts = get_posts( $args );
foreach($lastposts as $post) : setup_postdata($post); ?>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php the_excerpt() ?>
     <div class="readmorecontent">
					<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read More &raquo;</a>
				</div>
<?php endforeach; 

}?>
	
    		<?php endwhile; endif; ?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		</div>
	</div>


<?php include (TEMPLATEPATH . "/sidebar2.php"); ?>

</div>
<?php get_footer(); ob_end_flush(); ?>