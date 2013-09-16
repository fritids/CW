 <?php    
 $monUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  ?>
 <p class=infobox> 
		<b>Messages</b><br>
		You have: <b><?php print (get_reciever_uid_new_count($user_id)); ?> new</b>
        <a href="<?php $monUrl ?>/messages" title="as seen by others">Message(s)</a>
</p>
<p class=infobox> 
		<b>Visitors *</b><br>
		<?php $visitors = get_visitors($user_id);
		if ($visitors > 0)
		{
		 foreach ($visitors as $visitor) {
   echo '1';
  }
		}else
		{
			echo "No visitors yet on your company profile";
			}
		
		 ?>
         * = Members that has visited your company profile
</b>
        <a href="<?php $monUrl ?>/messages" title="as seen by others">Message(s)</a>
</p>
 <p class=infobox> 
		<b>CW Mypage</b><br>
		This is your own section on CW. Here you will find information related to your account
		and you can create or change your account settings and company profile from here.<br><br>
		Your CW username: <b><?php print $user_profile->user_login; ?></b> <br><br>
        <a href="<?php $monUrl ?>/my-page-2?action=viewprofile" class="bluelink" title="as seen by others">View my user profile &raquo;</a> |  <a href="<?php $monUrl ?>/my-page-2?action=editprofile" title="edit profile" class="bluelink">Edit my user profile » </a>
		</p>
        
  <p class=infobox> 
		<b>Company Profile</b><br><br>
        <?php
		$company_row=get_company_byuserid($user_info->ID);
		 if (!empty ($company_row)){?>
        
        <a href="<?php $monUrl ?>/my-page-2?action=viewcompanyprofile" title="as seen by others" class="bluelink">View my company profile &raquo;</a> |  <a href="<?php $monUrl ?>/my-page-2?action=editcompanyprofile" title="edit profile" class="bluelink">Edit my Company profile » </a>
<?php } else { echo 'You must register your Company First!<br />'?><a href="<?php $monUrl ?>/register-step2" title="as seen by others" class="bluelink">Register Your Company</a><?php }?>
</p>
