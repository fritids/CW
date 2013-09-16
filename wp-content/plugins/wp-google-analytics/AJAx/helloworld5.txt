<?php
/*
Plugin Name: Hello World 5
Plugin URI: http://ocaoimh.ie/
Description: A simple hello world plugin, taken from <a href="http://jquery.bassistance.de/jquery-getting-started.html#rate">here</a>
Version: 0.1
Author: Donncha O Caoimh
Author URI: http://ocaoimh.ie/
*/

/*
Copy rate.php into wp-content/
*/

function helloworld5_scripts() {
	global $current_user;
	if( !$current_user->ID )
		return;
	if( is_single() ) {
		wp_enqueue_script('jquery'); 
	}
}
add_action( 'wp_print_scripts', 'helloworld5_scripts');

function helloworld5_head() {
	global $current_user;
	if( !$current_user->ID )
		return;
	if( !is_single() )
		return;
	?>
<script  type='text/javascript'>
<!--
var currentpost = '';
jQuery(document).ready(function() {
	// generate markup
	var ratingMarkup = ["Please rate: "];
	for(var i=1; i <= 5; i++) {
		ratingMarkup[ratingMarkup.length] = "<a href='#'>" + i + "</a> ";
	}
	// add markup to container and applier click handlers to anchors
	jQuery("#rating").append( ratingMarkup.join('') ).find("a").click(function(e) {
		e.preventDefault();
		// send requests
		jQuery.post("/wp-content/rate.php", {rating: jQuery(this).html(), currentpost: currentpost}, function(xml) {
			// format result
			var result = [
				"Thanks for rating, current average: ",
				jQuery("average", xml).text(),
				", number of votes: ",
				jQuery("count", xml).text()
			];
			// output result
			jQuery("#rating").html(result.join(''));
		} );
	});
});
// -->
</script>
	<?php
}
add_action( 'wp_head', 'helloworld5_head' );

function add_thumb_to_post( $content ) {
	global $post;
	global $current_user;
	if( !$current_user->ID )
		return $content;
	if( !is_single() )
		return $content;
	return $content . "<p><div id='rating'></div></p><script type='text/javascript'>\n<!--\ncurrentpost='{$post->ID}';\n//-->\n</script>";
}
add_action( 'the_content', 'add_thumb_to_post' );
?>
