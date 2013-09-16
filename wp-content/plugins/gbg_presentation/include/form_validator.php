<?php
function is_valid_email($email) {
  $result = TRUE;
  if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) {
    $result = FALSE;
  }
  return $result;
}

global $wpdb;

if ( wp_verify_nonce($_POST['add_global_group'],'add_gl_gbg') ){
	
	
	// Check necessary data
	if ( !$_POST['group_title'] || $_POST['group_title']=="Enter Group title" )
		$error = __('You must enter Group title');
	elseif ( !$_POST['country']  )
		$error = __('Select a country');
	elseif ( !$_POST['group_man'] || $_POST['group_man']=="Group Manager"  )
		$error = __('Enter Group Manager');
	elseif ( !$_POST['group_focus'] || $_POST['group_focus']=="Focus"  )
		$error = __('Focus field is empty');
	elseif ( !$_POST['group_work_email'] || !is_valid_email($_POST['group_work_email']) )
		$error = __('Work mail is not correct');
	elseif ( !$_POST['group_work_phone'] || $_POST['group_work_phone']=="Phone work" )
		$error = __('Work phone is not correct');
	elseif ( !$_POST['group_presentation'] || $_POST['group_presentation']=="Presentation"  )
		$error = __('Presentation is empty');
	else{
		// echo "WOrking..";
		
		$group_title = esc_attr($_POST['group_title']);
		$country = (int)$_POST['country'];
		$group_man = esc_attr($_POST['group_man']);
		$group_focus = esc_attr($_POST['group_focus']);
		$group_work_email = $_POST['group_work_email'];
		if( $_POST['group_cw_email'] || is_valid_email($_POST['group_cw_email']) )
			$group_cw_email = $_POST['group_cw_email'];
		
		$group_work_phone = $_POST['group_work_phone'];
		
		
		if ( $_POST['group_mobile_phone'] || $_POST['group_mobile_phone']!="Phone mobile" )
			$group_mobile_phone = $_POST['group_mobile_phone'];
					
		if ( $_POST['group_web'] || $_POST['group_web']!="Web" )
			$web = $_POST['group_web'];
			
		$presentation = $_POST['group_presentation'];
		
		
		$duplicate_test = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM ".$wpdb->prefix."groups WHERE group_name = %s", $group_title) );
		
		if( $duplicate_test=="" ) {
		
			$wpdb->query( $wpdb->prepare( "INSERT INTO ".$wpdb->prefix."groups ( group_name, country, group_focus, group_presentation, group_manager, work_mail, cw_mail, work_phone, mobile_phone, web)
								VALUES ( %s, %d, %s, %s, %s, %s, %s, %s, %s, %s )",
								$group_title, $country, $group_focus, $presentation, $group_man, $group_work_email, $group_cw_email, $group_work_phone, $group_mobile_phone, $web ) );
			
			$companies = $_POST['company'];
			if($companies){
				$group_id = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM ".$wpdb->prefix."groups WHERE group_name = %s AND country = %d", $group_title, $country) );
				//echo "Group id is $group_id ";
			// Check if company is unique
				$companies = array_unique($companies);
				
				foreach ($companies as $company_id){
						$wpdb->query( $wpdb->prepare( "INSERT INTO ".$wpdb->prefix."company_group ( company_id, group_id)
								VALUES ( %d, %d )",
								$company_id, $group_id) );
				}
			}
			echo "Done";
		}
		elseif ( $_GET['action']=='edit' && $_GET['group'] ){
			
			$id = (int)$_GET['group'];
			$table = $wpdb->prefix."groups";
			
			$wpdb->update( $table, array( 'group_name' => $group_title,
										  'country' => $country,
										  'group_focus' => $group_focus,
										  'group_presentation' => $presentation,
										  'group_manager' => $group_man,
										  'work_mail' => $group_work_email,
										  'cw_mail' => $group_cw_email,
										  'work_phone' => $group_work_phone,
										  'mobile_phone' => $group_mobile_phone,
										  'web' => $web, ), 
									array( 'id' => $id ), array( '%s', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s' ), array( '%d' ) );
			$companies = $_POST['company'];
			if($companies){
				$companies_ingroup = $wpdb->get_results("	SELECT company_id
															FROM ".$wpdb->prefix."company
															WHERE company_id IN (	SELECT company_id
																					FROM ".$wpdb->prefix."company_group
																					WHERE group_id = '".$id."') ", ARRAY_N);
				// Make same structure
				foreach ($companies_ingroup as $company_ingroup) {
					foreach ($company_ingroup as $comp_ingroup) {
						$comp[] = $comp_ingroup;
					}
				}
				
				$new_comp = array_diff($companies, $comp);
				$deleted_comp = array_diff($comp, $companies);
				
				if($deleted_comp){
					foreach ($deleted_comp as $deleted_com){
						$wpdb->query( $wpdb->prepare( "DELETE FROM ".$wpdb->prefix."company_group
													WHERE company_id =%d AND group_id =%d",
													$deleted_com, $id) );
					}
				}
				if($new_comp){
					foreach ($new_comp as $new_com){
						
						$wpdb->query( $wpdb->prepare( "INSERT INTO ".$wpdb->prefix."company_group ( company_id, group_id)
								VALUES ( %d, %d )",
								$new_com, $id) );
					}
				}
			}
			echo "Group is changed!";
		}
		else 
			$error = "Already exists";
		
		}
}

if ( $_GET['group'] && $_GET['action']=='edit' ){

	$id = (int)$_GET['group'];
	
	$edit_group = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".$wpdb->prefix."groups WHERE id = %d", $id));
	
	// Group data
	$edit_title = $edit_group->group_name;
	$edit_country = $edit_group->country;
	$edit_group_man = $edit_group->group_manager;
	$edit_group_focus = $edit_group->group_focus;
	$edit_work_mail = $edit_group->work_mail;
	$edit_cw_mail = $edit_group->cw_mail;
	$edit_work_phone = $edit_group->work_phone;
	$edit_mobile_phone = $edit_group->mobile_phone;
	$edit_group_web = $edit_group->web;
	$edit_group_presentation = $edit_group->group_presentation;
	
}