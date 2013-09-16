<?php 
global $wpdb;

include PLUGIN_DIR . '/include/func.php';

if ( $_GET['group'] && $_GET['action']=='delete' ){
	
	$id = (int)$_GET['group'];
	
	$wpdb->query("
	DELETE FROM ".$wpdb->prefix."groups
	WHERE id = $id");
	$wpdb->query("
	DELETE FROM ".$wpdb->prefix."company_group
	WHERE group_id = $id");
	
	echo "Group deleted";

}
?>
<div class="wrap">
	<h2><?php _e("Global Business Group"); ?></h2>
	
	
	<table class="widefat fixed" cellspacing="0">
		<thead>
			<tr class="thead">
				<th scope="col" id="cb" class="manage-column column-cb check-column" style=""><input type="checkbox" /></th>
				<th scope="col" id="group_name" class="manage-column column-group_name" style=""><?php _e("Group"); ?></th>
				<th scope="col" id="country" class="manage-column column-country" style=""><?php _e("Country"); ?></th>
				<th scope="col" id="group_focus" class="manage-column column-group_focus" style=""><?php _e("Focus"); ?></th>
				<th scope="col" id="group_man"class="manage-column column-group_man" style=""><?php _e("Group Manager"); ?></th>
				<th scope="col" id="work_mail"class="manage-column column-work_mail" style=""><?php _e("Work mail"); ?></th>
				<th scope="col" id="group_presentation"class="manage-column column-group_presentation" style=""><?php _e("Group Presentation"); ?></th>
			</tr>
		</thead>
		<tbody id="users" class="list:user user-list">
						<?php 
						$groups = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."groups");
						$style = "";
						foreach ( $groups as $group ) {	
						
						// Get continent name
						$country = $wpdb->get_var( $wpdb->prepare( "SELECT country_name FROM ".$wpdb->prefix."country WHERE country_id = %d", $group->country) );
						?>

							<tr id="group-<?php echo $group->id; ?>"<?php echo $style; ?>>
								<th scope="row" class="check-column"><input type="checkbox" name="groups[]" id="group_<?php echo $group->id; ?>" name="group_<?php echo $group->id; ?>" value="<?php echo $group->id; ?>"></th>
								<td class="group_name column-group_name">
									<strong><?php if ( current_user_can("edit_users") ) echo "<a href=\"", esc_url(add_query_arg("wp_http_referer", urlencode(esc_url(stripslashes($_SERVER["REQUEST_URI"]))), "admin.php?page=edit-gbg&group=$group->id&action=edit")) , "\">$group->group_name</a>"; else echo $group->group_name; ?></strong><br />
									<div class="row-actions">
										<?php if ( current_user_can("edit_users") ) echo "<span class=\"edit\"><a href=\"", esc_url(add_query_arg("wp_http_referer", urlencode(esc_url(stripslashes($_SERVER["REQUEST_URI"]))), "admin.php?page=edit-gbg&group=$group->id&action=edit")), "\">", __("Edit"), "</a></span>\n"; ?>
										<?php if ( current_user_can("edit_users") ) echo "<span class=\"delete\"><a href=\"", esc_url(add_query_arg("wp_http_referer", urlencode(esc_url(stripslashes($_SERVER["REQUEST_URI"]))), "admin.php?page=gbg&group=$group->id&action=delete")), "\">", __("Delete"), "</a></span>\n"; ?>
									</div>
								</td>
								<td class="country column-country"><?php echo $country; ?></td>
								<td class="group_focus column-group_focus"><?php echo $group->group_focus; ?></td>
								<td class="group_man column-group_man"><?php echo $group->group_manager; ?></td>
								<td class="work_mail column-work_mail"><a href="mailto:<?php echo $group->work_mail; ?>" title="<?php esc_attr_e("Work mail: "); echo $group->work_mail; ?>"><?php echo $group->work_mail; ?></a></td>
								<td class="group_presentation column-group_presentation"><?php echo smarty_modifier_mb_truncate($group->group_presentation, 150); ?></td>
							</tr>
						<?php } ?>

		</tbody>
	</table>
	
</div> <!-- .wrap -->