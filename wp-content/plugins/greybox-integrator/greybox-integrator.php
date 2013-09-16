<?php
/*
Plugin Name: GreyBox Integrator
Version: 1.0
Plugin URI: http://ajaydsouza.com/wordpress/plugins/greybox-integrator/
Description: <a href="http://orangoo.com/labs/GreyBox/">GreyBox</a> is a script can be used to display websites, images and other content in a beautiful way. <a href="http://ajaydsouza.com/wordpress/plugins/greybox-integrator/">GreyBox Integrator</a> provides a one-click installation of GreyBox on your WordPress blog.
Author: Ajay D'Souza 
Author URI: http://ajaydsouza.com/
*/

if (!defined('ABSPATH')) die("Aren't you supposed to come here via WP-Admin?");

define('ALD_GREYBOX', dirname(__FILE__));

// Pre-2.6 compatibility
if ( !defined('WP_CONTENT_URL') )
	define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if ( !defined('WP_CONTENT_DIR') )
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
// Guess the location
$greybox_path = WP_CONTENT_DIR.'/plugins/'.plugin_basename(dirname(__FILE__));
$greybox_url = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__));


function ald_greybox()
{
	global $ald_blog_url;
	global $greybox_path;
	global $greybox_url;
?>
<script type="text/javascript">
<!--
var GB_ROOT_DIR = "<?php echo $greybox_url ?>/greybox/";
-->
</script>
<script type="text/javascript" src="<?php echo $greybox_url ?>/greybox/AJS.js"></script>
<script type="text/javascript" src="<?php echo $greybox_url ?>/greybox/AJS_fx.js"></script>
<script type="text/javascript" src="<?php echo $greybox_url ?>/greybox/gb_scripts.js"></script>
<link href="<?php echo $greybox_url ?>/greybox/gb_styles.css" rel="stylesheet" type="text/css" />
<?php
}

if (is_admin() || strstr($_SERVER['PHP_SELF'], 'wp-admin/')) {
	require_once(ALD_GREYBOX . "/quicktag.inc.php");
}

//add action when the head is written
add_action('wp_head', 'ald_greybox');
?>