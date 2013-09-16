<?php
/*
  Template Name: Messaging center
 */
get_header();

//delete message
function delete_checked(){	
		$array = $_POST['mails'];		
		foreach ($array as $key => $mail_id){
			if($_GET['view'] == 'saved')
			{
				delete_message_saved($mail_id);
			}
			else
			{
				delete_message($mail_id);
			}
		
		}
}

//saved message
function save_checked(){	
		$array = $_POST['mails'];		
		foreach ($array as $key => $mail_id)
		{
		
			$list_messages = list_messages_by_id($mail_id);
		
			foreach ($list_messages AS $listmessage) {	
			
			save_message($listmessage->message_id,$listmessage->subject,$listmessage->message,$listmessage->sender_user_id,$listmessage->reciever_user_id,$listmessage->sent,$listmessage->reciever_read);								
			
			}
		
		}
}


if( $_POST['submit_save'] &&  $_POST['mails']){
	save_checked();		
}

if( $_POST['submit'] &&  $_POST['mails']){

	delete_checked();		

}




?>

<div class="span-24" id="contentwrap" style="background-color:#FFF;">		
	<div class="span-13"   style="width:790px; background-color:#FFF; min-height:600px;"> 
	
		 <ul id="menu_profile">
		<li><a href="<?php $monUrl ?>/my-page-2" title="My Page">My Page</a></li>
		<li><a href="<?php $monUrl ?>/my-page-2?action=viewprofile" title="as seen by others">Personal Profile</a>
		</li>
		<li><a href="<?php $monUrl ?>/my-page-2?action=myfavorite" title="edit">My Favorite</a></li>
		<li><a href="<?php $monUrl ?>/my-page-2?action=viewcompanyprofile" title="edit">Company Profile</a></li>
		  <li><a href="<?php $monUrl ?>/messages" title="edit">Message Center</a></li>
	</ul><br /><br />
	
        <div id="content">	

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="postwrap">
                        <div class="post" id="post-<?php the_ID(); ?>">
						<?php if ( $user_ID ) { ?>
							<h2>Message center</h2>
							<?php } ?>
							<div class="entry">
                                <?php
                                if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
                                    the_post_thumbnail(array(300, 225), array('class' => 'alignleft post_thumbnail'));
                                }
                                ?>
                                <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

								<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

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
								
							<?php if(!isset($_GET['id_msg'])) { ?>
							<form action="#" name="form_message" method="POST">

								<table>
									<tr>
										<th>Subject</th>
										<th><?php print $_GET['view']=='sent' ?  "To" : "From" ?></th>
										<th>Sent</th>
									</tr>
									<?php 
									if(!isset($_GET['view']))
									{										
										$list_messages = list_messages_by_user($user_ID);	
									}
									else
									{
										if($_GET['view'] == 'sent')
										{
											$list_messages = list_messages_sent_by_user($user_ID);	 
										}
										else
										{
											$list_messages = list_messages_saved_by_user($user_ID);	
										}
									}
									
									 $i=0;
									 foreach ($list_messages AS $listmessage) {		
										
										if ($i%2==0)
                                          $st=" style= 'background-color: #F1F7F8;'";
                                        else 
                                            $st='';
                                        $i++;									 
									?>
									<tr>
										<td>
											<?php
												if($_GET['view']=='saved' || !$_GET['view']){ 
											?>
												<input type="checkbox"			
												name="mails[]"
												value="<?php print $listmessage->message_id ?>">
											<?php
												}
											?>
											<?php
											if(!isset($_GET['view']))
											{
												echo '<a href="'.$monUrl.'/messages?id_msg='.$listmessage->message_id.'&id_user='.$listmessage->sender_user_id.'" class="bluelink">'.$listmessage->subject.'</a>'; 
											}
											else
											{
												if($_GET['view'] == 'sent')
												{
													echo '<a href="'.$monUrl.'/messages?id_msg='.$listmessage->message_id.'&id_user='.$listmessage->reciever_user_id.'&type=sent" class="bluelink">'.$listmessage->subject.'</a>'; 
												}
												else
												{
													echo '<a href="'.$monUrl.'/messages?id_msg='.$listmessage->message_id.'&id_user='.$listmessage->sender_user_id.'&type=saved" class="bluelink">'.$listmessage->subject.'</a>'; 
												}
												
											}
											?>
										</td>
										<td>
										<?php
										if($_GET['view'] == 'sent')	
										{										
											$user_profile = get_user_profile($listmessage->reciever_user_id);
											echo '<a href="'.get_option('siteurl').'/my-page-2?action=viewprofileuser&id='.$listmessage->reciever_user_id.'" class="bluelink">'.$user_profile->user_login.'</a>';
										}
										else
										{
											$user_profile = get_user_profile($listmessage->sender_user_id);
											echo '<a href="'.get_option('siteurl').'/my-page-2?action=viewprofileuser&id='.$listmessage->sender_user_id.'" class="bluelink">'.$user_profile->user_login.'</a>';
										}
										?>
										</td>
										<td><?php echo $listmessage->sent;?></td>
									</tr>
									<?php } ?>
								</table>




							<?php
								if($i == 0 ){
									print "<i>You have no messages</i>";
								}else{
									print "<i>You have a total of " .$i. " messages in this mailbox</i><br><br>";
								}
							?>
							
							<?php
								if( $i> 0 && $_GET['view'] != 'sent'){ 
							?>

								<br /> With checked messages:
								

								<input type="submit" name="submit" onclick="if(confirm('Are you sure?')){ return true }else{ return false }" value="Delete">

								
								<?php
									if(!$_GET['view']){ 
								?>
									<input type="submit" name="submit_save" value="Save">
								<?php
									}
								?>

							<?php } ?>

							</form>

							<?php }
							else { 
							//read message
							if(!isset($_GET['type']))
							{	
								$list_messages = list_messages_by_id($_GET["id_msg"]);
							}
							else
							{
								if($_GET['type'] == 'sent')
								{
									$list_messages = list_messages_sent_by_id($_GET["id_msg"]);
								}
								else
								{
									$list_messages = list_messages_saved_by_id($_GET["id_msg"]);
								}
							}
							
							foreach ($list_messages AS $listmessage) {		
							
							?>
							<p class=infobox style="width:50%">
								<?php $user_profile = get_user_profile($_GET["id_user"]); ?>
								This message is from: 
								<?php print $user_profile->gender == 'M' ? "Mr." : "Ms." ?> 
								<?php print $user_profile->firstname ?> <?php print $user_profile->lastname ?>
								<br>
								Sent: <?php echo $listmessage->sent;?> 
								<br>
								<?php echo '<a href="'.get_option('siteurl').'/my-page-2?action=viewprofileuser&id='.$_GET["id_user"].'" class="bluelink">View user profile &raquo;</a>' ; ?>
							</p>
							
							<div>
								<h2>Subject: </h2><?php echo $listmessage->subject; ?>
								<h2>Message:</h2>
								<p>
									<?php echo htmlspecialchars($listmessage->message); ?>
								</p>
							</div>
							
							<?php 
								if(($_GET['type'] != 'sent') || (!isset($_GET['type'])) )
								{	
									if($_GET['type'] == "saved")
									{
										echo '<a href="'.get_option('siteurl').'/send-message?id='.$listmessage->sender_user_id.'&id_msg='.$_GET["id_msg"].'&type=saved" title="" class="bluelink">Reply to this message</a>' ;
									}
									else
									{
										echo '<a href="'.get_option('siteurl').'/send-message?id='.$listmessage->sender_user_id.'&id_msg='.$_GET["id_msg"].'&type=replay" title="" class="bluelink">Reply to this message</a>' ;
										
										//message reading
										update_message_read($_GET["id_msg"]);
									}
									
								}
							

							  }
								
							}
						} ?>

							</div>
                        </div>
                    </div>
                <?php endwhile;
            endif; ?>
			
			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
			
        </div>
    </div>


<?php include (TEMPLATEPATH . "/sidebar2.php"); ?>

</div>
<?php get_footer(); ?>