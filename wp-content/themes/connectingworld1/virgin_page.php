 <?php
  /*
  Template Name: virgin-page
  */
get_header(); ?>
<div class="span-24" id="contentwrap">
	<div class="span-13" style="width:100%; background-color:#FFF;"> 
		<div id="content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="entry" style="width:100%">
                    <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                    <?php if(isset($_GET['popup'])){ ?>
                    <input type="button" value="<?php _e('Return') ?>" onclick="self.setTimeout('parent.parent.GB_hide()', 1000);"/>
                    <?php }else{ ?>
                    <input type="button" value="<?php _e('Return') ?>" onclick="window.location.href='register-step1'"/>
                    <?php }?>
                        
				</div>
			</div>
			</div>

    		<?php endwhile; endif; ?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		</div>
	</div>


</div>
<?php get_footer(); ?>