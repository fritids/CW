 <?php
  /*
  Template Name: business-directory
  */
 get_header(); ?>
<style>
table a:visited, h2 a:visited { color:blue;}
#categs a {cursor: pointer;}
</style>

<script type="text/javascript" src="<?php echo site_url("wp-content/themes/connectingworld1/business-directory.js");?>" ></script>
<div class="span-24" id="contentwrap">
<div class="span-13"> 
		<div id="content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" id="post-<?php the_ID(); ?>">
			<h2 class="title"><?php the_title(); ?></h2>
				<div class="entry">
                <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                   
<div id="loading-search" style=" width:252px;height:17px;display:none">
</div>	
<div id="categs" style="margin-top:20px;">

<?php $cats = get_unspsc_level1();?>
<ul>
<h3>Products:</h3>
<?php foreach ($cats as $cat){if( !mb_strpos(mb_strtolower($cat->title), "services" )){?><li><a onclick="senddata(<?php   echo $cat->segment; ?>)"><?php   echo $cat->title; ?></a></li><?php } }?>
<h3>Services:</h3>
<?php foreach ($cats as $cat){ if(! mb_strpos(mb_strtolower($cat->title), "services" ) === false){?><li><a onclick="senddata(<?php   echo $cat->segment; ?>)"><?php   echo $cat->title; ?></a></li><?php } }?>
</ul>
</div>
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