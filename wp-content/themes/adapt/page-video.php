<?php
/**
 * Template Name: CW Video presentation
 * @package WordPress
 * @subpackage Adapt Theme
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<header id="page-heading">
    <h1><?php the_title(); ?></h1>		
</header>
<!-- /page-heading -->

<article class="post clearfix">
    
<object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" border="0" width="640" height="525" align="top">
		<param name="movie" value="http://www.test-development.cw-connectingworld.com/wp-content/uploads/swfmedia/BildspelQTEng.swf">
		<param name="quality" value="Best">
		<param name="allowScriptAccess" value="sameDomain">
	    <param name="allowFullScreen" value="true">
		<param name="loop" value="false">
        <embed src="http://www.test-development.cw-connectingworld.com/wp-content/uploads/swfmedia/BildspelQTEng.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="640" height="525" quality="Best" loop="false"></object>

	<!-- /entry -->    
</article>
<!-- /post -->

<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>