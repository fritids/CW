<?php
  /*
  Template Name: Paynova Payment Notification
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


	 
$tableau=keys();
//		   if (!empty ($_REQUEST)){
//		print_r($_REQUEST);

// Replace with your own.
$secretkey= get_paynova_conf($tableau[5]);

// Set variable values
$status			= $_REQUEST["paynova_status"];   
$substatus 		= $_REQUEST["paynova_substatus"];                         
$statusmessage 	= $_REQUEST["paynova_statusmessage"];
$transid        = $_REQUEST["paynova_transid"];
$neworderid        = $_REQUEST["merchant_orderid"];
$payment_method	= $_REQUEST["payment_method"];
$card_no		= $_REQUEST["card_no"];
$exp_date		= $_REQUEST["exp_date"];
$approved		= $_REQUEST["approved"];
$strChecksumRec	= $_REQUEST["checksum"];
$orderdata      = $_REQUEST["merchant_orderdata"];

// Create md5 checksum	
//$checksum = md5($status . $substatus . $transid . $secretkey);
$checksum    = md5($merchant_id . $merchant_orderid . $pay_cents . $pay_currency . $secretkey);
if ($checksum == $strChecksumRec)
{	
	if ($paynova_status == "1")
	{
		sendResponse(1,"OK|OK",$neworderid ,$secretkey);
		
		
	} else
	{
		sendResponse(1,"OK|Cancel",$neworderid ,$secretkey );
	} 
} else
{
	sendResponse(-2,"ERROR|Checksum mismatch",$neworderid ,$secretkey);
}

		/*   }else 
		   {
			   print_r($_REQUEST);
			   
			   echo "Go back and fill";
		   }
	 */
	  
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