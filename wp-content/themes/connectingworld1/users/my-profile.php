  <a href="<?php $monUrl ?>/my-page-2?action=editprofile" title="edit" class="bluelink">Edit My Profile</a>  | <a href="<?php $monUrl ?>/my-page-2?action=uploadimage" class="bluelink" title="Upload Image">Upload Image »</a> |  <a href="<?php echo get_option('siteurl'); ?>/my-page-2?action=changepassword" title="Change Password" class="bluelink">Change Password » </a>
<table width="500px" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" scope="col">
	<?php 
	if($user_profile->user_pic == ''){
	?>
	 <img src="<?php bloginfo('template_directory'); ?>/users/uploads/empty_pic.png" width="87" height="100" alt="profile" />
     <?php 
	
	}else{
		  $allink = ABSPATH."wp-content/themes/connectingworld1/users/uploads/";
	?>
  
		<img src="<?php bloginfo('template_directory'); ?>/users/uploads/<?php echo $user_profile->user_pic;?>" width="87" height="100" alt="profile2" /><?php 
	}
	?>
</td>
    <td align="left" valign="top" scope="col"><b>Type:</b><?php
	$regtypes=get_regtypebyid($user_profile->regtype_id);
	echo $regtypes->name_regtype;
	?><br />
      <b>Country :
        <?php $c_name=get_country_name($user_profile->country_id); echo $c_name->country_name; ?>
        </b><br />
      <b>Region :
        <?php $r_name=get_region_name($user_profile->region_id); echo $r_name->region_name; ?>
        </b><br />
      <b>City :</b><?php echo $user_profile->city;?><br />
      <b>Birthdate :</b><?php echo $user_profile->birth_date;?><br />
      <b>Memberdate :</b><?php echo $user_profile->memberdate;?><br />
      <b>Online :</b><?php 
	  $log = get_userlogins($user_profile->user_login);
	  echo $log->login_date;?> <br />
      <b>Username :</b><?php echo $user_profile->user_login;?> <br />
   </td>
    <td align="left" valign="top" scope="col">
		<div class=infobox> 

	     <p>
			<b>Contact 	<?php echo $user_profile->gender;?> 
			<?php echo $user_profile->firstname;?>&nbsp;<?php echo $user_profile->lastname;?>
            </b>
		</p>
        	<p>		
        <?php if($user_profile->phone != ''){ ?>
		
				<?php echo "Phone: ".$user_profile->phone; ?>
			
			<?php } ?>
            </p>
            	<p>
			<?php //if($user_profile->display_email == '1'){

				if($user_profile->user_email != ''){			?>
		
					<?php echo 'E-mail: <a href="mailto:'.$user_profile->user_email.'">'.$user_profile->user_email.'</a>' ; ?>
			
			<?php } ?>
</p>
<p>
			<?php if($user_profile->skype_nick != ''){ ?>
			
				
				<?php echo "Skype: ".$user_profile->skype_nick; ?>
		
			<?php } ?>
         	</p>   
           
	  </div></td>
  </tr>
  <tr>
    <td colspan="2">		
    <B>Personal presentation:</B>
		<p>
			<?php if ($user_profile->presentation != '') {
				echo $user_profile->presentation ; }
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
    <td><b>Professional Title:</b>
    <p>
			<?php if ($user_profile->prof_title != '') {
				echo $user_profile->prof_title ; }
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
  </tr>
  <tr>
    <td colspan="2">  <B>Looking For:</B>
		<p>
			<?php if ($user_profile->lookingfor != '') {
				echo $user_profile->lookingfor ; }
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
    <td><B>Company profile user has registered: </B>
		<p>
			<?php if ($user_profile->default_company_id != '') {
echo '<a href="#">Company Profil</a>'; }
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
  </tr>
   <tr>
    <td colspan="3">  <B>Professional experience:</B>
		<p>
			<?php if ($user_profile->prof_experience != '') {
				echo $user_profile->prof_experience ; }
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
  </tr>
   <tr>
    <td colspan="3">  <B>Offers:</B>
		<p>
			<?php if ($user_profile->offering != '') {
				echo $user_profile->offering ; }
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
  </tr>
    <tr>
    <td colspan="3">  <B>Industry user is specialized in:</B>
		<p>
			<?php if ($user_profile->industry_id != '') {
				$industry = get_industrybyid($user_profile->industry_id); echo $industry->industry_name;}
				else { print "<i>No informations available</i>"; }?>
					
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
    <td>&nbsp;</td>
    <td><?php 
	$nblogin= get_nbrlogins($user_profile->user_login); echo $nblogin; ?><em> logins </em></td>
    <td><em>Profile last changed</em> <?php echo $user_profile->last_changed;?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>