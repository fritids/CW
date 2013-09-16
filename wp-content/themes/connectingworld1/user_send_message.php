 <?php
  /*
  Template Name: user_send_message
  */
 get_header(); ?>

<div class="span-24" id="contentwrap">
	<div class="span-13"> 
		<div id="content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" id="post-<?php the_ID(); ?>">
			<h2 class="title"><?php the_title(); ?></h2>
				<div class="entry">
                <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                   
                                   
 <?php
   
    if($user_ID){           
   
$destinataire= get_user_profile($_GET['user_id'])->email;

$Envoi="\n".' 
<input name="envoi" tabindex="4" value="Send" type="submit"></p>';
if (isset($_POST['message']))
  {
    // La variable $verif va nous permettre d'analyser si la sémantique de l'email est bonne
    $verif='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#';
    //quelques remplacements pour les specialchars
    $message=preg_replace('#(<|>)#', '-', $_POST['message']);
    $message=str_replace('"', "'",$message);
    $message=str_replace('&', 'et',$message);
    $objet=preg_replace('#(<|>)#', '-', $_POST['objet']);
    $objet=str_replace('"', "'",$objet);
    $objet=str_replace('&', 'et',$objet);
    // On assigne et/ou protège nos variables
    $votremail=stripslashes(htmlentities($_POST['votremail']));
    $message=stripslashes(htmlspecialchars($message));
    $objet=stripslashes(htmlspecialchars($objet));
    //input envoi/previsualiser
    $envoi=htmlentities($_POST['envoi']);
    $previsualiser=htmlentities($_POST['previsualiser']);
    //on enlève les espaces
    $votremail=trim($votremail);
    $message=trim($message);
    $objet=trim($objet);

    

    /*On vérifie si l'e mail et le message sont pleins, et on agit en fonction.
      (on affiche Apercu du resultat, tel ou tel champ est vide, etc...*/
    //Si ca ne vas pas (mal rempli, mail non valide...)
    if((empty($message))or(empty($objet))or(!preg_match($verif,$votremail)))
      {
        //les 3 champs sont vides
        if(empty($votremail)and(empty($message))and(empty($objet)))
          {
            echo '<p>All fields are empty.</p>';
            $message='';$votremail='';$objet='';$apercu_resultat='';
          }
        //un des champs est vide
        else
          {
            if(!preg_match($verif,$votremail))
              echo'<p>Your e-mail is invalid.</p>';
            else
            {
              echo'<p>Must fill in all fields!</p>';
              if(empty($message))
                $apercu_resultat='';
            }
          }
      }
    //Si les deux sont pleins et que l'adresse est valide, on envoie on on prévisualise sans envoi
    else
      {
        $domaine=preg_replace('#[^@]+@(.+)#','$1',$votremail);
        $DomaineMailExiste=checkdnsrr($domaine,'MX');
        if(!$DomaineMailExiste)
          echo'<p>The domain of the email address you gave does not exist.</p>';
        elseif(!empty($previsualiser))
            {
              $apercu_resultat='<p>Your message is valid and ready to be sent.<br/>
               You just have to click the "Send" button..<br>Preview :</p>';
              $Previsualiser='';
            }
        elseif(!empty($envoi))
            {
              $objet='[CW] : '.$objet;
			  
              $headers='From:'.$votremail."\r\n".'To:'.$destinataire."\r\n".'Subject:'.$objet."\r\n".'Content-type:text/plain;charset=is-8859-1'."\r\n".'Sent:'.date('l, F d, Y H:i');
              if(mail($destinataire,$objet,$message,$headers))
              {
                echo '<p>Your message has been send.<p><p>You can write a new message or return to the <a href="marketplace" style="color:blue; text-decoration:underline;">Market Place</a></p>';                
              }
              else
                echo'<p>A problem occurred while sending email.</p>';
            }
        else
          echo'<p>Innatendu condition occurred while executing the script.</p>';
      }
echo $apercu_resultat;

  }
else
  {
  echo '<p>You can use this form to contact <b>'.get_user_profile($_GET['user_id'])->user_name.'</p>';
  $votremail='';$message='';
  }
$bas_formulaire=$Previsualiser.$Envoi;
?>
<form id='contact' method="post"  enctype="multipart/form-data">
    <p id='obj'><label for='objet'>Subject of your message <e style="color: red;">*</e><br>
  <input type='text' name='objet' id='objet' tabindex='10' size='30'></label></p> 

  <p id="adr"><label for="mail">Your E-mail <e style="color: red;">*</e><br>
  <input name="votremail" tabindex="20" size="30" type="text" id="mail" ></label></p>
  
  <p id="msg"><label for="message">Your message <e style="color: red;">*</e><br>
  <textarea tabindex="30" rows="20" cols="120" name="message" id="message"></textarea>
  </label></p>
<?php echo $bas_formulaire;?>
</form>
       <?php }
      else{ echo '
			<div style="float:left;">You must be logged to post an Ad Or <a href="'.get_option('siteurl').'/register-step1"><span style="color: #0000ff;">register as a member </span></a> and to log in.</div>';
			echo '<div style="float:left; padding-left: 10px;">
<img src="wp-content/themes/connectingworld1/images/ads/MemberCW120x90.gif" align="registration" /></div>
';} ?>                                  
            </div>
			</div>
            </div>
			<?php endwhile; endif; ?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		</div>
	</div>

<?php get_sidebars(); ?>

</div>
<?php get_footer(); ?>