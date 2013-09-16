 <?php
  /*
  Template Name: add-business
  */
  get_header(); 
  ?>
    <?php 
  //If the form is submitted
  if(isset($_POST['submitted']) ) 
  {
	  $Errorfields='';

          if (trim($_POST['categoryclass']) === '')
	  {
	   $Errorfields .= '<li>You forgot to add a category</li>';
	   $hasError = true;
	 }
 else {
     $addcategory = trim($_POST['categoryclass']);
         //Check to make sure that the add title field is not empty
   if (trim($_POST['addtitle']) === '')
	  {
	   $Errorfields .= '<li>You forgot to add a title.</li>';
	   $hasError = true;
	 }
else {
	 	 $addatitle = trim($_POST['addtitle']);
		  	
		  
		  //Check to make sure that the description field is not empty
		  if(trim($_POST['description']) === '') {
			  $Errorfields .= '<li>You forgot to enter your description .</li>';
			  $hasError = true;
		  } else {
			  $descrip = trim($_POST['description']);
		  }
		  
		   
		  
	  }
 }

/*
 * 
 * 
 * 
 * 
 * 
 */
 
 if (isset($_FILES['file']) && !empty ($_FILES['file']))
{ 
     $uploaddir = ABSPATH."wp-content/themes/connectingworld1/pictures_classified/";
    //$uploadfile = $uploaddir . basename( $_FILES['uploadedfile']['name']);
    $fichier = basename($_FILES['file']['name']);
    $taille_maxi = 100000;
    $taille = filesize($_FILES['file']['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['file']['name'], '.'); 
     if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
             $erreur = 'Only File Type png, gif, jpg, jpeg, are allowed!';
        }
        if($taille>$taille_maxi)
        {
             
              $Errorfields .= '<li>Maximum File size allowed = 100 kb!</li>';
            $hasError = true; 
        }
        if(!$hasError) //S'il n'y a pas d'erreur, on upload
        {
                 //On formate le nom du fichier ici...
             $fichier = strtr($fichier, 
                  'À�?ÂÃÄÅÇÈÉÊËÌ�?Î�?ÒÓÔÕÖÙÚÛÜ�?àáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
             $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            
             $filename = strtolower($fichier) ;
             $exts = split("[/\\.]", $filename) ;
              $n = count($exts)-1; 
              $ext = $exts[$n];

             $ran = rand () ; 
              $ran2 = $ran."."; 
             $fichier = $ran2.$ext;

		
       if(move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir . $fichier))
        {

           $addPicture=$fichier;
         /*update_profile ($fichier, $user_id);
          echo "<span class='rouge'>The file has been uploaded successfully</span>";

          //update_profile ($picture, $id);*/
        }
        else
        {
  /*        $Errorfields .= '<li>There was an error uploading the file</li>';
            $hasError = true; 
    */      
        }
     
        }
 }
 else {
   // $Errorfields .= '<li>You forgot to select picture</li>';
   // $hasError = true; 
 }
 

//If there is no error, send the email
		  if(!isset($hasError)) 
		  {
			global $wpdb;
				$user_info = get_userdata($user_ID);
	 $user_id= $user_info->ID;
                        $date=date('y-m-d');        
                     /*   $current_user = wp_get_current_user();
                        $current_user_ID=$current_user->ID;*/
			  $data = array('classified_catid'=>$_POST['categoryclass'],
                                        'img_name'=>$addPicture,	
                                        'message'=>$_POST['description'],
                                        'poster_user_id'=>$user_id,
                                        'posted_date'=>$date,
                                        'expire_date'=>$_POST['date_ad'],
                                        'country_id'=>$_POST['country'],
                                        'region_id'=>$_POST['region1'],
                                        'city_name'=>$_POST['city'],
                                       	'header'=>$addatitle,
                                        'type'=>$_POST['type']
                                              ) ;
               
  		$wpdb->insert($wpdb->classified,$data);
  		//$url= bloginfo('url').'/add-business';
		  }
	  
  }?>
  
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/registration.css" type="text/css" media="screen, projection" />
    
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/contact-form.js"></script>
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
		  //d�finition de l'endroit d'affichage:
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
  
<div class="span-24" id="contentwrap">
	<div class="span-13"  style="width:790px; background-color:#FFF;"> 
		<div id="content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" style="margin-top:2px;">
				<div class="entry">
                    <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>




  <?php if($Errorfields != '') { ?>
						  <ul class="error"><? echo $Errorfields;?></ul> 
					  <?php } ?>
                       
<br /><br />
          <?php if ($user_ID)    {   
		  //echo $user_ID;   ?>
  <form name="formad" method="POST" id="formad_business" enctype="multipart/form-data" >
  <span style="color:#1250A1;font-weight:bold; margin-top:50px;">Add business ad </span>
  
  <div>
  
  <p>It is important that you put your ad in the category you think is approriate och yields the best result. Please be aware that all ads shall be related to business and entrepreneurship.</P>
  </div>
  
  
  <p>
  <span class="rouge">*</span> = Required fields 		
  
  </p>

      <p>
   <label><?php _e('Category') ?><span class="rouge"> *</span><br /></label>
    <?php
  list_classified_category();
  ?>
  </p>
   <div>
      <p>
      
  <label><?php _e('Type') ?> <span class="rouge"> *</span><br /></label>
Offered  <input type="radio" name="type" value="o" class="txtrad"> 
 Wanted  <input type="radio" name="type" value="w" class="txtrad" checked>
 Other <input type="radio" name="type" value="x" class="txtrad"> 
    	</p>		
    </div>     
  
    <div>
      <p>
  <label><?php _e('Ad title') ?><span class="rouge"> *</span><br /></label>
                          <input type="text" name="addtitle" id="addtitle" value="<?php if(isset($_POST['addtitle'])) echo $_POST['addtitle'];?>" class="requiredField" />
                         
          </p>		
  </div>
  
  <div>
      <p>
  <label><?php _e('Description') ?><span class="rouge"> *</span><br /></label>                       
 <TEXTAREA rows="3" name="description" id="description"></TEXTAREA>
    </p>		
  </div>
  
  <hr />
  <p>Not required fields:</p>
 
  <div>
      <p>
  <label><?php _e('Picture') ?> (Your loaded Picture will be resized to (100x100pixels))<br /></label>
 <input type="file" name="file" id="file" value="<?php if(isset($_POST['file'])) echo $_POST['file'];?>" />                         
    </p>		
  </div>
   
   
   <div>
      <p>
  <label><?php _e('Expired Date (After 30 Days)') ?></label><br />
                          <input type="text" name="date_ad" id="date_ad" disabled="disabled" value="<?php echo date("Y-m-d",strtotime("+30 day"));?>" />
                         
          </p>		
  </div>
  
  <p>If your ad is valid for one (1) country only, please select country and region(optional):</p>
  
  <div>
      <p>
   <label><?php _e('Country') ?><br /></label>
    <?php
  list_country();
  ?>
  <div id='region'>
   <label><?php _e('Regions') ?><br /></label>
  <select id="region1" name="region1">
  </select>  
  </div>
   </p>		
  </div>
  
  <div>
      <p>
  <label><?php _e('City') ?><br /></label>
        <input type="text" name="city" id="city" value="<?php if(isset($_POST['city'])) echo $_POST['city'];?>" />
                         
          </p>		
  </div>
 
  
  <input	type="submit" name="submitted" value="Save">

  </form>                    
                      
                      <?php } else { echo '
			<div style="float:left;"><br/><br/>The page you requested requires you must be a member
<br/> Go here to <a href="' . get_option('siteurl') . '/register-step1"><span style="color: #0000ff;">register as a member </span></a> 
<br/>If you already are a member, please
 <a href="/wp-login.php?redirect_to='.$_SERVER["REQUEST_URI"].'" class="simplemodal-login">
<font color="#335D8D"><b> Login here</b> </font></a>
</div>';


			echo '<div style="float:left; padding-left: 10px;">


<!--<img src="wp-content/themes/connectingworld1/images/ads/MemberCW120x90.gif" align="registration" />-->

<a target="_blank" href="' . get_option('siteurl') . '/register-step1">

<img height="80" border="0" align="left" width="80" alt="" src="' . get_option('siteurl') . '/wp-content/uploads/icon_free_basic.png" style="margin-top:35px;" >
<a/>



</div>
';} ?>
                      
                      
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