<?php
/*
Plugin Name: Hello World 1
Plugin URI: http://ocaoimh.ie/
Description: A simple hello world plugin
Version: 0.1
Author: Donncha O Caoimh
Author URI: http://ocaoimh.ie/
*/

function hello_world_one_pages() {
	add_options_page('Hello World 1', 'Hello World 1', 'manage_options', 'helloworld1', 'hello_world_one');
}
add_action('admin_menu', 'hello_world_one_pages');


function hello_world_one() {
	?><div class="wrap">
	Hello World!
	</div><?php
}

?>
