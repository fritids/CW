 <?php
  /*
  Template Name: new-companies
  */
 get_header(); ?>
<?php $id_cp= $_REQUEST['cp']; ?>
<div class="span-24" id="contentwrap">
	<div class="span-13"> 
		<div id="content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" id="post-<?php the_ID(); ?>">
			<?php
			if(!$id_cp)
			{				
			?>
				<h2 class="title"><?php the_title(); ?></h2>
			<?php }
			else
			{
				echo '<h2 class="title">Company profile</h2>';
			}			
			?>
				<div class="entry">
                <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
					<?php 
						if(!$id_cp)
						{				
							the_content('<p class="serif">Read the rest of this page &raquo;</p>'); 
						}
					?>
	
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                   
	<?php 
	
	if($id_cp)
	{
		include (TEMPLATEPATH .'/company/company-profile.php');
	}
	else
	{
		list_last_50_company();
	}
	
	?>
            </div>
			</div>
            </div>
			<?php endwhile; endif; ?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		</div>
	</div>
	

<?php get_sidebars(); ?>

</div>
<?php get_footer(); ?>