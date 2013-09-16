<?php
  /*
  Template Name: phpbb-test
  */
 get_header(); ?>
<div class="span-24" id="contentwrap" style="background-color:#FFF;">
	<div class="span-13"   style="width:790px; background-color:#FFF; height:600px;"> 
		<div id="content" style="background-color:#FFF;">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap" style="background-color:#FFF;">
			<div class="post" id="post-<?php the_ID(); ?>">
		
				<div class="entry">
                <?php echo "////".$leur;?>
                <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>  <?php wp_lostpassword_url(); ?>
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
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