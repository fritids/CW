<?php
  /*
  Template Name: Forum_phpbb2
  */
 get_header(); ?>
<div class="span-24" id="contentwrap" style="background-color:#FFF;">
	<div class="span-13"   style="width:790px; background-color:#FFF; height:1000px;"> 
		<div id="content" style="background-color:#FFF;">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap" style="background-color:#FFF;">
			<div class="post" id="post-<?php the_ID(); ?>">
		
				<div class="entry">
                <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>  <?php wp_lostpassword_url(); ?>
					<iframe src="<?php echo get_option('siteurl'); ?>/phpBB3/" style="min-height:1200px; height:auto;" title="Forum" width="750" align="middle"></iframe>
</div>
			</div>
            </div>
			<?php endwhile; endif; ?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		</div>
	</div>
	

<?php include (TEMPLATEPATH . "/sidebar2.php"); ?>

</div>
<?php get_footer(); ?>