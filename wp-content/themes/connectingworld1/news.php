 <?php
  /*
  Template Name: news
  */
 get_header(); ?>
 
 <div class="span-24" id="contentwrap">
	<div class="span-13"> 
		<div id="content">	
			
			<h2>News</h2>

 <?php
        $lastposts = get_posts('category_name=News&posts_per_page=10&order=DESC&orderby=post_date');
        foreach($lastposts as $post) :
        setup_postdata($post);
    ?>
		 <div class="postwrap">
			<div <?php post_class() ?>>
			<h2 class="title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="postdate">Posted by <strong><?php the_author() ?></strong> on  <?php the_time('F jS, Y') ?> <?php if (current_user_can('edit_post', $post->ID)) { ?> | <?php edit_post_link('Edit', '', ''); } ?></div>
				
			<div class="entry">
				<?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(200,160), array('class' => 'alignleft post_thumbnail')); } ?>
					<img src="<?php echo catch_that_image(); ?>" class="img_colum" />
					<?php the_excerpt() ?>
			</div>
			<div class="postmeta"><img src="<?php bloginfo('template_url'); ?>/images/folder.png" /> Posted in <?php the_category(', ') ?> <?php if(get_the_tags()) { ?> <img src="<?php bloginfo('template_url'); ?>/images/tag.png" /> <?php  the_tags('Tags: ', ', '); } ?>  <img src="<?php bloginfo('template_url'); ?>/images/comments.png" /> <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>
			<div class="readmorecontent">
				<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read More &raquo;</a>
			</div>
			</div>
		</div>
			<?php endforeach;?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		</div>
	</div>

	

<?php // Récupération de la sidebar
    get_sidebar();
?>
</div>

<?php // Récupération du footer
    get_footer();
?>