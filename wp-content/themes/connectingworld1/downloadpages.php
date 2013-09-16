<?php
  /*
  Template Name: Download-Pages
  */
 get_header(); ?>
 <script type="text/javascript">
function linkeddown (val)
{
	if (val == '')
	{
		window.location.href='<?php echo get_option('siteurl'); ?>/downloads';
	}
	else {
				window.location.href='<?php echo get_option('siteurl'); ?>/download-'+val;
}
}
function openmov(m)
{
	if(m=='1')
	{
	var w=window.open("wp-content/uploads/swfmedia/CW_mov_eng.php","theMovie", "width=670,height=420,scrollbars=yes,locationbar=no,menubar=no,personalbar=no,resizable=1,toolbar=no,status=no,screenX=100,screenY=100,top=100,left=100");
	w.focus();
	}
	if(m=='2')
	{
	var w=window.open("wp-content/uploads/swfmedia/CW_mov_swe.php","theMovieSwe", "width=670,height=420,scrollbars=yes,locationbar=no,menubar=no,personalbar=no,resizable=1,toolbar=no,status=no,screenX=100,screenY=100,top=100,left=100");
	w.focus();
	}
	if(m=='3')
	{var w=window.open("wp-content/uploads/swfmedia/flash_mov_en.php","flashMovEng", "width=650,height=535,scrollbars=yes,locationbar=no,menubar=no,personalbar=no,resizable=1,toolbar=no,status=no,screenX=100,screenY=100,top=100,left=100");
	w.focus();
	}
	if(m=='4')
	{var w=window.open("wp-content/uploads/swfmedia/flash_mov_swe.php","flashMovEng", "width=650,height=535,scrollbars=yes,locationbar=no,menubar=no,personalbar=no,resizable=1,toolbar=no,status=no,screenX=100,screenY=100,top=100,left=100");
	w.focus();
	}
}
</script>


<div class="span-24" id="contentwrap">
	<div class="span-13"> 
		<div id="content">	
			<?php 
			   $posSe=strpos($_SERVER['REQUEST_URI'],"oad-sw");
			   $posSp=strpos($_SERVER['REQUEST_URI'],"oad-sp");
			   $posCh=strpos($_SERVER['REQUEST_URI'],"oad-ch");
			   ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="entry">
               <h3> Download CW PR-materials</h3>
               
Welcome to the CW downloads directory. Here you can download or view the different PR and
information materials we have at present. Downloads in:
                <form name="fck" style="float:right;">
		
<b style="text-align:center;">Select language:</b>
		<Select  name="country-selected" onchange="linkeddown(this.value);" style="width:150px; text-align:left;">
				
				
				<OPTION VALUE="" >English</OPTION>				
				<OPTION VALUE="sw" <?php if($posSe !== false) print "selected";?> >Swedish</OPTION>
				<OPTION VALUE="sp" <?php if($posSp !== false) print "selected";?> >Spanish</OPTION>
				<OPTION VALUE="ch" <?php if($posCh !== false) print "selected";?> >Chinese</OPTION>
               

		  </Select>
		</form>
                    <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
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


<?php get_sidebars(); ?>
</div>
<?php get_footer(); ?>