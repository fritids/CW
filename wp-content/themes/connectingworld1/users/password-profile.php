 <?php 

 if(isset($_POST['submitted'])) {
	  $Errorfields='';
	  
	
 //Check to make sure that the password field is not empty
		  $pwd = $_POST['newpassword'];
		  if(trim($_POST['newpassword']) === '') {
			  $Errorfields .= '<li>You forgot to enter your New password.</li>';
			  $hasError = true;
		  }else {
if( strlen($pwd) < 8 ) {
	$Errorfields .= '<li>Password too short! At least 8 caracters.</li>';
			  $hasError = true;
}else {$name = trim($_POST['password']);}
if( strlen($pwd) > 20 ) {
	$Errorfields .= '<li>Password too long!.</li>';
    $hasError = true;
}else {$name = trim($_POST['password']);}
if( !preg_match("#[0-9]+#", $pwd) ) {
	$Errorfields .= '<li>Password must include at least one number!. </li>';
    $hasError = true;
}else {$name = trim($_POST['password']);}

if( !preg_match("#[a-z]+#", $pwd) ) {
	$Errorfields .= '<li>Password must include at least one letter!.</li>';
    $hasError = true;
}else {$name = trim($_POST['password']);}

if( !preg_match("#[A-Z]+#", $pwd) ) {
		$Errorfields .= '<li>Password must include at least one CAPS!. </li>';
    $hasError = true;
}else {$name = trim($_POST['password']);}

if( !preg_match("#\W+#", $pwd) ) {
	$Errorfields .= '<li>Password must include at least one symbol!. </li>';
    $hasError = true;
}else {$name = trim($_POST['password']);}

			  $name = trim($pwd);
		  }
if ($_POST['newpassword'] == $_POST['confpassword']) {
	
	}else
	{$Errorfields .= '<li>Password Confirmation Error!. </li>';
    $hasError = true;
		}
  if(!isset($hasError)) {
			  update_user_pass($user_info->ID,md5($_POST['newpassword']));      			   
  }
 }
 
 ?> <a href="<?php $monUrl ?>/my-page-2?action=editprofile" title="edit" class="bluelink">Edit My Profile</a>  | <a href="<?php $monUrl ?>/my-page-2?action=uploadimage" class="bluelink" title="Upload Image">Upload Image »</a> 
   <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/registration.css" type="text/css" media="screen, projection" />
<h3>Change password</h3>
  <?php if($Errorfields != '') { ?>
						  <ul class="error"><? echo $Errorfields;?></ul> 
					  <?php } ?>
<?php
 $monUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  ?>
 <p class=infobox><br>
If you want to change your password you can do it here,<br/>
for security reasons you have to enter your old (existing) password to do so. 
<br>
</p>
<form enctype="multipart/form-data" action="my-page-2?action=changepassword" method="POST">

<p>
<label><?php _e('New Password') ?><span class="rouge"> *</span><br /></label>
<input type="password" name="newpassword" id="newpassword" value="<?php if(isset($_POST['newpassword'])) echo $_POST['newpassword'];?>" class="requiredField" />
					 
	  </p>
<p>
<label><?php _e('Retype Password') ?><span class="rouge"> *</span><br /></label>
<input type="password" name="confpassword" id="confpassword" value="<?php if(isset($_POST['confpassword'])) echo $_POST['confpassword'];?>" class="requiredField" />
					 
	  </p>
<input type="submit" name="submitted" value="Apply Changes" />
</form>

<hr>