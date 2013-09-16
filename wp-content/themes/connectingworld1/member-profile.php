<?php
  /*
  Template Name: member-profile
  */
 get_header(); ?>


<div class="span-24" id="contentwrap" style="background-color:#FFF;">		
	<div class="span-13"   style="width:790px; background-color:#FFF;"> 
		 <ul id="menu_profile">
	<li><a href="<?php $monUrl ?>/my-page-2" title="My Page">My Page</a></li>
	<li><a href="<?php $monUrl ?>/my-page-2?action=viewprofile" title="as seen by others">Personal Profile</a>
    </li>
	<li><a href="<?php $monUrl ?>/my-page-2?action=myfavorite" title="edit">My Favorite</a></li>
    <li><a href="<?php $monUrl ?>/my-page-2?action=viewcompanyprofile" title="edit">Company Profile</a></li>
      <li><a href="<?php $monUrl ?>/messages" title="edit">Message Center</a></li>
</ul><br /><br />
    	<div id="content" style="background-color:#FFF;">	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap" style="background-color:#FFF;">
			<div class="post" id="post-<?php the_ID(); ?>">

				<div class="entry">
                <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>          
    <?php
	if ( !$user_ID ) {
		echo '<div style="float:left;"><br/><br/>The page you requested requires you must be a member
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
';
		} else {
		//echo $user_ID ;
			$user_info = get_userdata($user_ID);
	
	 $user_id= $user_info->ID;//$_REQUEST['user_id'];
  $user_profile = get_user_profile($user_id);?>
  <?php if($user_profile->premium != 1) { ?>
  <div style="float:right;"> You are registred as a basic member! <a href="/premium-member"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/up_premium.png" alt="premium" border="0" /></a></div>
<?php }else { ?>
	<div style="float:right;"> You are a Premium Member <img src="<?php bloginfo('stylesheet_directory'); ?>/images/pm.png" alt="premium" border="0" /></div>
<?php } ?>
  <br />
<h2>Welcome <?php echo $user_profile->firstname;?>&nbsp;<?php echo $user_profile->lastname;?> </h2>
<br />
<?php	 
$action= $_REQUEST['action'];
	 switch($action) 
	{
		case 'viewprofile':
		include (TEMPLATEPATH .'/users/my-profile.php');
		break;
		case 'viewprofileuser':
		include (TEMPLATEPATH .'/users/view-profile.php');
		break;
		case 'myfavorite':
		include (TEMPLATEPATH .'/users/favorites.php');
		break;
		case 'editprofile':
		include (TEMPLATEPATH .'/users/edit-profile.php');
		break;
		case 'uploadimage':
		include (TEMPLATEPATH .'/users/image-profile.php');
		break;
		case 'changepassword':
		include (TEMPLATEPATH .'/users/password-profile.php');
		break;
		case 'viewcompanyprofile':
		include (TEMPLATEPATH .'/company/my-cprofile.php');
		break;
		case 'editcompanyprofile':
		include (TEMPLATEPATH .'/company/edit-cprofile.php');
		break;
		case 'uploadcimage':
		include (TEMPLATEPATH .'/company/image-cprofile.php');
		break;
		case 'editcbusiness':
		include (TEMPLATEPATH .'/company/edit-cbusinesscategory.php');
		break;
		case 'editmapos':
		include (TEMPLATEPATH .'/company/edit-map-position.php');
		break;
		
		default:
include (TEMPLATEPATH .'/users/profile.php');
break;
}
	
		}?>
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