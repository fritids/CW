 <?php
  /*
  Template Name: send message
  */
 get_header(); ?>
<?php 
if(isset($_POST['submit']) ) {
 $Errorfields='';
 //Check to make sure that the name field is not empty
  if(trim($_POST['subject']) === '') {
	  $Errorfields .= '<li>You forgot to enter your subject.</li>';
	  $hasError = true;
  } else {
	  $subject = trim($_POST['subject']);
  }
  //Check to make sure that the name field is not empty
  if(trim($_POST['message']) === '') {
	  $Errorfields .= '<li>You forgot to enter your message.</li>';
	  $hasError = true;
  } else {
	  $msg = trim($_POST['message']);
  }
}
?>

<div class="span-24" id="contentwrap">
	<div class="span-13"> 
		<div id="content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" id="post-<?php the_ID(); ?>">
			<!-- <h2 class="title"><?php //the_title(); ?></h2> -->
				<div class="entry">  
				<?php if($Errorfields != '') { ?>
						  <ul class="error"><? echo $Errorfields;?></ul> 
					  <?php } ?>
				<?php 
								if ( !$user_ID ) {
										echo '<div style="float:left;"><br/><br/>The page you requested requires you must be a member
								 <br/> Go here to <a href="'.get_option('siteurl').'/register-step1"><span style="color: #0000ff;">register as a member </span></a> 
								<br/>If you already are a member, please
 <a href="/wp-login.php?redirect_to='.$_SERVER["REQUEST_URI"].'" class="simplemodal-login">
<font color="#335D8D"><b> Login here</b> </font></a>
</div>';

											echo '<div style="float:left; padding-left: 10px;">
								<!--<img src="wp-content/themes/connectingworld1/images/ads/MemberCW120x90.gif" align="registration" />-->

								<a target="_blank" href="'.get_option('siteurl').'/register-step1">

								<img height="80" border="0" align="left" width="80" alt="" src="'.get_option('siteurl').'/wp-content/uploads/icon_free_basic.png" style="margin-top:35px;" >
								<a/>
								</div>
								';
										} else {
										if((isset($_GET["view"])) || (isset($_GET["type"])) ) {
							?>

								<div style="margin-bottom:10px">
								<?php if(($_GET['view']=='saved') || ($_GET['type']=='saved') ){ ?>

									<a href="<?php $monUrl ?>/messages" class="bluelink">Inbox</a> &nbsp; | &nbsp; 
									<a href="<?php $monUrl ?>/messages?view=sent" class="bluelink" >Sent messages</a>  &nbsp; | &nbsp; 
									<b>Saved messages</b>

								<?php }else if(($_GET['view']=='sent') || ($_GET['type']=='sent') ){ ?>

									<a href="<?php $monUrl ?>/messages" class="bluelink">Inbox</a> &nbsp; | &nbsp; 
									<b>Sent messages</b>  &nbsp; | &nbsp; 
									<a href="<?php $monUrl ?>/messages?view=saved" class="bluelink">Saved messages</a> 

								<?php }else{ ?>

									<b>Inbox </b> &nbsp; | &nbsp; 
									<a href="<?php $monUrl ?>/messages?view=sent" class="bluelink">Sent messages</a>  &nbsp; | &nbsp; 
									<a href="<?php $monUrl ?>/messages?view=saved" class="bluelink" >Saved messages</a> 

								<?php } ?>

								</div>
								<hr />
								<?php } ?>
					<?php 
					if( $_GET['sent'] && $Errorfields == '' ){
					
					insert_message($_POST['subject'],$_POST['message'],$user_ID,$_GET['id'],date("Y-m-d H:i:s"),0) ;

					?>	

						<p class=infobox style="width:50%">
						Your message has been sent
                       <?php  $url2= bloginfo('url').'/my-page-2';
		
echo '<meta http-equiv="refresh" content="3; url='.$url2.'"/>';
	?></p>

					<?php 
					}else{
					if(!isset($_GET['type']))
					{
					?>	

					<?php $user_profile = get_user_profile($_GET["id"]); ?>
					<p class=infobox style="width:50%">
						Your message will be sent to: 
						<?php print $user_profile->gender == 'M' ? "Mr." : "Ms." ?> 
						<?php print $user_profile->firstname ?> <?php print $user_profile->lastname ?>
						<br>
						<?php echo '<a href="'.get_option('siteurl').'/my-page-2?action=viewprofileuser&id='.$_GET["id"].'" class="bluelink">View user profile &raquo;</a>' ; ?>
					</p>
					<?php } ?>
					
					<FORM method="post" name="send_msg" id="send_msg" action="<?php echo get_option('siteurl').''.$_SERVER['REQUEST_URI'] ?>&sent=true">
	
						<h2><?php if(!isset($_GET['type'])) { echo "Send message"; } else { echo "Reply to message";  } ?> </h2>
						<div>
							<span class="required">*</span> = Required fields 
							<br />
							<br />
						</div>
						<?php if(isset($_GET["type"])) { //requette select message 						
						$id_msg = $_GET["id_msg"] ;
						if($_GET["type"] == "replay") { $message_row = get_message_byid($id_msg); }
						if($_GET["type"] == "saved") { $message_row = get_message_saved_byid($id_msg); }
						
						}
						?>
						<div>
							<label>Subject <span class="required">*</span></label> 
							<input type="text" name="subject" size="20" maxlength="50"  value="<?php if(isset($_GET["type"])) { echo "Re: ".$message_row->subject ;   } else { echo $_POST['subject'] ; } ?>">
						</div>
						
						<div>
						<label class="lb_message">Message <span class="required">*</span> </label>

						<textarea name="message"  style="width:90%;height:200px;overflow:auto" rows="20" cols="50"><?php if(isset($_GET["type"])) { echo"\n\n---------------\n\n".$message_row->message ;   } else { echo $_POST['message'] ; } ?></textarea> 

						</div>
							   

						<INPUT	type="submit" value="Send message" name="submit" />
	
				  </form>
				
					<?php } 
				}
					?>
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