 <?php
  /*
  Template Name: register-step1
  */
  get_header(); 
  ?>
    <?php 
  //If the form is submitted
  if(isset($_POST['submitted']) || isset($_POST['skip'])) {
	  $Errorfields='';
   $sanitized_user_login = sanitize_user( $_POST['user_login']);
	  //Check to see if the honeypot captcha field was filled in
	   if(trim($_POST['acceptit']) == false) {
		  $Errorfields .= '<li>You must accept our condition first.</li>';
		  $hasError = true;
	  } else {
	       if  (trim($_POST['country']) ==='' ) 
		      {
		   $Errorfields .= '<li>You forgot to choose your country.</li>';
		   $hasError = true;
	     }
	  			else {
			  $name = trim($_POST['country']);
		  		}
		  
		  //Check to make sure that the name field is not empty
		  if(trim($_POST['user_login']) === '') {
			  $Errorfields .= '<li>You forgot to enter your name.</li>';
			  $hasError = true;
		  } else if  (username_exists( $sanitized_user_login ) ) 
		  
		  {
		   $Errorfields .= '<li>User already existe.</li>';
			  $hasError = true;
	}
	  else {
			  $name = trim($_POST['user_login']);
		  }
		  
		  //Check to make sure that the password field is not empty
		  $pwd = $_POST['password'];
		  if(trim($_POST['password']) === '') {
			  $Errorfields .= '<li>You forgot to enter your password.</li>';
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
	$Errorfields .= '<li>Password must include at least one symbol! [&,@,é,",+,-,#,...]. </li>';
    $hasError = true;
}else {$name = trim($_POST['password']);}

			  $name = trim($pwd);
		  }

		  //Check to make sure that the conf password field is not empty
		  if(trim($_POST['password_confirm']) === '') {
			  $Errorfields .= '<li>You forgot to enter your confirmation password.</li>';
			  $hasError = true;
		  } else {
			  $name = trim($_POST['password_confirm']);
		  }
		  
		  if(trim($_POST['password_confirm']) != trim($_POST['password']) ) {
			  $Errorfields .= '<li>Error Password Confirmation</li>';
			  $hasError = true;
		  } else {
			  $name = trim($_POST['password_confirm']);
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
		  } else {
			 if  (email_exists($_POST['email'])) {
				  $Errorfields .= '<li>Email Already exits.</li>';
			     $hasError = true;}
			  else
			  {
			  $email = trim($_POST['email']);
			  }
			  }
			   /***********Generate hash code**********/ 
		  //If there is no error, send the email
		  if(!isset($hasError)) {
		?>	 
         <script type="text/javascript">		
			
			$("#submitted").click(function() {
    $('<a href="path/to/whatever">Friendly description</a>').fancybox({
        overlayShow: true
    }).click();
});	
	</script>
	<?php
	  $key=md5($date.''.$_POST['email']);  
		 $date=date('y-m-d H:i:s');
        
		$pdo = new PDO('mysql:dbname=lastphpbb3;host=localhost','lphpbbmysqluser','RIB86wap#GLYPH3');
  
  $pdo->query("insert into phpbb_users(user_ip,user_regdate,username,username_clean,user_password,user_email,user_email_hash) values ('".$_SERVER['REMOTE_ADDR']."','".time()."','".$_POST['user_login']."','".strtolower($_POST['user_login'])."','".md5($_POST['password'])."','".$_POST['email']."','".hash('md5',$_POST['email'])."')");

		 global $wpdb;
		 
		 $wpdb->insert( 
	     $wpdb->users, 
	     array(
			   'user_login' => $_POST['user_login'],
			   'user_pass' => md5($_POST['password']),
			   'user_nicename' => $_POST['firstname'],
			   'user_email' => $_POST['email'],
			   'user_url' => '',
			   'user_registered' => $date,
			   'user_status' => '0',
			   'display_name' => $_POST['firstname'],
			   'firstname' => $_POST['firstname'],
			   'lastname' => $_POST['lastname'],
			   'gender' => $_POST['gender'],
			   'country_id' => $_POST['country'],
			   'memberdate' => $date,
			   'ip_adress' => $_SERVER['REMOTE_ADDR'],
			   'region_id' => $_POST['region1']));
	
	
	       //Select LAST user

			   $user_ID = $wpdb->insert_id; 
			   
		 
		 $wpdb->insert(
		 $wpdb->usermeta, 
		 array ('user_id' => $user_ID,
		 'meta_key' =>'cw_capabilities',
		 'meta_value' =>'a:1:{s:6:"author";s:1:"1";}'
		 ));
		 
		 $wpdb->insert( 
		 $wpdb->usermeta, 
		 array ('user_id' => $user_ID,
		 'meta_key' =>'nickname',
		 'meta_value' =>$_POST['user_login']
		 ));
		 
		 	   $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
			   $message  = sprintf(__('New user registration on your site %s:'), $blogname) . "\r\n\r\n";
	           $message .= sprintf(__('Username: %s'), $_POST['user_login']) . "\r\n";
	           $message .= sprintf(__('E-mail: %s'), $_POST['email']) . "\r\n";
	           @wp_mail(get_option('admin_email'), sprintf(__('[%s] New User Registration'), $blogname), $message);

//$user_ID = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->users ORDER BY ID DESC LIMIT 1"));
   $url= bloginfo('url').'/register-step2?iduser='.$user_ID;
		  if (isset($_POST['submitted']))
			  {
			  $email = $_POST['email'];
			  $emailTo = 'donotreply@cw-connectingworld.com';
			  $subject ='CW-connectingworld.com Registration STEP 1';
			  $body = 'PLEASE DO NOT REPLY TO THIS EMAIL<br />';
			  $body .='Dear '. $_POST['lastname'].',<br />';
			  $body .='Welcome as a member in CW Connecting World. You have been registered for a Basic Membership<br />';
			  $body .='You can log into your account with the following informations:<br /><br />';
			  $body .='Username:<strong>'. $_POST['user_login'] .'</strong><br />';
			  $body .='Password:<strong>'. $_POST['password'] .'</strong><br />';
			  $body .='To confirm and continue your registration, Please click at the Link below and you will be redirected to your page:<br />';
			  $body .='<a href="'.get_option('siteurl').'/my-page-2">'.get_option('siteurl').'/my-page-2</a><br /><br />';
			  $body .='NOTES:<br />';
			  $body .='IF YOU REALLY WANT TO GET ALL OUR BENEFITS AND ADVANTAGES ,<br />';
			  $body .='PLEASE CLICK AT THIS LINK BELOW TO UPGRADE AS A PREMIUM MEMBER<br />';
			  $body .= '<a href="'.get_option('siteurl').'/premium-member?iduser='.$user_ID.'">'.get_option('siteurl').'/premium-member?iduser='.$user_ID.'</a><br />';
			  $body .='Best Regards,<br />';
			  $body .='http://www.cw-connectingworld.com<br />';
			  $body .='CW Connecting World<br />';
			  $body .='ADMIN<br />';
			  $headers ='From: "CW-connectingworld.com"<donotreply@cw-connectingworld.com>'."\n"; 
	   $headers .='Reply-To: donotreply@cw-connectingworld.com'."\n"; 
	   $headers = $headers.'Content-type: text/html; charset=utf-8'."\r\n";
	  
  
		  //	$headers = 'From: CW-connectingworld.com <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			  
			  mail($email, $subject, $body, $headers);
			  $emailSent = true;
	   
	
  
 	echo '<meta http-equiv="refresh" content="0; url='.$url.'"/>';
 
			  }
			  else {
			  $email = $_POST['email'];
			  $emailTo = 'donotreply@cw-connectingworld.com';
			  $subject ='CW-connectingworld.com Registration STEP 1';
			  $body = 'PLEASE DO NOT REPLY TO THIS EMAIL<br />';
			  $body .='Dear'. $_POST['lastname'].',<br />';
			  $body .='Welcome as a member in CW Connecting World \n You have been registered for a Basic Membership<br />';
			  $body .='You can log into your account with the following information:<br /><br />';
			  $body .='Username:'. $_POST['user_login'] .'<br />';
			  $body .='Password:'. $_POST['password'] .'<br />';
			  $body .='To confirm and continue your registration.<br />';
			  $body .='Please click at the Link below and you will be redirected to your page:<br />';
			  $body .='<a href="'.get_option('siteurl').'/my-page-2">'.get_option('siteurl').'/my-page-2</a><br />';
			  $body .='NOTES:<br />';
			  $body .='IF YOU REALLY WANT TO GET ALL OUR BENEFITS AND ADVANTAGES ,<br />';
			  $body .='PLEASE CLICK AT THIS LINK BELOW TO UPGRADE AS A PREMIUM MEMBER<br />';
			  $body .= '<a href="'.get_option('siteurl').'/premium-member?iduser='.$user_ID.'">'.get_option('siteurl').'/premium-member?iduser='.$user_ID.'</a><br />';
			  $body .='Best Regards<br />';
			  $body .='http://www.cw-connectingworld.com<br />';
			  $body .='CW Connecting World<br />';
			  $body .='ADMIN<br />';
  			  
			  $headers ='From: "CW-connectingworld.com"<donotreply@cw-connectingworld.com>'."\n"; 
	          $headers .='Reply-To: donotreply@cw-connectingworld.com'."\n"; 
	          $headers = $headers.'Content-type: text/html; charset=utf-8'."\r\n";
	  
			  mail($email, $subject, $body, $headers);
			  $emailSent = true;
			    $url2= bloginfo('url');
					echo '<meta http-equiv="refresh" content="0; url='.$url2.'"/>';
//		wp_redirect($url2); exit();
		
	?>
		<SCRIPT LANGUAGE="JavaScript">
			
			<!-- affichage de popup greybox
			GB_showCenter('Success Registration',"<?php echo get_option('siteurl'); ?>/wp-content/themes/<?php echo get_option('template'); ?>/register_popup.php",200,250);
			//-->
		
		</SCRIPT>
		<?php
	
	   }
	}
	
	}
	  
  }?>

  <script type="text/javascript">
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
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/contact-form.js"></script>
<div class="span-24" id="contentwrap">
	<div class="span-13"  style="width:790px; background-color:#FFF;"> 
		<div id="content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" style="margin-top:2px;">
				<div class="entry">
                    <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
<h2 class="title">Registration to CW STEP-1</h2><p>First you register to be a free Basic Member in CW. When your registration is completed
you can upgrade to be a Premium Member and get more benefits of your choice.</p>
  <?php if($Errorfields != '') { ?>
						  <ul class="error"><? echo $Errorfields;?></ul> 
					  <?php } ?>
					  
                           <span class="basicmember" style="z-index:1"><img src="<?php bloginfo('template_directory'); ?>/images/icon_b.png"  border="0" align="left"  class="registerimage" alt=""/>
  <a href="<?php bloginfo('url'); ?>/freemember?popup=true" title="BASIC MEMBER BENEFITS" rel="gb_pageset[nice_pages]">BASIC MEMBER BENEFITS</a></span>
   <span class="premiummember"><img src="<?php bloginfo('template_directory'); ?>/images/icon_p-premium.png"  border="0" align="left"  class="registerimage" alt=""/><a href="<?php bloginfo('url'); ?>/premiummember?popup=true" title="PREMIUM MEMBER BENEFITS" rel="gb_pageset[nice_pages]">PREMIUM MEMBER BENEFITS</a></span>
<br /><br />
  <form name"step1" method="POST" id="register1form">
  <span style="color:#1250A1;font-weight:bold; margin-top:50px;">Registration in CW</span>
  
  <div style="clear:both;margin-bottom:20px;margin-bottom:20px;" class="clearfix">
	  <div style="float:left;font-weight:bold;border:solid 1px gray;padding:5px">1. Member registration</div>
	  <div style="width:50px;float:left;border-bottom:solid 1px gray">&nbsp;</div>
  
	  <div style="float:left;color:gray;border:solid 1px gray;padding:5px">2. Company registration</div>
	  <div style="width:50px;float:left;border-bottom:solid 1px gray">&nbsp;</div>
  
	  <div style="float:left;color:gray;border:solid 1px gray;padding:5px">3. Products/services registration</div>
  
  </div>
  <div>
  <br/>
   <p><span class="rouge">Note!</span> You can ignore to fill in both step 2 and 3, but you will have to click the "Go to Step2" button
  here below and go through them all, in order to come to the "Confirm" button at step 3.
  If you prefer to just become a private member at the moment, at any time when it suits
  you, step 2 and 3 can be completed at your own "My page".</p>
  <hr>
  
  
  <b>The next step after member registration is company registration. You have the option to cancel that
  step if you want to register a company later or only want to register as a member.</b>
  </div>
  
  
  <p>
  <span class="rouge">* = Required fields 		
  </span>
  </p>
<label><?php _e('Countries') ?><span class="rouge"> *</span></label>
  <?php
  list_country();
  ?>
  <div id='region'>
   <label><?php _e('Regions') ?><br /></label>
  <select id="region1" name="region1">
  </select>
  
  </div>
  <div>
  <p>
					 <label><?php _e('Username')  ?><span class="rouge"> *</span><br /></label>
					  <input type="text" name="user_login" id="user_login" value="<?php if(isset($_POST['user_login'])) echo $_POST['user_login'];?>" class="requiredField" />
					  
	  </p>		
  </div>
  
  <div>
					 <label><?php _e('Password') ?><span class="rouge"> * (Password must include at least 8 caracters [one CAPS, one letter,one number, one symbol!)</span><br /></label>
					  <input type="password" name="password" id="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'];?>" class="requiredField" />
					 
	  </p>
  
  </div>
  
  <div>
					<label><?php _e('Password Confirm') ?><span class="rouge"> *</span><br /></label>
					  <input type="password" name="password_confirm" id="password_confirm" value="<?php if(isset($_POST['password_confirm'])) echo $_POST['password_confirm'];?>" class="requiredField" />
					 
	  </p>
  </div>
  
  <div>
  <label><?php _e('Gender') ?> <span class="rouge"> *</span><br /></label>
  <label> Mr. <input type="radio" value="M" name="gender" />  </label>
  <label> Ms. <input type="radio" value="F" name="gender" />  </label>
  
  </div>
  
  <div>
  <p>
					 <label><?php _e('First name') ?><span class="rouge"> *</span><br /></label>
					  <input type="text" name="firstname" id="firstname" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname'];?>" class="requiredField" />
					 
	  </p>		
  </div>
  
  <div>
  <p>
					 <label><?php _e('Last name') ?><span class="rouge"> *</span><br /></label>
					  <input type="text" name="lastname" id="lastname" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname'];?>" class="requiredField" />
					  
	  </p>	
  
  </div>
  
  <div>
  <p>
   <label><?php _e('E-mail') ?> <span class="rouge"> *</span><br /></label>
					  <input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" />
					
  </p>
  <p>
   <label><?php _e('E-mail Confirm') ?><span class="rouge"> *</span><br /></label>
					  <input type="text" name="email_confirm" id="email_confirm" value="<?php if(isset($_POST['email_confirm']))  echo $_POST['email_confirm'];?>" class="requiredField email" />
					 
  </p>
  
  </div>
  
  
  
  
  <hr>
  <div align="left" style="text-align:left; padding-left:5px;">
  <input type="checkbox"  name="acceptit" id="acceptit" value="true"<?php if(isset($_POST['acceptit']) && $_POST['acceptit'] == true) echo ' checked="checked"'; ?> />
  <label for="acceptit" style="text-align:left;">
  I agree to the following. 
  </label> <span class="rouge"> *</span>
  </div>
  - I accept the <a class="bluelink" rel="gb_pageset[nice_pages]" title="CW Terms and Conditions " href="<?php bloginfo('url'); ?>/cw-terms?popup=true"> CW Connecting Worlds Terms and Conditions</a>
  

  and <a class="bluelink" rel="gb_pageset[nice_pages]" title="CW Privacy Policy" href="<?php bloginfo('url'); ?>/cw-privacy-policy?popup=true">CW Privacy Policy</a>  <br>
  - I accept to receive occasional emails relevant to CW membership and services<br><br>
  
  <hr>
  
  <p>If this step succeeds you will automatically be logged in</p>
  
  <input	type="submit" name="submitted" id="submitted" value="Go to Step2">
  <input	type="submit" name="skip" id="skip" value="Register Step2 and 3 later">
  </form>                    
                      
                      
                      
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>
			</div>
			</div>
    		<?php endwhile; endif; ?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		</div>
	</div>


<?php include (TEMPLATEPATH . "/sidebar2.php"); ?>
</div>
<?php get_footer(); ?>