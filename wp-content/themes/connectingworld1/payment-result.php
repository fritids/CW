<?php
  /*
  Template Name: Paynova Payment Result
  */
 get_header(); ?>
  <div class="span-24" id="contentwrap" style="background-color:#FFF;">		
	<div class="span-13"   style="width:790px; background-color:#FFF; min-height:600px;"> 
	
    	<div id="content" style="background-color:#FFF;">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="entry">
                   <?php 


	  if ( $user_ID ) {
	  
		$tableau=keys();
		//print_r ($_REQUEST);
		if ($_SESSION['PaynovaStatus'] == 1)
		{?>
			
			<h4>Congratulations</h4>	
			 <p class=infobox> 			 
				<b>You are now a premium member.</b><br /><br />
				<?php 
					echo '<b>Your Order ID : </b>'.$_SESSION['marchant_id'].'<br />' ;
					echo '<b>Your Paid Amount : </b>100.00'.$_SESSION['pay_currency'];
					echo '<br />';
				?>
				<br />
				Please take note of your order number and read your email, you can refer to it whenever you want to report to our Support. <br />
				Contact our Support at: <a href="mailto:payment.support.wwb@cw-connectingworld.com" class="bluelink">payment.support.wwb@cw-connectingworld.com</a> <br />
				Welcome to take your benefits as a "Premium member". <br />
				<br />
				CW Connecting World. <br />
				Team-Admin.
				</p>			
		<?php
			//envoi mail vers de confirmation que user devenu premium
			  //recuperer info user
				$user_profile = get_user_profile($user_ID);
			  //
			  $email = $user_profile->email;
			  $emailTo = 'donotreply@cw-connectingworld.com';
			  $subject ='CW-connectingworld.com Premium member';
			  $body = 'PLEASE DO NOT REPLY TO THIS EMAIL<br /><br />';
			  $body .='Dear '.$user_profile->firstname.' '.$user_profile->lastname.',<br /><br />';			  
			  $body .='<b>Congratulations.</b><br />';
			  $body .='You are now a premium member.<br /><br />';			  
			  $body .='Your Order ID: '.$_SESSION['marchant_id'].'<br />';
			  $body .='Your Paid Amount: 100,00'.$_SESSION['pay_currency'] .'<br /><br />';			  
			  $body .='Please take note of your order number, you can refer to it whenever you want to report to our Support.<br />';
			  $body .='Contact our Support at: <a href="mailto:payment.support.wwb@cw-connectingworld.com">payment.support.wwb@cw-connectingworld.com</a><br />';
			  $body .='Welcome to use your benefits as a "Premium member".<br />';
			  $body .='Login  to: <a href="'.get_option("siteurl").'">'.get_option("siteurl").'</a><br /><br />';
			  $body .='CW Connecting World.<br />';			  
			  $body .='Team-Admin<br />';			  
			  $headers ='From: "CW-connectingworld.com"<donotreply@cw-connectingworld.com>'."\n"; 
		   $headers .='Reply-To: donotreply@cw-connectingworld.com'."\n"; 
		   $headers = $headers.'Content-type: text/html; charset=utf-8'."\r\n";
	   		 
			 //envoi mail to user
			  mail($email, $subject, $body, $headers);
			 $emailSent = true;
			  
			 //update 
			 update_user_premium($user_ID);
		}
		else{
			
		}


// Create md5 checksum	
	  
	  }


	  else {
	  echo "You Must Be logged";
	  }
	  ?>
                    <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
                    
              
					<?php //the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                    <!--  <hr>  -->

 
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				</div>
			</div>
			</div>
	<?php
	?>
	
    		<?php endwhile; endif; ?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		</div>
	</div>


<?php include (TEMPLATEPATH . "/sidebar2.php"); ?>

</div>
<?php get_footer(); ?>