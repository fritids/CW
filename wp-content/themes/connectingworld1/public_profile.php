<?php
  /*
  Template Name: public profile
  */
 get_header(); ?>


<div class="span-24" id="contentwrap" style="background-color:#FFF;">		
	<div class="span-13"   style="width:790px; background-color:#FFF;"> 
		
    	<div id="content" style="background-color:#FFF;">	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap" style="background-color:#FFF;">
			<div class="post" id="post-<?php the_ID(); ?>">

				<div class="entry">
                <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>       
	<?php
if (isset ($_REQUEST['activekey']))
{
	$user_ID = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->users WHERE user_activation_key = %s", $_REQUEST['activekey']));
	}
	else {}
	?>
   


   
<?php	 
$action= $_REQUEST['action'];
	 switch($action) 
	{
		case 'viewprofile':
		include (TEMPLATEPATH .'/users/my-profile.php');
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
?>            </div>
			</div>
            </div>
			<?php endwhile; endif; ?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		</div>
       
	</div>
	

<?php include (TEMPLATEPATH . "/sidebar2.php"); ?>

</div>
<?php get_footer(); ?>