 <?php
  /*
  Template Name: business-support
  */
 get_header(); ?>

 <div class="span-24" id="contentwrap">
	<div class="span-13"> 
		<div id="content">	

			            <div class="postwrap">
			<div class="post" id="post-173">
				<div class="entry">

                    					<p><img style="float: left; margin-right: 15px;" title="Logo-cw" src="<?php $monUrl ?>/wp-content/themes/connectingworld1/images/logo_cw.png" alt="Logo" width="100" height="315" /></p>
<h2>Welcome to CW Business Support</h2>
<?php   if ( !$user_ID ) {
echo '<p style="color: #e61c18;"><strong>Note! This is a service for registered members only.</strong> ' ;
}
?>
</p>
<p style="text-align: justify;">As a  registered member you can contact us and ask questions for free  about  our services, prices, arrangements, education or other things that  is  on your mind.<br />
Maybe you also want assistance in finding a business-partner in a   specific country or want to get help with creating concrete business in a   country.</p>
<p style="text-align: left;"><img class="size-full wp-image-893 alignleft" style="margin: 3px;" title="salesgen" src="<?php $monUrl ?>/wp-content/uploads/salesgen.jpg" alt="" width="150" height="206" />Even if the question isn&acute;t a priority to you, it is still our policy to  answer your question as quickly as possible, at the most within three  working days.<br />
Since this is a service for our members only, to view further information  you need to be registered and logged in.</p>
<p>&nbsp;</p>

<?php   if ( !$user_ID ) {
echo '<hr />' ;
echo '<p><strong><a style="color: #3691c8;" href="'.$monUrl.'/register-step1">Register as a member </a> and get logged in.</strong></p>';
}
?>


	
					
				</div>
			</div>
			</div>
		
    				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		</div>

	</div>
	

<?php get_sidebars(); ?>

</div>
<?php get_footer(); ?>