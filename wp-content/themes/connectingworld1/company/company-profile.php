<?php
	if ( !$user_ID ) {
	$company_row=get_company_byid($_GET["idc"]); 

	}
	else
	{
		$company_row=get_company_byuserid($user_ID);
	//print_r($company_row);
	}
	if ($company_row)
	{
?>

<?php 
$company_row=get_company_byid($id_cp);
$id_user = $_REQUEST['id_user'];
if($id_user)
{	
		insert_favorites($id_user,$id_cp);

}

?>

<a style="float:right;padding-right:10px;margin-top:-2px" href="<?php $monUrl ?>/business-search/free-text-search?id_user=<?php echo $user_ID; ?>&cp=<?php echo $id_cp; ?>" title="Add as favorite"><IMG SRC="<?php bloginfo('stylesheet_directory'); ?>/images/star.jpg" WIDTH="16" HEIGHT="16" BORDER="0" ALT="Add as favorite"></a>

<table width="500px" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" scope="col">
	<?php 
	if($company_row->company_pic == ''){
	?>
	 <img src="<?php bloginfo('template_directory'); ?>/company/uploads/empty_company.png" width="87" height="100" alt="profile" />
     <?php 
	
	}else{
		  $allink = ABSPATH."wp-content/themes/connectingworld1/company/uploads/";
	?>
  
		<img src="<?php bloginfo('template_directory'); ?>/company/uploads/<?php echo $company_row->company_pic;?>" width="87" height="100" alt="profile2" /><?php 
	}
	?>
</td>
    <td align="left" valign="top" scope="col"><b>Name: </b><?php
	echo $company_row->company_name;
	?><br />
      <b>Country :</b>
        <?php $c_name=get_country_name($company_row->company_country_id); echo $c_name->country_name; ?>
        <br />
      <b>Region : </b>
        <?php $r_name=get_region_name($company_row->region_id); echo $r_name->region_name; ?>
   <br />   
      <b>City :</b><?php echo $company_row->company_city;?><br />
      <b>Adress :</b><?php echo $company_row->company_address;?><br />
       <b>Zip Code :</b><?php echo $company_row->company_postcode;?><br />
       <b> <a href="<?php echo get_bloginfo('template_url').'/company/map.php?company_map_lon='.$company_row->company_map_lon.'&company_map_lat='.$company_row->company_map_lat.''?>" class="bluelink" title="Map" rel="gb_page_center[500,450]">View Map Location</a></b>
      <br />
      <br />      
      <br />
   </td>
    <td align="left" valign="top" scope="col">
		<div class=infobox> 

	     <p>
			<b>Contact company  
			<?php echo $company_row->company_cp_firstname;?>&nbsp;<?php echo $company_row->company_cp_lastname;?>
            </b>
		</p>
        	<p>		
        <?php if($company_row->company_mobile != ''){ ?>
		
				<?php echo "Mobile: ".$company_row->company_mobile; ?>
			
			<?php } ?>
            </p>
			<p>		
        <?php if($company_row->company_email != ''){ ?>
		
				<?php echo 'Email: <a href="mailto:'.$company_row->company_email.'">'.$company_row->company_email.'</a>' ; ?>
			
			<?php } ?>
            </p>
			<p>
				<a href="<?php echo get_option('siteurl');?>/send-message?id=<?php echo $company_row->user_id ?>" class="bluelink" >[message]</a> <img src="<?php bloginfo('template_directory'); ?>/company/uploads/p_email.gif" alt="send message" title="send message" />
			</p>
           
	  </div></td>
  </tr>
  <tr>
    <td colspan="2">		
    <B>Company  presentation:</B>
		<p>
			<?php if ($company_row->company_presentation != '') {
				echo $company_row->company_presentation ; }
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
    <td><b>Company Type:</b>
      <p>
			<?php // echo $company_row->company_noof_employee;
			echo get_business_type_byid($company_row->business_type_id)->name;
			
			?>
					
	</p></td>
  </tr>
  <tr>
    <td colspan="2">  <B>Key product/Services:</B>
		<p>
			<?php if ($company_row->keywords != '') {
				echo $company_row->keywords ; }
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
    <td><B>Year Established</B>
		<p>
			<?php echo $company_row->company_established;?>
					
	</p></td>
  </tr>
   <tr>
    <td colspan="2"><strong>Main product/service category:</strong>      <p>
			<?php 
			//	echo $company_row->company_type ;
				//get_unspsc_byid($id)
		echo get_unspsc_byid($company_row->company_type)->title;
			?>
					
	</p></td>
    <td><B>Number of Employees:</B>
		<p>
			<?php // echo $company_row->company_noof_employee;
			echo get_EmployeeNbr_byid($company_row->company_noof_employee)->nbr_emplye;
			
			?>
					
	</p></td>
  </tr>
   <tr>
    <td colspan="2"><strong>Main Industry:</strong>      <p>
			<?php // echo $company_row->company_noof_employee;
			echo get_industrybyid($company_row->business_type_id)->industry_name;
			
			?>
	</p></td>
    <td><B>Approx. Annual Sales:</B>
		<p>
			<?php // echo $company_row->company_noof_employee;
			echo get_annualsales_byid($company_row->company_annualsales)->description;
			
			?>
					
	</p></td>
  </tr>
    <tr>
    <td colspan="3">  <B>Regions in which this company can provide service or export:</B>
		<p>
			<?php 
				$regionp= $company_row->regions_provide;
				$tab = explode(',', $regionp);
				foreach ($tab as $regionprovider)
				{
					if ($regionprovider <> '')
					{
					$name=get_serviceprovide_byid($regionprovider);
					echo $name->name.' ';
					}
				}
				
			?>
					
	</p></td>
    <tr>
    <td colspan="3">  <B>Certifications:</B>
		<p>
			<?php 
				echo $company_row->certs;	
			?>
					
	</p></td>
  </tr>
  <tr>
    <td colspan="2">  <B> <strong>Organizations</strong> :</B>
		<p>
			<?php if ($user_profile->groups_memberships != '') {
				echo $user_profile->groups_memberships ;}
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
    <td><b>Educational background:</b><p>
			<?php if ($user_profile->edu_background != '') {
				echo $user_profile->edu_background;}
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
  </tr>
  <tr>
    <td colspan="3"><hr /></td>
  </tr>
   <tr>
    <td colspan="3"><b>Product/services this company offer:</b><br />
    <?php
	echo $company_row->company_id;
	$unspsc=get_saved_by_cid($company_row->company_id);
	

	?>
   <ul>
<?php

		foreach ($unspsc as $row) {
			
			?>
       <li>
						<?php print $row->segment; ?></li>
                       <ul><li>  <?php print $row->family; ?> </li>
                         <ul><li>	<?php print $row->class; ?></li>
			  <ul style="margin-left:60px;margin-bottom:0px">

					<li><?php print $row->commodity; ?> <?php print  get_unspsc_type($row->type) ?> </li>

					
				</ul> </ul></ul>
<?php
		}//end foreach?>
        
       </ul> 


<br><br>D = Distributor, M = Manufacturer,	B = Buyer/Importer, S =	Service provider

  </tr>
</table><?php }
else
{
echo 'You must register your Company First!<br />'?>
<a href="<?php $monUrl ?>/register-step2" title="as seen by others" class="bluelink">Register Your Company</a>
<?php }
?>