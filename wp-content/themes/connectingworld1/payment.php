<?php
  /*
  Template Name: Paynova Payment
  */
  
 get_header(); ?>
 
<div class="span-24" id="contentwrap" style="background-color:#FFF;">		
	<div class="span-13"   style="width:790px; background-color:#FFF; min-height:600px;"> 
	
    	<div id="content" style="background-color:#FFF;">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="entry">
                      <?php if($Errorfields != '') { ?>
						  <ul class="error"><? echo $Errorfields;?></ul> 
					  <?php }else
					 ?>
                    <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>   
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                     <hr>
<?php 

// if the customer is not logged on, redirect them to the login page
	  if ( $user_ID ) {
	
$tableau=keys();



		 //  if (!empty ($_POST)){
		
		 
$user_info = get_userdata($user_ID);

$c_name=get_country_name($user_info->country_id);
$r_name=get_region_name($user_info->region_id);



// 1 = Web
$merchant_channel = 1;

$merchant_id =  get_paynova_conf($tableau[4]);

$merchant_orderid = date('Ymdhis');

$secretkey= get_paynova_conf($tableau[5]);

$pay_cents =10000;
$pay_currency ="USD";
//echo $merchant_id;
//echo $merchant_orderid;

// Create md5 checksum
$checksum	= md5($merchant_id . $merchant_orderid . $pay_cents . $pay_currency . $secretkey);

$strPostData	=  "merchant_id="                   . $merchant_id;  
$strPostData	.= "&merchant_channel="             . $merchant_channel;
$strPostData	.= "&merchant_channelid=";
$strPostData	.= "&merchant_orderid="             . $merchant_orderid;
$strPostData	.= "&merchant_orderdata=";
$strPostData	.= "&merchant_notify_page="         . get_option("siteurl").'/merchant_notify_page.php';




$strPostData	.= "&merchant_redirect_url_ok="     .get_option("siteurl").'/Payment-result';
$strPostData	.= "&merchant_redirect_url_cancel=" .get_option("siteurl").'/contact-press-people/contact';
$strPostData	.= "&merchant_theme=";
$strPostData	.= "&merchant_timeout=";
$strPostData	.= "&merchant_security_data=";
$strPostData	.= "&customer_email="				. $user_info->user_email;
$strPostData	.= "&customer_phone="				. $user_info->phone;
$strPostData	.= "&customer_firstname="			. $user_info->firstname;
$strPostData	.= "&customer_lastname="			. $user_info->lastname;
$strPostData	.= "&customer_address1="			. $user_info->adress;
$strPostData	.= "&customer_address2="			. ''; 
$strPostData	.= "&customer_zip="					. $user_info->zip_code;
$strPostData	.= "&customer_city="				.  $r_name->region_name;
$strPostData	.= "&customer_state="				. $r_name->region_name;
$strPostData	.= "&customer_country="             . $c_name->iso;
$strPostData	.= "&customer_language="            . 'ENG';
$strPostData	.= "&customer_cardnumber=";
$strPostData	.= "&customer_cardexpmmyy=";
$strPostData	.= "&pay_method="                   . '99';
$strPostData	.= "&pay_cents="           			. $pay_cents;
$strPostData	.= "&pay_currency="       			. 'USD';
$strPostData	.= "&pay_contracttext="      	    . 'Payment';
$strPostData	.= "&pay_prodid=";
$strPostData	.= "&checksum="          			. rawurlencode($checksum);
$strPostData	.= "&extra=";
//echo $strPostData;
$sessionURL= get_paynova_conf($tableau[8]);
$strReturn	= http_post($sessionURL, $strPostData);
$SessionKey = between($strReturn, "<paynova_session>", "</paynova_session>");
$PaynovaStatus = between($strReturn, "<paynova_status>", "</paynova_status>");
$PaynovaStatusmessage = between($strReturn, "<paynova_statusmessage>", "</paynova_statusmessage>");
$Paynovamerchant_orderid = between($strReturn, "<merchant_orderid>", "</merchant_orderid>");
$_SESSION['PaynovaStatus'] = $PaynovaStatus;
/*********************/
//echo $strPostData .'<br />';
/*echo "str return = ".$strReturn ."<br />";

echo "$PaynovaStatus= ".$PaynovaStatus ."<br />";
echo "$PaynovaStatusmessage= ".$PaynovaStatusmessage ."<br />";
echo "$Paynovamerchant_orderid= ". html_entity_decode($Paynovamerchant_orderid) ."<br />";
  */
$_SESSION['PaynovaStatus'] = $PaynovaStatus;

$_SESSION['marchant_id'] = $merchant_id;
$_SESSION['pay_cents'] = $pay_cents;
$_SESSION['pay_currency'] = $pay_currency;




/***********************/

if($PaynovaStatus != 1)
{
	//echo 'payment_error=' ;
	}
//echo $user_info->firstname;
//echo "Error --".$strReturn;

//		  edit_profile ($_POST);
$url = "https://paygate.paynova.com/MakePayment/FullPage/Default.aspx?sessionkey=".$SessionKey;
?>



	<iframe name="iframe" width="400" height="400" src="<?= get_paynova_conf($tableau[7]) . $SessionKey?>" scrolling="no" marginwidth="0" marginheight="0" frameborder="no"></iframe>
  <?php 
		   /* }
		  else 
		   {
			   echo "You are already a premium Member ";
		   }
	 */
	 
	  }
	  else {
	  echo "You Must Be logged";
	  }
	  ?>
 
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