<?php 
 $monUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
  //If the form is submitted
  if(isset($_POST['submitted'])){
	// print_r($_POST)
	  $Errorfields='';
    //Check to see if the honeypot captcha field was filled in

	       if  (trim($_POST['country']) ==='' ) 
		      {
		   $Errorfields .= '<li>You forgot to choose your country.</li>';
		   $hasError = true;
	     }
	  			else {
			  $name = trim($_POST['country']);
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
//print_r ($_POST);
$tab= $_POST;
	//$PPP= mysql_real_escape_string ($POST);
//	 edit_personal_profile($POST);
global $wpdb;
$dataedit=array( 
   'display_name' => $tab['firstname']
  ,'firstname' => $tab['firstname']
  ,'lastname' => $tab['lastname']
  ,'gender' => $tab['gender']
  ,'presentation' => mysql_real_escape_string ($tab['personalpres'])
  ,'country_id'=> $tab['country']
  ,'newsletter'=> $tab['newsletter']
  ,'newsletter2'=> $tab['offring']
  ,'regtype_id'=> $tab['regtype']
  ,'prof_title'=> $tab['proftitle']
  ,'industry_id'=> $tab['industry']
  ,'region_id'=> $tab['region1']
  ,'city'=> $tab['city']
  ,'lang_spoken'=> $tab['lang']
  ,'skype_nick'=> $tab['skype_nick']
  ,'phone'=> $tab['phone']
  ,'user_email'=> $tab['email']
  ,'personal_www'=> $tab['website']
  ,'last_changed' => date('Y-m-d H:i:s')
  ,'prof_experience'=> $tab['profexperience']
  ,'edu_background'=> $tab['edu_background']
  ,'lookingfor'=> $tab['lookingfor']
  ,'offering'=> $tab['offering']
  ,'groups_memberships'=> $tab['groups_memberships']
  ,'birth_date'=> $tab['birth_date']
  ,'notify_byemail'=> $tab['emailnotify']
  ,'adress'=> $tab['adress']
  ,'zip_code'=> $tab['zip']
  );
       
	$whereedit = array( 'ID' =>  $tab['keyid']);
	$wpdb->update($wpdb->users, $dataedit, $whereedit);		
			  $email = $_POST['email'];
			  $emailTo = 'donotreply@cw-connectingworld.com';
			  $subject ='CW-connectingworld.com Edit Profile';
			  $body = 'PLEASE DO NOT REPLY TO THIS EMAIL<br />';
			  $body .='Dear '. $_POST['lastname'].',<br />';
			  $body .='Your Profile Informations has been successfully changed.<br />';
			  $body .='NOTES:<br />';
			  $body .='IF YOU REALLY WANT TO GET ALL OUR BENEFITS AND ADVANTAGES ,<br />';
			  $body .='UPGRADE AS A PREMIUM MEMBER<br />';
			  $body .= '<a href="'.get_option('siteurl').'/premium-member?iduser='. $user_id.'">'.get_option('siteurl').'/premium-member?iduser='. $user_id.'</a><br />';
			  $body .='Best Regards<br />';
			  $body .='http://www.cw-connectingworld.com<br />';
			  $body .='CW Connecting World<br />';
			  $body .='ADMIN<br />';	  			  
			  $headers ='From: "CW-connectingworld.com"<donotreply@cw-connectingworld.com>'."\n"; 
	   $headers .='Reply-To: donotreply@cw-connectingworld.com'."\n"; 
	   $headers = $headers.'Content-type: text/html; charset=utf-8'."\r\n";	  
			  mail($email, $subject, $body, $headers);
			  $emailSent = true;
			  $urlredirect="my-page-2?action=viewprofile"; 
    echo '<meta http-equiv="refresh" content="0; url='.$urlredirect.'"/>';
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
  <a href="<?php $monUrl ?>/my-page-2?action=editprofile" title="edit" class="bluelink">Edit My Profile</a>  | <a href="<?php $monUrl ?>/my-page-2?action=uploadimage" class="bluelink" title="Upload Image">Upload Image »</a> |  <a href="<?php echo get_option('siteurl'); ?>/my-page-2?action=changepassword" title="Change Password" class="bluelink">Change Password » </a>
<form name"step1" method="POST" id="register1form">
  <h1>Edit user profile/settings</h1>
  <p>
  <span class="rouge">* = Required fields 		
  </span>
  </p>
<h3>User Profile</h3>
 
      <label><?php  _e('In which country do you live? ');?><span class="rouge">*</span><br /></label>
      <?php
  list_country();
  ?>
  <div id='region'>
   <label><?php _e('Regions') ?><br /></label>
  <select id="region1" name="region1">
  </select>
  </div>
    <input type="hidden" name="keyid" id="keyid" value="<?php echo $user_id?>" />
  <p>
					 <label><?php _e('City') ?><br /></label>
					  <input type="text" name="city" id="city" value="<?php if(isset($_POST['city'])) {echo $_POST['city'];} else {echo $user_profile->city;}?>" class="requiredField" />
					 
    </p>		
  
  <p>
					 <label><?php _e('Birth date') ?>(Example: 1964-02-23 ) <br /></label>
					  <input type="text" name="birth_date" id="birth_date" value="<?php if(isset($_POST['birth_date'])) {echo $_POST['birth_date'];} else {echo $user_profile->birth_date;}?>" class="requiredField" />
    </p>		
  
  
<p>
  <label><?php _e('Gender ') ?><span class="rouge">*</span><br /></label>
  Mr. <input type="radio" style="display:inline"  
  value="M" name="gender" <?php if ($user_profile->gender =='M') echo checked;?>>  
  Ms. <input type="radio" style="display:inline"  
  value="F" name="gender" <?php if ($user_profile->gender =='F') echo checked;?>>  
  
  </p>
  
  <p>
					 <label><?php _e('First name ') ?> <span class="rouge">*</span><br /></label>
					  <input type="text" name="firstname" id="firstname" value="<?php if(isset($_POST['firstname'])) {echo $_POST['firstname'];} else {echo $user_profile->firstname;}?>" class="requiredField" />
					 
    </p>		

  <p>
					 <label><?php _e('Last name ') ?><span class="rouge">*</span><br /></label>
					  <input type="text" name="lastname" id="lastname" value="<?php if(isset($_POST['lastname'])) {echo $_POST['lastname'];} else {echo $user_profile->lastname;}?>" class="requiredField" />
					  
    </p>	
<p>
					 <label><?php _e('Personal Presentation') ?> <br /></label>
                     <textarea name="personalpres" id="personalpres"><?php if(isset($_POST['personalpres'])) {echo $_POST['personalpres'];} else {echo $user_profile->presentation;}?></textarea>
                     </p>
                     <p>
                     <label><?php _e('Personal Web Site') ?> <br /></label>
					  <input type="text" name="website" id="website" value="<?php if(isset($_POST['website'])) {echo $_POST['website'];} else {echo $user_profile->personal_www;}?>" class="requiredField" />
					 
    </p>		  
  
 
  
  <hr>
<h2>Professional profile</h2>  
<p>
 <?php
  list_regtype ();
  ?>
  </p>
   <?php
  $industries=get_industry ();
  ?>
  <label>
      <?php _e('In which industry do you have the most expertise? ') ?>
      <br />
<select id="industry" name="industry">
 <option value=""><?php _e('- Select -') ?></option>
 <?php
  foreach ($industries as $industry) 
  {
	  
   echo '<option value="'.$industry->industry_id.'">'.$industry->industry_name.'</option>';
  }
?>
 </select>   
    </label>  
  </p>
   <p>
					 <label><?php _e('Professionnel Title') ?><br /></label>
					  <input type="text" name="proftitle" id="proftitle" value="<?php if(isset($_POST['proftitle'])) {echo $_POST['proftitle'];} else {echo $user_profile->prof_title;}?>" class="requiredField" />
					 
    </p>	
    <p>
		

        			 <label><?php _e('Professional experience ') ?>(Include timeperiod, company, title, description - <a onmousedown="if(document.getElementById('mydiv2').style.display == 'none'){ document.getElementById('mydiv2').style.display = 'block'; }else{ document.getElementById('mydiv2').style.display = 'none'; }" href="javascript:;">See example</a> )
 </label>
 <div id="mydiv2" style="display: none; overflow: hidden; height: auto;">
2003 -<br/>
Electro systems Ltd., CEO<br/>
Stratetic analysis and ...<br/>
<br/>
1999-2003<br/>
Computers & IT systems, Developer<br/>
Developing of...<br/>
<br/>
1991-1999<br/>
Global systems , Engineer<br/>
In charge of R&D department...
</div>
                     <textarea name="profexperience" id="profexperience"><?php if(isset($_POST['profexperience'])) {echo $_POST['profexperience'];} else {echo $user_profile->prof_experience	;}?></textarea>
                     </p>
  <p>
					 <label><?php _e('Educational background') ?><br /></label>
                     <textarea name="edu_background" id="edu_background"><?php if(isset($_POST['edu_background'])) {echo $_POST['edu_background	'];} else {echo $user_profile->edu_background	;}?></textarea>
                     </p>

<p>
					 <label><?php _e('Looking for') ?><br /></label>
                     <textarea name="lookingfor" id="lookingfor"><?php if(isset($_POST['lookingfor'])) {echo $_POST['lookingfor'];} else {echo $user_profile->lookingfor;}?></textarea>
                     </p>

<p>
					 <label><?php _e('Offering') ?><br /></label>
                     <textarea name="offering" id="offering"><?php if(isset($_POST['offering'])) {echo $_POST['offering'];} else {echo $user_profile->offering;}?></textarea>
                     </p>
                     <p>
					 <label><?php _e('Organizations and clubs I am member in') ?><br /></label>
                     <textarea name="groups_memberships" id="groups_memberships"><?php if(isset($_POST['groups_memberships'])) {echo $_POST['groups_memberships'];} else {echo $user_profile->groups_memberships;}?></textarea>
                     </p>
                     <h2>Contact Info</h2>
                      <p>
					 <label><?php _e('Skype UserName') ?><br /></label>
					  <input type="text" name="skype_nick" id="skype_nick" value="<?php if(isset($_POST['skype_nick'])) {echo $_POST['skype_nick'];} else {echo $user_profile->skype_nick;}?>" class="requiredField" />
					 
    </p>	                
     <p>
					 <label><?php _e('Phone') ?><br /></label>
					  <input type="text" name="phone" id="phone" value="<?php if(isset($_POST['phone'])) {echo $_POST['phone'];} else {echo $user_profile->phone;}?>" class="requiredField" />
					 
    </p>	
     <p>
					 <label><?php _e('Languages in which you can communicate ') ?><br /></label>

 <?php
 $langs=list_spoken_lang ();
  foreach ($langs as $lang) 
  {
	  echo ' <input type="checkbox" name="lang[]" value="'.$lang->name_lang.'" />'.$lang->name_lang.'<br />';
  
  }
					  
	?>				 
    </p>
    <h2>Account Settings</h2>	
     <p>
   <label><?php _e('E-mail ') ?><span class="rouge">*</span><br /></label>
					  <input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  {echo $_POST['email'];} else {echo $user_profile->user_email;}?>" class="requiredField email" />			
  </p>
   <p>
   <label>
   <?php _e('Confirm e-mail') ?>(If you change your email in the field above)<br /></label>
					  <input type="text" name="confemail" id="confemail" value="<?php if(isset($_POST['confemail']))  echo $_POST['confemail'];?>" class="requiredField email" />
					
  </p>
          
    <p>
   <label>
   <?php _e('Notify me on e-mail ') ?> (If someone sends you a message or applying to a group you have created)<br /></label>
					 <input name="emailnotify" type="checkbox" value="1" checked />
					
  </p>     
   <p>
   <label>
   <?php _e('Yes, I want the CW newsletter with news about the site and other business information ') ?><br /></label>
					 <input name="newsletter11" type="checkbox" value="1" checked />
					
  </p>     
   <p>
   <label>
   <?php _e('Yes, I want to recieve great offerings and information from CW partners') ?><br /></label>
					 <input name="offring" type="checkbox" value="1" checked />
					
  </p>                      
  
  <input	type="submit" name="submitted" value="Save">
  </form>

 
 