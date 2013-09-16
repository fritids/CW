<?php 
if( $_GET['id'] ) {
	global $wpdb;	
		//$continent_id = (int)$_POST['continent_id']; 
if (!defined('WP_PLUGIN_URL')) {
require_once( realpath('../../../../').'/wp-config.php' );
}
require_once PLUGIN_DIR ."/include/func.php";

$continent = (int)$_GET['id'];
?>
<div id="groupArea">Testing <?php echo $continent;
get_groups_ajax($continent); ?>
</div>
	<div id="groupAreaLoading" class="groupAreaLoading" style="display: none">
		<span>Loading Please Wait...</span>
		<!-- End Main Area -->
	</div>
<?php }