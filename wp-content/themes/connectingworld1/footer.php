    <div class="span-24">
		<div id="footer">All pages Copyright &copy;<?php print(date(Y)); ?> <a href="<?php bloginfo('home'); ?>"><strong><? /*php bloginfo('name'); */?>CW Connecting World</strong></a>. All rights reserved <?php bloginfo('description'); ?></div>
        <?php // This theme is released free for use under creative commons licence. http://creativecommons.org/licenses/by/3.0/
            // All links in the footer should remain intact. 
            // These links are all family friendly and will not hurt your site in any way. 
            // Warning! Your site may stop working if these links are edited or deleted 
            
        // You can buy this theme without footer links online at http://newwpthemes.com/buy/ ?>
        <div id="credits"><a href="#"><strong></strong></a><a href="#"></a></div>
    </div>
  </div>

</div>
<?php
	 wp_footer();
	echo get_theme_option("footer")  . "\n";
?>
</body>
</html>