<?php
  /*
  Template Name: register-step2
  */
  get_header(); 
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
<?php 
if ($_GET['iduser'])
{
	$userid = $_GET['iduser'];
//echo $userid.'1';
}
else
{
global $current_user;
      get_currentuserinfo();
	 $userid=  $current_user->ID; 
	// echo $userid.'2';
}
 $user_info = get_userdata($userid);
 
  //If the form is submitted
  if( (isset($_POST['submitted2'])) || (isset($_POST['skip2'])))
   {
	  $Errorfields='';
	   if(trim($_POST['company_name']) === '') 
	   {
			  $Errorfields .= '<li>You forgot to enter your Company name.</li>';
			  $hasError2 = true;
		  } else {
			  $name = trim($_POST['company_name']);
		  }
		  
		  if(trim($_POST['presentation']) === '') 
		  {
			  $Errorfields .= '<li>You forgot to enter your Presentation.</li>';
			  $hasError2 = true;
		  } else {
			  $name = trim($_POST['presentation']);
		  }
		  
		  
		  if  (trim($_POST['country']) ==='' ) 
		      {
		   $Errorfields .= '<li>You forgot to choose your country.</li>';
		   $hasError2 = true;
	     }
	  			else {
			  $name = trim($_POST['country']);
		  		}
		  
		   if(trim($_POST['city']) === '')
		    {
			  $Errorfields .= '<li>You forgot to enter your City.</li>';
			  $hasError2 = true;
		  } else {
			  $name = trim($_POST['city']);
		  }
		  
		   if(trim($_POST['street_adress']) === '') {
			  $Errorfields .= '<li>You forgot to enter your Street adress.</li>';
			  $hasError2 = true;
		  } else {
			  $name = trim($_POST['street_adress']);
		  }
		  
		   if(trim($_POST['firstname']) === '') {
			  $Errorfields .= '<li>You forgot to enter your First name.</li>';
			  $hasError2 = true;
		  } else {
			  $name = trim($_POST['firstname']);
		  }
		  
		   if(trim($_POST['lastname']) === '') {
			  $Errorfields .= '<li>You forgot to enter your Last Name.</li>';
			  $hasError2 = true;
		  } else {
			  $name = trim($_POST['lastname']);
		  }
		  
		   //Check to make sure sure that a valid email address is submitted
		  if(trim($_POST['email']) === '')  
		  {
			  $Errorfields .= '<li>You forgot to enter your email address.</li>';
			  $hasError2 = true;
		  } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) 
		  {
			  $Errorfields .= '<li>You entered an invalid email address.</li>';
			  $hasError2 = true;
		  } else 
		  {
			 
			  $email = trim($_POST['email']);
			  }
  }
  
 if(!isset($hasError2) && (!empty ($_POST['company_name']))) 
 {
  global $wpdb;
  if(isset($_POST['displayemail']))
     $displaymail = 1;
  
  $country=$wpdb->get_row("SELECT country_name FROM $wpdb->country where country_id=".$_POST['country']);
  $region=$wpdb->get_row("SELECT region_name FROM $wpdb->region where region_id=".$_POST['region1']);
  
  
  $add=$_POST['street_adress'].' '.$_POST['city'].' '.$_POST['zip'].' '.$_POST['province'].' '.$region->region_name.' '.$country->country_name;

$coord=getCoordonnees($add);
$cord=explode(',',$coord);

 $date=date('y-m-d');
 
 $data=array('user_id'=> $userid,'company_country_id'=>$_POST['country'],'business_type_id'=>$_POST['business1'],'company_name'=>$_POST['company_name'],'company_presentation'=>$_POST['presentation'],'company_address'=>$_POST['street_adress'],'company_city'=>$_POST['city'],'company_postcode'=>$_POST['zip'],'company_province'=>$_POST['province'],'company_type'=>$_POST['business1'],'company_phone'=>$_POST['businessphone'],'company_mobile'=>$_POST['mobile'],'company_fax'=>$_POST['fax'],'company_email'=>$_POST['email'],'company_url'=>$_POST['Site_url'],'company_noof_employee'=>$_POST['employ_numbr'],'company_annualsales'=>$_POST['annual_sales'],'company_established'=>$_POST['established'],'company_cp_gender'=>$_POST['person'],'company_cp_firstname'=>$_POST['firstname'],'company_cp_lastname'=>$_POST['lastname'],'company_cp_title'=>$_POST['jobtitle'],'company_map_lon'=>$cord[1],'company_map_lat'=>$cord[0],'display_email'=>$displaymail,'date_register'=>$date,'industry_id'=>$_POST['main_industry'],'region_id'=>$_POST['region1'],'certs'=>$_POST['certif'],'keywords'=>$_POST['keywords'],'business_orgs'=>$_POST['org'],'regions_provide'=> $_POST['destination'],'main_unspcs'=>$_POST['cat']);


 $wpdb->insert($wpdb->company, $data);
 $campanyid = $wpdb->insert_id; 
 
 $data1=array('default_company_id'=> $campanyid,'last_changed'=>$date);


 $where=array('ID'=> $userid);
 $wpdb->update($wpdb->users, $data1, $where );
 
  if (isset($_POST['submitted2']))
			  {
			  $email = $user_info->user_email;
			  $emailTo = 'do-not-reply@cw-connectingworld.com';
			  $subject ='CW-connectingworld.com Registration STEP 2';
			  $body = 'PLEASE DO NOT REPLY TO THIS EMAIL<br />';
			  $body .='Dear '. $user_info->display_name.',<br />';
			  $body .='Welcome as a member in CW Connecting World.<br />';
			  $body .='You can log into your account with the following information:<br /><br />';
			  $body .='Username: '. $user_info->user_login .'<br />';
			  $body .='Password: Please Verify the previous Email "CW-connectingworld.com Registration STEP 1" <br />';
			  $body .='Your Company: '.$_POST['company_name'].' <br />';
			  $body .='To continue your registration.<br />';
			  $body .='Please click at the Link below and you will be redirected to your page:<br />';
			  $body .='<a href="'.get_option('siteurl').'/my-page-2">'.get_option('siteurl').'</a><br />';
			  $body .='NOTES:<br />';
			  $body .='IF YOU REALLY WANT TO GET ALL OUR BENEFITS AND ADVANTAGES ,<br />';
			  $body .='PLEASE CLICK AT THIS LINK BELOW TO UPGRADE AS A PREMIUM MEMBER<br />';
			  $body .= '<a href="'.get_option('siteurl').'/premium-member?iduser='.$userid.'">'.get_option('siteurl').'/premium-member?iduser='.$userid.'</a><br />';
			  $body .='Best Regards<br />';
              $body .='http://www.cw-connectingworld.com<br />';
			  $body .='CW Connecting World<br />';
			  $body .='ADMIN<br />';
		  			  
			  $headers ='From: "CW-connectingworld.com"<do-not-reply@cw-connectingworld.com>'."\n"; 
	   $headers .='Reply-To: do-not-reply@cw-connectingworld.com'."\n"; 
	   $headers = $headers.'Content-type: text/html; charset=utf-8'."\r\n";
	  
  
		  //	$headers = 'From: CW-connectingworld.com <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			  
			  mail($email, $subject, $body, $headers);
			  $emailSent = true;
 
  $url= bloginfo('url').'/register-step3-2?iduser='.$userid;
  echo '<meta http-equiv="refresh" content="0; url='.$url.'"/>';
			  } 
		  
			   if (isset($_POST['skip2']))
			  {
				$email = $user_info->user_email;
			  $emailTo = 'do-not-reply@cw-connectingworld.com';
			  $subject ='CW-connectingworld.com Registration STEP 2';
			  $body = 'PLEASE DO NOT REPLY TO THIS EMAIL<br />';
			  $body .='Dear'. $user_info->display_name.',<br />';
			  $body .='Welcome as a member in CW Connecting World.<br />';
			  $body .='You can log into your account with the following information:<br /><br />';
			  $body .='Username:'. $user_info->user_login .'<br />';
			  $body .='Password: Please Verify the previous Email "CW-connectingworld.com Registration STEP 1" <br />';
			  $body .='Your Company:'.$_POST['company_name'].' <br />';
			  $body .='To continue your registration.<br />';
			  $body .='Please click at the Link below and you will be redirected to your page:<br />';
			  $body .='<a href="'.get_option('siteurl').'/my-page-2">'.get_option('siteurl').'</a><br />';
			  $body .='NOTES:<br />';
			  $body .='IF YOU REALLY WANT TO GET ALL OUR BENEFITS AND ADVANTAGES ,<br />';
			  $body .='PLEASE CLICK AT THIS LINK BELOW TO UPGRADE AS A PREMIUM MEMBER<br />';
			  $body .= '<a href="'.get_option('siteurl').'/premium-member?iduser='.$userid.'">'.get_option('siteurl').'/premium-member?iduser='.$userid.'</a><br />';
			  $body .='Best Regards<br />';
              $body .='http://www.cw-connectingworld.com<br />';
			  $body .='CW Connecting World<br />';
			  $body .='ADMIN<br />';
		  			  
			  $headers ='From: "CW-connectingworld.com"<do-not-reply@cw-connectingworld.com>'."\n"; 
	   $headers .='Reply-To: do-not-reply@cw-connectingworld.com'."\n"; 
	   $headers = $headers.'Content-type: text/html; charset=utf-8'."\r\n";
	  
  
		  //	$headers = 'From: CW-connectingworld.com <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			  
			  mail($email, $subject, $body, $headers);
			  $emailSent = true;
 
	   $url= bloginfo('url').'/';
	   echo '<meta http-equiv="refresh" content="0; url='.$url.'"/>';
	   }
 }


?>

  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/registration.css" type="text/css" media="screen, projection" />
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/contact-form.js"></script>

<div class="span-24" id="contentwrap">
	<div class="span-13"  style="width:790px; background-color:#FFF;"> 
		<div id="content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" style="margin-top:2px;">
				<div class="entry">
                    <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
  <h2 class="title">Registration to CW STEP-2</h2><p>First you register to be a free Basic Member in CW. When your registration is completed
you can upgrade to be a Premium Member and get more benefits of your choice.</p>
  <?php if($Errorfields != '') { ?>
						  <ul class="error"><? echo $Errorfields;?></ul> 
					  <?php } ?>
                      
<form name"step2" action=""  method="POST" id="register2form">
<div style="clear:both;margin-bottom:20px;margin-bottom:20px;" class="clearfix">
	<div style="float:left;color:gray;font-weight:bold;border:solid 1px gray;padding:5px">1. Member registration</div>
	<div style="width:50px;float:left;border-bottom:solid 1px gray">&nbsp;</div>

	<div style="float:left;border:solid 1px gray;padding:5px">2. Company registration</div>
	<div style="width:50px;float:left;border-bottom:solid 1px gray">&nbsp;</div>

	<div style="float:left;color:gray;border:solid 1px gray;padding:5px">3. Products/services registration</div>

</div>
<br/>
 <p><span class="rouge">Note!</span> If you prefer to just become a private
member at the moment, scroll down and click
on "Register  Step3 later".</p>
  <hr>

  <p>
  <span class="rouge">* = Required fields 		
  </span>
  </p>

<div>
 <label><?php _e('Company Name') ?><span class="rouge"> *</span><br /></label>
		
<input type="text" name="company_name" size=20 maxlength=20  value="<?php if(isset($_POST['company_name'])) echo $_POST['company_name'];?>" class="requiredField"   /> 
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
<textarea name="presentation" class="requiredField"> <?php if(isset($_POST['presentation'])) echo $_POST['presentation'];?></textarea>
</div>
  <label><?php _e('Countries') ?> <span class="rouge"> *</span></label>
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
<input type="text" name="province" size=20 maxlength=20  value="<?php if(isset($_POST['province'])) echo $_POST['province'];?>"   /> 
</div>
<div>

		 <label><?php _e('City') ?><span class="rouge"> *</span><br /></label>

<input type="text" name="city" size=20 maxlength=20 value="<?php if(isset($_POST['city'])) echo $_POST['city'];?>" class="requiredField"  /> 
</div>
<div>

	 <label><?php _e('Street Address') ?><span class="rouge"> *</span><br /></label>
<textarea name="street_adress"  class="requiredField" ><?php if(isset($_POST['street_adress'])) echo $_POST['street_adress'];?></textarea>
</div>
<div>

		 <label><?php _e('Zip/Postal Code') ?><br /></label>
<input type="text" name="zip" size=20 maxlength=20  value="<?php if(isset($_POST['zip'])) echo $_POST['zip'];?>"   /> 
</div>


<div >
<?php $cats=get_unspsc_level1();?>
 <label><?php _e('Main product/Service category') ?><br /></label>
<select id="cat" name="cat">
<?php foreach( $cats as $cat){?>
<option value="<?php echo $cat->egci;?>"><?php echo $cat->title;?></option>
<?php }?>
</select>

</div>
<div>
 <label><?php _e('Product/Service Keywords(separate with a comm,Example:MP3 Player,DVD,Digital voice recorders) ') ?><br /></label>
	
<textarea name="keywords"> <?php if(isset($_POST['keywords'])) echo $_POST['keywords'];?></textarea>
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
		
<input type="text" name="established" size=4 maxlength=4  value="<?php if(isset($_POST['established'])) echo $_POST['established'];?>"   />  
</div>
<div>
 <label><?php _e('Web Site URL') ?><br /></label>
<input type="text" name="Site_url" size="60" value="<?php if(isset($_POST['Site_url'])) echo $_POST['Site_url'];?>"   /> 
</div>
<div>
 <label><?php _e('Certifications(example:ISO 9001 etc.) ') ?><br /></label>
	
<textarea name="certif"> </textarea>
</div>
<div>
 <label><?php _e('Organizations your Company are member of') ?><br /></label>
	
<textarea name="org"> </textarea>
</div>
<div>
 <label><?php _e('Where can you export and/or provide your services') ?><br /></label>
 <table>
	<?php $provids=get_provid_service();
 
	//foreach($provids as $key=>$provid){
        for($i=0;$i<10;$i+=2){
	?>
     <tr>
    <td><input type="checkbox" value="<?php echo $provids[$i]->id;?>" name="destination" /></td><td> <label><?php echo $provids[$i]->name;?></label></td>
 
    <td><input type="checkbox" value="<?php echo $provids[$i+1]->id;?>" name="destination" /></td><td> <label><?php echo $provids[$i+1]->name;?></label></td>
 </tr>
    <?php }?>
 </table>
</div>
<div>
<p style="font-size:14px; font-weight:bold; color:#03F;">Contact Informations</p>
 <label><?php _e('Contact Person') ?><span class="rouge"> *</span> <br /></label>
 <label><input type="radio" value="M" name="person"/>Mr.</label>
 <label><input type="radio" value="Ms" name="person"/>Ms.</label>
</div>

<div>
 <label><?php _e('First Name') ?><span class="rouge"> *</span><br /></label>
		
<input type="text" name="firstname" size=20 maxlength=20  value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname'];?>" class="requiredField"  /> 
</div>
<div>
 <label><?php _e('Last Name') ?> <span class="rouge"> *</span><br /></label>
		
<input type="text" name="lastname" size=20 maxlength=20 value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname'];?>" class="requiredField"    /> 
</div>
<div>
 <label><?php _e('Job Title') ?><br /></label>
		
<input type="text" name="jobtitle" size=20 maxlength=20    /> 
</div>
<div>
 <label><?php _e('Email') ?><span class="rouge"> *</span><br /></label>
		
 <input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" />
</div>
<div>
 <label><?php _e('Display email to other users') ?><br /></label>
		
<input type="checkbox" name="displayemail"     /> 
</div>
<div>
 <label><?php _e('Business Phone(include country code and area code)') ?><br /></label>
		
<input type="text" name="businessphone" size=20 maxlength=20    /> 
</div>
<div>
 <label><?php _e('Fax Number ') ?><br /></label>
		
<input type="text" name="fax" size=20 maxlength=20    /> 
</div>
<div style="margin-bottom: 10px;">
 <label><?php _e('Mobile') ?><br /></label>
		
<input type="text" name="mobile" size=20 maxlength=20    /> 
</div>

 <input	type="submit" name="submitted2" id="submitted2" value="Go to Step3">
<input	type="submit"  id="skip2" name="skip2" value="Register Step3 later"></a>

</form>      
                      
                 
				</div>
			</div>
			</div>
    		<?php endwhile; endif; ?>
		</div>
	</div>


<?php include (TEMPLATEPATH . "/sidebar2.php"); ?>
</div>
<?php 
get_footer(); ?>