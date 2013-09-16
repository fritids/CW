<?php
  /*
  Template Name: Index-image
  */
 get_header(); ?>
 
<div class="span-24" id="contentwrap" style="background-color:#FFF;">
<div class="span-13"> 

		<div id="content">	

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="entry">
					
					<?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		
		<div>			
                    <?php
	if ( !$user_ID ) {
		
			echo '<div style="float:right;  margin-right:50px;">
<a target="_blank" href="'.get_option('siteurl') .'/register-step1">

<img height="80" border="0" align="left" width="80" alt="" src="'.get_option('siteurl') .'/wp-content/uploads/icon_free_basic.png" style="margin-top:-135px;" >
<a/>
</div>
';
		}

?>

</div>
				</div>
			</div>

			</div>
			
	<?php
	/*
	if (is_page(62))
	{
$args = array( 'numberposts' => 3 );
$lastposts = get_posts( $args );
foreach($lastposts as $post) : setup_postdata($post); ?>
<img src="<?php $key="Image"; echo get_post_meta($post->ID, $key, true); ?>" alt="<?php the_title(); ?>" />
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php the_excerpt() ?>
     <div class="readmorecontent">
					<a class="readmore" href="<--?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <--?php the_title_attribute(); ?>">Read More &raquo;</a>
				</div> 
<?php endforeach; 

}
*/
?>
	
    		<?php endwhile; endif; ?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		</div>
	</div>

<?php get_sidebars(); ?>
</div>
<?php get_footer(); ?>