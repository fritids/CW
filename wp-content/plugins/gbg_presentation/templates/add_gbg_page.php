<?php 
global $wpdb;

include PLUGIN_DIR . '/include/form_validator.php';
require_once PLUGIN_DIR . '/include/func.php';

$ajax_map = site_url('/wp-content/plugins/gbg_presentation/ajax');

?>
<style type="text/css">
textarea { min-width: 250px; min-height: 150px;}
.company {float: left; padding-bottom: 20px; }
.company #new_comp, .company #choosed_comp { width: 515px; float: left;}
.company #choosed_comp {padding-left: 50px;}
.req { background-color: red; float: left; height: 26px; width: 2px;}
</style>
<div class="wrap">
	<h2><?php _e("Add Global Business Group"); ?></h2>
	
	
<?php if ( $error ) { ?>
	<p class="error_meddelande">
		<?php echo $error; ?>
	</p><!-- .error -->
<?php } ?>

	<form method="post" id="add_gbg" class="add_gbg_form" action="http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
		<table width="432" border="0">
			<tr>
				<td>
					<div class="iBg-195">
						<span class="req"></span>
						<input name="group_title" type="text" value="<?php if ( $error && $_POST['group_title']!="" ) echo wp_specialchars( $_POST['group_title'], 1 ); 
																		elseif ( $edit_title ) echo $edit_title;
																		else echo "Enter Group title"; ?>" onclick="if(this.value=='Enter Group title'){this.value=''}" onblur="if(this.value==''){this.value='Enter Group title'}" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="sel-6 fright">
						<span class="req"></span>
						<select class="w195" id="sel-6" name="country">
							<option value="" <?php if(!$_POST['country']) echo 'selected="selected"'; ?> >Country</option>
							<?php 
								$countries = get_gbg_countries(0);
								foreach ($countries as $country) {
									if($country->id==$_POST['country'] || $country->id==$edit_country)
									$selected = 'selected="selected"';
									
									echo "<option $selected value=\"$country->id\" >".$country->country."</option>";
									
									unset($selected);
								}
							?>
						</select>
					
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="iBg-195">
						<span class="req"></span>
						<input name="group_man" type="text" value="<?php if ( $error && $_POST['group_man']!="" ) echo wp_specialchars( $_POST['group_man'], 1 );
																		elseif ( $edit_group_man ) echo $edit_group_man;
																		else echo "Group Manager"; ?>" onclick="if(this.value=='Group Manager'){this.value=''}" onblur="if(this.value==''){this.value='Group Manager'}" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="iBg-195">
						<span class="req"></span>
						<input name="group_focus" type="text" value="<?php if ( $error && $_POST['group_focus']!="" ) echo wp_specialchars( $_POST['group_focus'], 1 );
																		elseif ( $edit_group_focus ) echo $edit_group_focus;
																		else echo "Focus"; ?>" onclick="if(this.value=='Focus'){this.value=''}" onblur="if(this.value==''){this.value='Focus'}" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="iBg-195">
						<span class="req"></span>
						<input name="group_work_email" type="text" value="<?php if ( $error && $_POST['group_work_email']!="" ) echo wp_specialchars( $_POST['group_work_email'], 1 );
																			elseif ( $edit_work_mail ) echo $edit_work_mail;
																			else echo "Work mail"; ?>" onclick="if(this.value=='Work mail'){this.value=''}" onblur="if(this.value==''){this.value='Work mail'}" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="iBg-195">
						<input name="group_cw_email" type="text" value="<?php if ( $error && $_POST['group_cw_email']!="" ) echo wp_specialchars( $_POST['group_cw_email'], 1 );
																			elseif ( $edit_cw_mail ) echo $edit_cw_mail;
																			else echo "CW mail"; ?>" onclick="if(this.value=='CW mail'){this.value=''}" onblur="if(this.value==''){this.value='CW mail'}" />
					</div>
				</td>
			</tr>
			<tr>
			<tr>
				<td>
					<div class="iBg-195">
						<span class="req"></span>
						<input name="group_work_phone" type="text" value="<?php if ( $error && $_POST['group_work_phone']!="" ) echo wp_specialchars( $_POST['group_work_phone'], 1 );
																			elseif ( $edit_work_phone ) echo $edit_work_phone;	
																			else echo "Phone work"; ?>" onclick="if(this.value=='Phone work'){this.value=''}" onblur="if(this.value==''){this.value='Phone work'}" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="iBg-195">
						<input name="group_mobile_phone" type="text" value="<?php if ( $error && $_POST['group_mobile_phone']!="" ) echo wp_specialchars( $_POST['group_mobile_phone'], 1 );
																				elseif ( $edit_mobile_phone ) echo $edit_mobile_phone;
																				else echo "Phone mobile"; ?>" onclick="if(this.value=='Phone mobile'){this.value=''}" onblur="if(this.value==''){this.value='Phone mobile'}" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="iBg-195">
						<input name="group_web" type="text" value="<?php if ( $error && $_POST['group_web']!="" ) echo wp_specialchars( $_POST['group_web'], 1 );
																		elseif ( $edit_group_web ) echo $edit_group_web;	
																		else echo "Web"; ?>" onclick="if(this.value=='Web'){this.value=''}" onblur="if(this.value==''){this.value='Web'}" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="iBg-195">
						<span class="req"></span>
						<textarea name="group_presentation" cols="" rows="" onclick="if(this.value=='Presentation'){this.value=''}" onblur="if(this.value==''){this.value='Presentation'}"><?php if ( $error && $_POST['group_presentation']!="" ) echo wp_specialchars( $_POST['group_presentation'], 1 ); elseif ( $edit_group_presentation ) echo $edit_group_presentation; else echo "Presentation"; ?></textarea>
			
					</div>
				</td>
			</tr>
		</table>
<script type="text/javascript">
	jQuery(document).ready(main);
	
	function main()
	{
		jQuery('#search-2').append('<div id="ajax_search_results_go_here"></div>');
	// Write some text to the target div
		jQuery('#s').keyup(get_search_results);
	}
		
	function get_search_results()
	{
	// Write some text to the target div
		var search_query = jQuery('#s').val();
		if(search_query != "" && search_query.length > 2 ) {
			jQuery.get("<?php echo $ajax_map; ?>/ajax_search_company.php", { s:search_query },
			write_results_to_page);
		}
		else
		{
			console.log('Search term empty or too short.');
		}
	}
	
	function write_results_to_page(data)
	{
		jQuery('#ajax_search_results_go_here').html(data);
	}
	
	function choose_comp(company_id, company_name)
	{
		input = '<li>'+ company_name +'<input type="hidden" value="' + company_id + '" name="company[]" id="company" /> <a href="javascript: delete_comp('+ company_id + ')" id="delete_comp_'+ company_id + '">Delete company from group</a></li>'
		jQuery('#comp').append(input);
	
	}
	function delete_comp(comp_id)
	{
		jQuery('#delete_comp_'+comp_id).parent().remove();
	}
</script>

<div class="company">
	<div id="new_comp">
		<h3 class="widget-title">Add company to the group</h3>
		<!-- <form role="search" method="get" id="searchcompany" action="http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" > -->
			<div>
				<label style="position: relative; left: 0" class="screen-reader-text" for="s">Enter company name:</label>
				<input type="text" value="" name="s" id="s" />
			</div>
		<!-- </form> -->
			<div id="ajax_search_results">
				<ul>
					<li id="search-2"></li>
				</ul>
			</div>
	</div>
	<div id="choosed_comp">
		<h3>Companies in this group</h3>
		<ul id="comp">
		<?php 
		if($_GET['group']){
			$group_id = (int)$_GET['group'];
			
			$companies = get_company_ingroup($group_id);
			foreach ($companies as $company){
				echo "<li>$company->company_name<input type='hidden' value='$company->company_id' name='company[]' id='company' /> <a href='javascript: delete_comp(".$company->company_id . ")' id='delete_comp_$company->company_id'>Delete company from group</a></li>";
			}
		}
		?>
		</ul>
	</div>
</div>
		<?php  wp_nonce_field('add_gl_gbg','add_global_group'); ?>
		
		<?php if ( $_GET['action']=='edit' ) { ?>
		<input class="submit_button" name="submit_gbg" type="submit" value="Edit Group" />
		<?php }
			else { ?>
		<input class="submit_button" name="submit_gbg" type="submit" value="Add New Group" />
		<?php } ?>
		
	</form>
	
	
</div> <!-- .wrap -->