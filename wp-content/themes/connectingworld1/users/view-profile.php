 
<?php
global $current_user;
      $current_user = get_user_profile($_GET["id"])
?>
<?php if($current_user->premium == 1){ ?>
<div style="float:right;"> Premium Member <img src="<?php bloginfo('stylesheet_directory'); ?>/images/pm.png" alt="premium" border="0" /></div>
<?php }
else { ?>
<div style="float:right;"> Basic Member <img src="<?php bloginfo('stylesheet_directory'); ?>/images/basic.png" alt="basic" border="0" /></div>
<?php } ?>
 <table width="500px" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" scope="col">
	<?php 
	if($current_user->user_pic == ''){
	?>
	 <img src="<?php bloginfo('template_directory'); ?>/users/uploads/empty_pic.png" width="87" height="100" alt="profile" />
     <?php 
	
	}else{
		  $allink = ABSPATH."wp-content/themes/connectingworld1/users/uploads/";
	?>
  
		<img src="<?php bloginfo('template_directory'); ?>/users/uploads/<?php echo $current_user->user_pic;?>" width="87" height="100" alt="profile2" /><?php 
	}
	?>
</td>
    <td align="left" valign="top" scope="col"><b>Type:</b><?php
	$regtypes=get_regtypebyid($current_user->regtype_id);
	echo $regtypes->name_regtype;
	?><br />
      <b>Country :
        <?php $c_name=get_country_name($current_user->country_id); echo $c_name->country_name; ?>
        </b><br />
      <b>Region :
        <?php $r_name=get_region_name($current_user->region_id); echo $r_name->region_name; ?>
        </b><br />
      <b>City :</b><?php echo $current_user->city;?><br />
      <b>Birthdate :</b><?php echo $current_user->birth_date;?><br />
      <b>Memberdate :</b><?php echo $current_user->memberdate;?><br />
      <b>Online :</b><?php 
	  $log = get_userlogins($current_user->user_login);
	  echo $log->login_date;?> <br />
      <b>Username :</b><?php echo $current_user->user_login;?> <br />
   </td>
    <td align="left" valign="top" scope="col">
		<div class=infobox> 

	     <p>
			<b>Contact 	<?php echo $current_user->gender;?> 
			<?php echo $current_user->firstname;?>&nbsp;<?php echo $current_user->lastname;?>
            </b>
		</p>
        	<p>		
        <?php if($current_user->phone != ''){ ?>
		
				<?php echo "Phone: ".$current_user->phone; ?>
			
			<?php } ?>
            </p>
            	<p>
			<?php //if($current_user->display_email == '1'){

				if($current_user->user_email != ''){			?>
		
					<?php echo 'E-mail: <a href="mailto:'.$current_user->user_email.'">'.$current_user->user_email.'</a>' ; ?>
			
			<?php } ?>
</p>
<p>
			<?php if($current_user->skype_nick != ''){ ?>
			
				
				<?php echo "Skype: ".$current_user->skype_nick; ?>
		
			<?php } ?>
         	</p>  
			
			<p>
				<a href="<?php echo get_option('siteurl');?>/send-message?id=<?php echo $_GET["id"] ; ?>" class="bluelink" >[Send message]</a> <img src="<?php bloginfo('template_directory'); ?>/company/uploads/p_email.gif" alt="send message" title="send message" />
			</p>
           
	  </div></td>
  </tr>
  <tr>
    <td colspan="2">		
    <B>Personal presentation:</B>
		<p>
			<?php if ($current_user->presentation != '') {
				echo $current_user->presentation ; }
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
    <td><b>Professional Title:</b>
    <p>
			<?php if ($current_user->prof_title != '') {
				echo $current_user->prof_title ; }
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
  </tr>
  <tr>
    <td colspan="2">  <B>Looking For:</B>
		<p>
			<?php if ($current_user->lookingfor != '') {
				echo $current_user->lookingfor ; }
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
    <td><B>Company profile user has registered: </B>
		<p>
			<?php if ($current_user->default_company_id != '') {
echo '<a href="#">Company Profil</a>'; }
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
  </tr>
   <tr>
    <td colspan="3">  <B>Professional experience:</B>
		<p>
			<?php if ($current_user->prof_experience != '') {
				echo $current_user->prof_experience ; }
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
  </tr>
   <tr>
    <td colspan="3">  <B>Offers:</B>
		<p>
			<?php if ($current_user->offering != '') {
				echo $current_user->offering ; }
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
  </tr>
    <tr>
    <td colspan="3">  <B>Industry user is specialized in:</B>
		<p>
			<?php if ($current_user->industry_id != '') {
				$industry = get_industrybyid($current_user->industry_id); echo $industry->industry_name;}
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
  </tr>
  <tr>
    <td colspan="2">  <B> <strong>Organizations</strong> :</B>
		<p>
			<?php if ($current_user->groups_memberships != '') {
				echo $current_user->groups_memberships ;}
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
    <td><b>Educational background:</b><p>
			<?php if ($current_user->edu_background != '') {
				echo $current_user->edu_background;}
				else { print "<i>No informations available</i>"; }?>
					
	</p></td>
  </tr>
  <tr>
    <td colspan="3"><hr /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php 
	$nblogin= get_nbrlogins($current_user->user_login); echo $nblogin; ?><em> logins </em></td>
    <td><em>Profile last changed</em> <?php echo $current_user->last_changed;?></td>
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