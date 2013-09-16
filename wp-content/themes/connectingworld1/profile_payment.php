 <?php
 ob_start();
  /*
  Template Name: Profile_Payment
  */
  get_header(); 
  ?>
   <?php 
  //If the form is submitted
  if(isset($_POST['submitted'])) {
	  $Errorfields='';
	  //Check to see if the honeypot captcha field was filled in
	   if(!isset($_POST['acceptit'])) {
		  $Errorfields .= '<li>You must check the declaration.</li>';
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
		  
		
		    if  (trim($_POST['phone']) ==='' ) 
		      {
		   $Errorfields .= '<li>You forgot to enter your phone.</li>';
		   $hasError = true;
	     }
	  			else {
			  $name = trim($_POST['phone']);
		  		}
				
			  if  (trim($_POST['adress']) ==='' ) 
		      {
		   $Errorfields .= '<li>You forgot to enter your Address.</li>';
		   $hasError = true;
	     }
	  			else {
			  $name = trim($_POST['adress']);
		  		}
				
		  if  (trim($_POST['zip']) ==='' ) 
		      {
		   $Errorfields .= '<li>You forgot to enter your Zip Code.</li>';
		   $hasError = true;
	     }
	  			else {
			  $name = trim($_POST['zip']);
		  		}
		  
		  
		  //Check to make sure sure that a valid email address is submitted
		  if(trim($_POST['email']) === '')  {
			  $Errorfields .= '<li>You forgot to enter your email address.</li>';
			  $hasError = true;
		  } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			  $Errorfields .= '<li>You entered an invalid email address.</li>';
			  $hasError = true;
		  } else {
			$email = trim($_POST['email']);
			  }
			
	  }
       if($hasError==false) {
           edit_profile_pay($_POST);
            $urlredirect= bloginfo('url').'payment?adr='.$_POST['adress'].'&zip='.$_POST['zip'];
   wp_redirect($urlredirect);
   exit();
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
<h2 class="title">Complete the information below</h2>

                    <?php
	if ( !$user_ID ) {
		echo '
			<div style="float:left;">The page you requested requires you to <a href="'.get_option('siteurl').'/register-step1"><span style="color: #0000ff;">register as a member </span></a> and to log in.</div>';
			echo '<div style="float:left; padding-left: 10px;">
<img src="wp-content/themes/connectingworld1/images/ads/MemberCW120x90.gif" align="registration" /></div>
';
		} else {
			$user_info = get_userdata($user_ID);
	
	 $user_id= $user_info->ID;//$_REQUEST['user_id'];
  $user_profile = get_user_profile($user_id);
  
  ?>
<?php if($Errorfields != '') { ?>
						  <ul class="error"><? echo $Errorfields;?></ul> 
					  <?php } ?>
  <form name"step1" method="POST" id="register1form">

   <input type="hidden" name="keyid" id="keyid" value="<?php echo $user_id?>" />
   <span style="color:#1250A1;font-weight:bold; margin-top:50px;">Verify your informations</span>

  
  
  <p>
  <span class="rouge">* = Required fields 		
  </span>
  <?php // echo  $user_id ;?>
 </p>
 <label><?php _e('Country') ?><span class="rouge">*</span><br /></label>
  <?php
  list_country();
  ?>
  <div id='region'>
   <label><?php _e('Regions') ?><span class="rouge">*</span><br /></label>
  <select id="region1" name="region1">
  </select>
  
  </div>
 <p>
 
<label><?php _e('E-mail ') ?><span class="rouge">*</span><br /></label>
					  <input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  {echo $_POST['email'];} else {echo $user_profile->user_email;}?>" class="requiredField email" />			
  </p>
  <p>
					 <label><?php _e('Phone') ?><span class="rouge">*</span><br /></label>
					  <input type="text" name="phone" id="phone" value="<?php if(isset($_POST['phone'])) {echo $_POST['phone'];} else {echo $user_profile->phone;}?>" class="requiredField" />
					 
    </p>
    <p>
     <label><?php _e('Personal Address') ?><span class="rouge">*</span><br /></label>
                     <textarea name="adress" id="adress"><?php if(isset($_POST['adress'])) {echo $_POST['adress'];} else {echo $user_profile->adress;}?></textarea>	
  </p>
  <p>
					 <label><?php _e('Zip code') ?><span class="rouge">*</span><br /></label>
			    <input type="text" name="zip" id="zip" value="<?php if(isset($_POST['zip'])) {echo $_POST['zip'];} else {echo $user_profile->zip_code;}?>" class="requiredField" />
					 
    </p>
  

  

  
  <hr>
  
 <div align="left" style="text-align:left; padding-left:5px;">
  <input type="checkbox"  name="acceptit" id="acceptit" value="true"<?php if(isset($_POST['acceptit']) && $_POST['acceptit'] == true) echo ' checked="checked"'; ?> />
  <label for="acceptit" style="text-align:left;">
 I declare that the informations above are correct.
  </label> <span class="rouge"> *</span>
  </div>
 
  <input	type="submit" name="submitted" value="Go To Pay">
  </form>                    
                      
        <?php } ?>             
                      
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
<?php get_footer(); ob_end_flush(); ?>