
<?php
ob_start(); //started buffering

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
 $monUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
  //If the form is submitted
  if(isset($_POST['submitted'])){
	 //print_r($_POST);
	  $Errorfields='';
	 // print_r ($_POST);
	  edit_company ($_POST);
    //Check to see if the honeypot captcha field was filled in

	         if  (trim($_POST['company_name']) ==='' ) 
		      {
		   $Errorfields .= '<li>You forgot to enter your company name.</li>';
		   $hasError = true;
	     }
	  			else {
			  $name = trim($_POST['company_name']);
		  		}
				
				 if  (trim($_POST['presentation']) ==='' ) 
		      {
		   $Errorfields .= '<li>You forgot to enter your company presentation.</li>';
		   $hasError = true;
	     }
	  			else {
			  $name = trim($_POST['presentation']);
		  		}
				
		   if  (trim($_POST['country']) ==='' ) 
		      {
		   $Errorfields .= '<li>You forgot to choose your country.</li>';
		   $hasError = true;
	     }
	  			else {
			  $name = trim($_POST['country']);
		  		}
				
				if  (trim($_POST['city']) ==='' ) 
		      {
		   $Errorfields .= '<li>You forgot to enter your City.</li>';
		   $hasError = true;
	     }
	  			else {
			  $name = trim($_POST['city']);
		  		}
				
				 if  (trim($_POST['street_adress']) ==='' ) 
		      {
		   $Errorfields .= '<li>You forgot to choose your street adress.</li>';
		   $hasError = true;
	     }
	  			else {
			  $name = trim($_POST['street_adress']);
		  		}
				
				
		  //Check to make sure that the name field is not empty
		  if(trim($_POST['firstname']) === '') {
			  $Errorfields .= '<li>You forgot to enter your first name.</li>';
			  $hasError = true;
		  } else {
			  $name = trim($_POST['firstname']);
		  }
		  //Check to make sure that the name field is not empty
		  if(trim($_POST['lastname']) === '') {
			  $Errorfields .= '<li>You forgot to enter your lastname.</li>';
			  $hasError = true;
		  } else {
			  $name = trim($_POST['lastname']);
		  }
		  //Check to make sure sure that a valid email address is submitted
		  if(trim($_POST['email']) === '')  {
			  $Errorfields .= '<li>You forgot to enter your email address.</li>';
			  $hasError = true;
		  } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			  $Errorfields .= '<li>You entered an invalid email address.</li>';
			  $hasError = true;
		  } 
			  else
			  {
			  $email = trim($_POST['email']);
			  }
			  
		 
		  //If there is no error, send the email
		  if(!isset($hasError)) {
	// edit_profile ($_POST);
	$tab=$_POST;
		global $wpdb;
$dataedit=array('country_id'=> $tab['country']
  ,'region_id'=> $tab['region1']
  ,'phone'=> $tab['phone']
  ,'user_email'=> $tab['email']
   ,'adress'=> $tab['adress']
    ,'zip_code'=> $tab['zip']
  );
 $whereedit=array( 'ID' =>  $tab['keyid']);
 
	$wpdb->update( $wpdb->users,$dataedit ,  $whereedit );
		  
		      $email = $tab['email'];
			  $emailTo = 'donotreply@cw-connectingworld.com';
			  $subject ='CW-connectingworld.com Edit Profile';
			  $body = 'PLEASE DO NOT REPLY TO THIS EMAIL<br />';
			  $body .='Dear'. $tab['lastname'].',<br />';
			  $body .='Your Company Profile Informations has been successfully changed.<br />';
			  $body .='NOTES:<br />';
			  $body .='IF YOU REALLY WANT TO GET ALL OUR BENEFITS AND ADVANTAGES ,<br />';
			  $body .='UPGRADE AS A PREMIUM MEMBER<br />';
			  $body .='Best Regards:<br />';
			  $body .='http://www.cw-connectingworld.com:<br />';
			  $body .='CW Connecting World:<br />';
			  $body .='ADMIN:<br />';
  
		  			  
			  $headers ='From: "CW-connectingworld.com"<donotreply@cw-connectingworld.com>'."\n"; 
	   $headers .='Reply-To: donotreply@cw-connectingworld.com'."\n"; 
	   $headers = $headers.'Content-type: text/html; charset=utf-8'."\r\n";
	 	  
			  mail($email, $subject, $body, $headers);
			  $emailSent = true;
			  $urlredirect="my-page-2?action=viewcompanyprofile";
   header('Location:'.$urlredirect);
		 
			  }
		
	  }
 ?>
  <script>
  function senddata(val)
  {
  param = 'country='+val;
		  //alert (""+param+"");
		  if(document.all)
		  {
			  //Internet Explorer
			  var XhrObj = new ActiveXObject("Microsoft.XMLHTTP");
		  }//fin if
		  else
		  {
			  //Mozilla
		  var XhrObj = new XMLHttpRequest();
		  }//fin else
		  //définition de l'endroit d'affichage:
		  var regionsous = document.getElementById("region");
		   //  alert ("erreur : " + XhrObj.status); 	
		  XhrObj.open("POST", '<?php bloginfo('template_directory'); ?>/ajax.php');
		  //Ok pour la page cible
		  XhrObj.onreadystatechange = function()
		  {
			  if (XhrObj.readyState == 4 && XhrObj.status == 200)
				  regionsous.innerHTML = XhrObj.responseText ;
		  }
  
		  XhrObj.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		  XhrObj.send(param);
	  }
  </script>
  
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/registration.css" type="text/css" media="screen, projection" />
 
  <?php if($Errorfields != '') { ?>
						  <ul class="error"><? echo $Errorfields;?></ul> 
					  <?php } ?>
 <a href="<?php $monUrl ?>/#" class="bluelink" title="Edit business category">Edit business category »</a> |  <a href="<?php $monUrl ?>/my-page-2?action=editmapos" title="Edit map position" class="bluelink">Edit map position » 
 </a>|  <a href="<?php $monUrl ?>my-page-2?action=uploadcimage" title="Upload Company Image" class="bluelink">Upload Image » 
 </a>
  <form name"step1" method="POST" id="register1form">
  <h1>Edit Company</h1>
  <p>
  <span class="rouge">* = Required fields 		
  </span>
  </p>
<h3>Basic information</h3>
  <?php $company_row=get_company_byuserid($user_info->ID);
		?>
  
 <div>
 <input type="hidden" name="companykey" value="<?php echo $company_row->company_id;?>" />
 <label><?php _e('Company Name') ?><span class="rouge"> *</span><br /></label>
		
<input type="text" name="company_name" size=20 maxlength=20  value="<?php if(isset($_POST['company_name'])) {echo $_POST['company_name'];} else {echo $company_row->company_name;}?>" class="requiredField"   /> 
</div>
<div >
 <label><?php _e('Business Type') ?><span class="rouge"> *</span><br /></label>
<?php $businessTypes=get_BusinessType();?>
<select id="business1" name="business1">
<?php 
foreach($businessTypes as $businessType){
?>
<option value="<?php echo $businessType->business_type_id ;?>"><?php echo $businessType->name ;?></option>
<?php }?>
</select>

</div>
<div>
	 <label><?php _e('Presentation') ?><span class="rouge"> *</span><br /></label>
<textarea name="presentation" class="requiredField"> <?php if(isset($_POST['presentation'])) {echo $_POST['presentation'];} else {echo $company_row->company_presentation;}?></textarea>
</div>
 <label><?php _e('Country') ?><span class="rouge"> *</span><br /></label>
<?php
list_country();
?>
<div id='region'>
	 <label><?php _e('Regions') ?><br /></label>
<select id="region1" name="region1">
</select>

</div>
<div>
			 <label><?php _e('Province/State(if any)') ?><br /></label>
<input type="text" name="province" size=20 maxlength=20  value="<?php if(isset($_POST['province'])) {echo $_POST['province'];} else {echo $company_row->company_province;}?>"   /> 
</div>
<div>

		 <label><?php _e('City') ?><span class="rouge"> *</span><br /></label>

<input type="text" name="city" size=20 maxlength=20 value="<?php if(isset($_POST['city'])) {echo $_POST['city'];} else {echo $company_row->company_city;}?>" class="requiredField"  /> 
</div>
<div>

	 <label><?php _e('Street Address') ?><span class="rouge"> *</span><br /></label>
<textarea name="street_adress"  class="requiredField" ><?php if(isset($_POST['street_adress'])) {echo $_POST['street_adress'];} else {echo $company_row->company_address;}?></textarea>
</div>
<div>

		 <label><?php _e('Zip/Postal Code') ?><br /></label>
<input type="text" name="zip" size=20 maxlength=20  value="<?php if(isset($_POST['zip'])) {echo $_POST['zip'];} else {echo $company_row->company_postcode;}?>"   /> 
</div>


<div >
<?php $cats=get_unspsc_level1();?>
 <label><?php _e('Main product/Service category') ?><br /></label>
<select id="categor" name="categor">
<?php foreach( $cats as $cat){?>
<option value="<?php echo $cat->egci;?>"><?php echo $cat->title;?></option>
<?php }?>
</select>

</div>
<div>
 <label><?php _e('Product/Service Keywords(separate with a comm,Example:MP3 Player,DVD,Digital voice recorders) ') ?><br /></label>
	
<textarea name="keywords"> <?php if(isset($_POST['keywords'])) {echo $_POST['keywords'];} else {echo $company_row->keywords;}?></textarea>
</div>
<div >
<?php $industries=get_industry();?>
 <label><?php _e('Main Industry') ?><br /></label>
<select id="main_industry" name="main_industry">
<?php foreach($industries as $industry){?>
<option value="<?php echo $industry->industry_id;?>"><?php echo $industry->industry_name;?></option>
<?php }?>
</select>

</div>
<div >
<?php $NbrEmployees = get_EmployeeNbr();	?>
 <label><?php _e('Number of Employees') ?><br /></label>
<select id="employ_numbr" name="employ_numbr">
<?php foreach($NbrEmployees as $NbrEmployee){?>
<option value="<?php echo $NbrEmployee->employe_id;?>"><?php echo $NbrEmployee->nbr_emplye;?></option>
<?php }?>
</select>

</div>

<div >
<?php $AnnualSales = get_AnnualSales();	?>
 <label><?php _e('Approxim.Annual Sales') ?><br /></label>
<select id="annual_sales" name="annual_sales">
  <?php foreach($AnnualSales as $AnnualSale){?>
  <option value="<?php echo $AnnualSale->sales_id;?>"><?php echo $AnnualSale->description ;?></option>
  <?php }?>
</select>
</div>
<div>
<label for="established"><small></small></label>
 <label><?php _e('Year established') ?><br /></label>
		
<input type="text" name="established" size=4 maxlength=4  value="<?php if(isset($_POST['established'])) {echo $_POST['established'];} else {echo $company_row->company_established;}?>"   />  
</div>
<div>
 <label><?php _e('Web Site URL') ?><br /></label>
<input type="text" name="Site_url" size="60" value="<?php if(isset($_POST['Site_url'])) {echo $_POST['Site_url'];} else {echo $company_row->company_url;}?>"   /> 
</div>
<div>
 <label><?php _e('Certifications(example:ISO 9001 etc.) ') ?><br /></label>
	
<textarea name="certif"> <?php if(isset($_POST['certif'])) {echo $_POST['certif'];} else {echo $company_row->certs;}?></textarea>
</div>
<div>
 <label><?php _e('Organizations your Company are member of') ?><br /></label>
	
<textarea name="org"> <?php if(isset($_POST['org'])) {echo $_POST['org'];} else {echo $company_row->business_orgs;}?></textarea>
</div>
<div>
 <label><?php _e('Where can you export and/or provide your services') ?><br /></label>
	<?php $provids=get_provid_service();
	foreach($provids as $provid){
	?>
    <input type="checkbox" value="<?php echo $provid->id;?>" name="destination[]" /> <?php echo $provid->name;?><br />
    <?php }?>

</div>
<div>
<p style="font-size:14px; font-weight:bold; color:#03F;">Contact Informations</p>
 <label><?php _e('Contact Person') ?><span class="rouge"> *</span><br /></label>
<input type="radio" value="M"  name="person" <?php  if ($company_row->company_cp_gender== 'M')echo 'checked="checked"';?> checked="checked" />Mr.
<input type="radio" value="F" name="person" <?php  if ($company_row->company_cp_gender=='F')echo 'checked="checked"';?>/>Ms.
</div>

<div>
 <label><?php _e('First Name') ?><span class="rouge"> *</span><br /></label>
		
<input type="text" name="firstname" size=20 maxlength=20  value="<?php if(isset($_POST['firstname'])) {echo $_POST['firstname'];} else {echo $company_row->	company_cp_firstname;}?>" class="requiredField"  /> 
</div>
<div>
 <label><?php _e('Last Name') ?><span class="rouge"> *</span><br /></label>
		
<input type="text" name="lastname" size=20 maxlength=20 value="<?php if(isset($_POST['lastname'])) {echo $_POST['lastname'];} else {echo $company_row->company_cp_lastname;}?>" class="requiredField"    /> 
</div>
<div>
 <label><?php _e('Job Title') ?><br /></label>
		
<input type="text" name="jobtitle" size=20 maxlength=20  value="<?php if(isset($_POST['jobtitle']))  { echo $_POST['jobtitle'];} else {echo $company_row->company_cp_title;}?> "   /> 
</div>
<div>
 <label><?php _e('Email') ?><span class="rouge"> *</span><br /></label>
		
 <input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  { echo $_POST['email'];} else {echo $company_row->company_email;}?>" class="requiredField email" />
</div>
<div>
 <label><?php _e('Display email to other users') ?><br /></label>
		
<input type="checkbox" name="displayemail"     /> 
</div>
<div>
 <label><?php _e('Business Phone(include country code and area code)') ?><br /></label>
		
<input type="text" name="businessphone" size=20 maxlength=20 value="<?php if(isset($_POST['businessphone']))  { echo $_POST['businessphone'];} else {echo $company_row->company_phone;}?>"    /> 
</div>
<div>
 <label><?php _e('Fax Number ') ?><br /></label>
		
<input type="text" name="fax" size=20 maxlength=20  value="<?php if(isset($_POST['fax']))  { echo $_POST['fax'];} else {echo $company_row->company_fax;}?>"   /> 
</div>
<div>
 <label><?php _e('Mobile') ?><br /></label>
		
<input type="text" name="mobile" size=20 maxlength=20  value="<?php if(isset($_POST['mobile']))  { echo $_POST['mobile'];} else {echo $company_row->company_mobile;}?>"   /> 
</div>
<div>
 <input	type="submit" name="submitted" value="Save">
  </div>
  </form>
<?php }
else
{
echo 'You must register your Company First!<br />'?>
<a href="<?php $monUrl ?>/register-step2" title="as seen by others" class="bluelink">Register Your Company</a>
<?php 

}ob_end_flush();
?>