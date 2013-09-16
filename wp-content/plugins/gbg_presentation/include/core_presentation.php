<?php 
wp_enqueue_script( 'jquery' );
	
// Html template for front-end view
function show_presentation(){

include_once PLUGIN_DIR . '/templates/show_presentation.php';

}
