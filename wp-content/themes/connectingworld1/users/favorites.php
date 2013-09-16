<a href="<?php $monUrl ?>/my-page-2?action=editprofile" title="edit" class="bluelink">Edit My Profile</a>| <a href="<?php $monUrl ?>/my-page-2?action=uploadimage" class="bluelink" title="Upload Image">Upload Image </a> |  <a href="<?php echo get_option('siteurl'); ?>/my-page-2?action=changepassword" title="Change Password" class="bluelink">Change Password  </a>
 <table style="margin-top:30px;">
	<tr><th>Company</th>
		<th>Type</th>	
		<th>Product/Service</th>
		<th>Industry/branch</th>
		<th>Country/Region</th>
		<th>Empl.</th>
		<th>Sales</th>
		<th>Est.year</th>
	</tr>
	<?php
	
	$listfavories = get_fav_byuserid($user_ID);
	//$list_company = list_company_ID($user_ID);
		
	$i=0;
	foreach ($listfavories AS $listfavories) { 	
		
	if ($i%2==0)
	  $st=" style= 'background-color: #F1F7F8;'";
	else 
		$st='';
	$i++;
		
	$companyrow = get_company_byid($listfavories->cp_id);	
	
	?>
		<tr <?php echo $st;?>>
			<td>
			
				<a href="<?php $monUrl ?>/business-search/free-text-search?cp=<?php echo $companyrow->company_id;?>" class="bluelink" title="Edit company"><?php echo $companyrow->company_name; ?></a>
								
				<span style="white-space:nowrap;display:block">
				<?php  if($companyrow->skype_nick){  ?>
					 <IMG SRC="wp-content/themes/connectingworld1/images/skype.gif" style="padding-top:-2px" WIDTH="16" HEIGHT="16" BORDER="0" ALT="Skype available">
				<?php }?>

				<?php  if($companyrow->display_email && $companyrow->company_email){ ?> 
					<IMG SRC="wp-content/themes/connectingworld1/images/p_email.gif" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Email">
				<?php }?>

				<?php  if($companyrow->prod_count){ ?> 
					<IMG SRC="wp-content/themes/connectingworld1/images/p_catalogue.gif" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Product catalogue">
				<?php }?>

				<?php  if($companyrow->company_url){ ?> 
					<IMG SRC="wp-content/themes/connectingworld1/images/p_weblink.gif" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Web site">
				<?php }?>

				<?php  if($companyrow->company_map_lon && $companyrow->company_map_lat){ ?> 
					<IMG SRC="wp-content/themes/connectingworld1/images/p_map.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="Visible on map">
				<?php }?>
				
				<?php  if($companyrow->unspcs_count){ ?> 
					<IMG SRC="wp-content/themes/connectingworld1/images/b_report.gif" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Has product/service registration">
				<?php  } ?> 

				<?php  if($companyrow->lang_spoken){ ?>
					<span title="Languages contact speaks: <?php //print get_lang_spoken($row['lang_spoken']) ?>">L</span> 
				<?php  } ?> 
				
				<?php  if($companyrow->regions_provide){ ?>
					<span title="Can provide/export to: <?php //print get_regions_provide($row['regions_provide'])?>">E</span>  
				<?php  } ?> 
				</span>				
				
			</td>
			<td><?php $business_name= $wpdb->get_row("SELECT * FROM $wpdb->business_type WHERE business_type_id =".$companyrow->business_type_id);
				echo $business_name->name;?>
			</td>
			<td><?php $unspsc_name= $wpdb->get_row("SELECT * FROM $wpdb->unspsc WHERE egci =".$companyrow->main_unspcs);
				echo $unspsc_name->title;?>
			</td>
			<td><?php $industry_name= $wpdb->get_row("SELECT * FROM $wpdb->industry WHERE industry_id =".$companyrow->industry_id);
				echo $industry_name->industry_name;?>
			</td>
			<td><?php $country_name= $wpdb->get_row("SELECT * FROM $wpdb->country WHERE country_id =".$companyrow->company_country_id);
				echo $country_name->name;?> / <?php $region_name= $wpdb->get_row("SELECT * FROM $wpdb->region WHERE region_id =".$companyrow->region_id);
				echo $region_name->region_name;?>
			</td>
			<td><?php $nbr_employee= $wpdb->get_row("SELECT * FROM $wpdb->nbr_employe WHERE employe_id =".$companyrow->company_noof_employee);
				//echo $nbr_employee->nbr_emplye;
				
				if($nbr_employee->nbr_emplye){
					$s_emp = str_replace("People", "",$nbr_employee->nbr_emplye);
					$s_emp = str_replace("Less than", "<",$s_emp);
					$s_emp = str_replace("Above", ">",$s_emp);
					print $s_emp;
				}
		
				?>
			</td>
			<td>
				<?php $annual_sales= $wpdb->get_row("SELECT * FROM $wpdb->annual_sales WHERE sales_id =".$companyrow->company_annualsales);
				//echo $annual_sales->description;
				
				if($annual_sales->description){
					$s_s = str_replace("Million", "", $annual_sales->description);
					$s_s = str_replace("US$", "",$s_s);
					$s_s = str_replace("Below", "<",$s_s);
					print $s_s;
				}
							
				?>
			</td>
			<td><?php echo $companyrow->company_established; ?></td>
		</tr>
	<?php } ?>
</table>
 <div class=clearfix style="width:300px">
	<div style="float:left;font-size:smaller;width:140px;margin-right:10px">
		<IMG SRC="wp-content/themes/connectingworld1/images/skype.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="Skype available"> = Skype available <br>


		<IMG SRC="wp-content/themes/connectingworld1/images/p_email.gif" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Email"> = Visible email <br>

		<IMG SRC="wp-content/themes/connectingworld1/images/p_catalogue.gif" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Product catalogue"> = Product catalogue  <br>

		<IMG SRC="wp-content/themes/connectingworld1/images/p_weblink.gif" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Web site"> = Web site link <br>
	</div>
	<div style="float:left;font-size:smaller;width:140px;">

		<IMG SRC="wp-content/themes/connectingworld1/images/p_map.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="Visible on map">  = Visible on map<br>


		<IMG SRC="wp-content/themes/connectingworld1/images/b_report.gif" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Has product/service registration"> = Product/service reg.<br>

		E = export/provide <br>
		L = languages <br>
		<?php /*$user_profile = get_user_profile($user_ID);
		if($user_profile->premium)
		{*/
		?>
		<IMG SRC="wp-content/themes/connectingworld1/images/pm.jpg" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Premium Member"> = Premium Member <br>
		<?php //} ?>
	</div>
</div><br>
 <?php
 ?>