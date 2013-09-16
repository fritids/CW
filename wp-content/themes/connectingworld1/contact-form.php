 <?php
  /*
  Template Name: Contact
  */
 get_header(); ?>
<div class="span-24" id="contentwrap">
	<div class="span-13"> 
		<div id="content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="entry">
<?php if (!isset($_REQUEST['country']) || empty ($_REQUEST['country'])){ ?>
	<h2>Contact us at World Wide Base</h2>
<table border="0">
<tbody>
<tr>
<td ><strong>Address:</strong>
CW Connecting World<br />
P.O. Box 1166<br />
SE-721 29 Västerås, Sweden<br />
Phone:             +46 (0) 21-180475<br />
info.wwb@cw-connectingworld.com&nbsp;<br /><strong></strong>

For technical questions:<br />
webmaster@cw-connectingworld.com</td>
<td align="right" valign="top"><img src="<?php echo get_option('siteurl'); ?>/wp-content/uploads/salesgen1.jpg" alt="" width="150" height="206" hspace="0" vspace="0" class="alignright size-full wp-image-994" title="salesgen" /></td>
</tr>
</tbody>
</table>

<?php } else {
	$i=$_REQUEST['country'];
	switch ($i) {
    case "CW": ?>
<h2>Contact us at World Wide Base</h2>
<table border="0">
<tbody>
<tr>
<td ><strong>Address:</strong>
CW Connecting World<br />
P.O. Box 1166<br />
SE-721 29 Västerås, Sweden<br />
Phone:             +46 (0) 21-180475<br />
info.wwb@cw-connectingworld.com&nbsp;<br /><strong></strong>

For technical questions:<br />
webmaster@cw-connectingworld.com</td>
<td align="right" valign="top"><img src="<?php echo get_option('siteurl'); ?>/wp-content/uploads/salesgen1.jpg" alt="" width="150" height="206" hspace="0" vspace="0" class="alignright size-full wp-image-994" title="salesgen" /></td>
</tr>
</tbody>
</table>

</table>
      <?php
        break;
		 case "bolivia":?>
                <h2>Contact us in Bolivia</h2>
<table border="0">
<tbody>
<tr>
<td><strong>Address:</strong>
CW Connecting World<br />
Mr. Javier Vega<br />
Tarija<br />
Bolivia<br /><br />

Contact person: Mr. Javier Vega<br />
E-mail: javier.vega@cw-connectingworld.com<br />
Mobile: +591-46610200</td>
<td align="right" valign="top"><img class="alignright size-full wp-image-994" title="salesgen" src="<?php echo get_option('siteurl'); ?>/wp-content/uploads/salesgen1.jpg" alt="" width="150" height="206" /></td>
</tr>
</tbody>
</table>





	<?php
        break;
    case "china":
      ?>
	   <h2>Contact us in China</h2>
<table border="0">
<tbody>
<tr>
<td><strong>Address:</strong>
      CW Connecting World<br />
      c/o Fantasia Communication Co. Ltd<br />
      7/F No. 7 Building JianWai SOHO, 39 East 3-rd-RingRoad<br />
      Chaoyang  District, Beijing, China<br />
    </p>
    <p><strong>Contact persons in Beijing:</strong></p>
    <p>Mr. WU Lihao<br />
      Country Manager, China<br />
      E-mail: wu.lihao@cw-connectingworld.com<br />
      Mobile: +86&nbsp;139&nbsp;012&nbsp;460 05<br />
  <br />
      Mr. Lee Weimin<br />
      Project Manager, China<br />
      E-mail: lb.beijing.cn@cw-connectingworld.com<br />
      Mobile: + 86&nbsp;136&nbsp;012&nbsp;989 34<br />
  <br />
      Mr. Suresh Paripalli<br />
      Chief Representative APAC<br />
      E-mail: suresh.paripalli@cw-connectingworld.com<br />
      Mobile: +86&nbsp;186&nbsp;000&nbsp;396 24<br />
  <br />
      Mr. Patrik Thostemar<br />
      Project Manager, China<br />
      E-mail: patrik.thostemar@cw-connectingworld.com<br />
      Mobile: +86&nbsp;137&nbsp;177&nbsp;884 75<br></td>
<td align="right" valign="top"><img class="alignright size-full wp-image-994" title="salesgen" src="<?php echo get_option('siteurl'); ?>/wp-content/uploads/salesgen1.jpg" alt="" width="150" height="206" /></td>
</tr>
</tbody>
</table><?php
        break;
    case "colombia": ?>
    	   <h2>Contact us in colombia</h2>
<table border="0">
<tbody>
<tr>
<td><strong>Address:</strong>
 CW Connecting World<br/>
      Joni AlWindi<br>
      Cali<br />
      Colombia<br/>
      <br/>
      Contact person: Mr. Joni AlWindi<br/>
      E-mail: joni.alwindi@cw-connectingworld.com<br/>
      Mobile: +57 317 591 0418<br/>
      </td>
<td align="right" valign="top"><img class="alignright size-full wp-image-994" title="salesgen" src="<?php echo get_option('siteurl'); ?>/wp-content/uploads/salesgen1.jpg" alt="" width="150" height="206" /></td>
</tr>
</tbody>
</table>
	<?php
        break;
		 case "india":
      ?>
       <h2>Contact us in India</h2>
<table border="0">
<tbody>
<tr>
<td><strong>Address:</strong>
 CW Connecting World<br>
Mr. Varun Sachar<br>
New Delhi<br>
India<br><br>

Contact person: Mr. Varun Sachar<br>
E-mail: varun.sachar@cw-connectingworld.com<br>
Mobile: +91-9811271111<br>
      </td>
<td align="right" valign="top"><img class="alignright size-full wp-image-994" title="salesgen" src="<?php echo get_option('siteurl'); ?>/wp-content/uploads/salesgen1.jpg" alt="" width="150" height="206" /></td>
</tr>
</tbody>
</table>
      <?php
        break;
		 case "kenya":?>
                <h2>Contact us in Kenya</h2>
<table border="0">
<tbody>
<tr>
<td><strong>Address:</strong>
CW Connecting World<br>
Mr. Moses Gitangu<br>
Nairobi<br>
Kenya<br><br>
Contact person: Mr. Moses Gitangu<br>
E-mail: moses.gitangu@cw-connectingworld.com<br>
Mobile: +254 771580022<br>
      </td>
<td align="right" valign="top"><img class="alignright size-full wp-image-994" title="salesgen" src="<?php echo get_option('siteurl'); ?>/wp-content/uploads/salesgen1.jpg" alt="" width="150" height="206" /></td>
</tr>
</tbody>
</table>
         <?php
       
        break;
		 case "spain":?>
                <h2>Contact us in Spain</h2>
<table border="0">
<tbody>
<tr>
<td><strong>Address:</strong>
CW Connecting World   <br>
Mr. Dennis Mark<br>
Las Palmas de Gran Canaria, <br />
Spain<br>
E-mail: lb.spain.es@cw-connectingworld.com<br>
<br>

Contact person: Mr. Dennis Mark<br>
E-mail: dennis.mark@cw-connectingworld.com<br>
Mobile: + 34 646 811 388<br>
      </td>
<td align="right" valign="top"><img class="alignright size-full wp-image-994" title="salesgen" src="<?php echo get_option('siteurl'); ?>/wp-content/uploads/salesgen1.jpg" alt="" width="150" height="206" /></td>
</tr>
</tbody>
</table>
		 <?php        break;
		 case "sweden":?>
                       <h2>Contact us in Sweden</h2>
<table border="0">
<tbody>
<tr>
<td><strong>Address:</strong>
CW Connecting World<br>
	P.O. Box 1166 <br>
	SE-721 29 Västerås, Sweden<br>
	Phone: +46 21-180475<br>
info.wwb@cw-connectingworld.com   <br>  <br> 

	<b>Visitingaddress</b><br>

	CW Connecting World<br>
	<!-- c/o Omfång Marknadskunskap AB <br> -->
	Narvavägen 75 <br>
SE-724 68 Västerås<br>
	Phone: +46 (0) 21-18 02 00<br>
	E-mail: rb.vasteras.se@cw-connectingworld.com

      </td>
<td align="right" valign="top"><img class="alignright size-full wp-image-994" title="salesgen" src="<?php echo get_option('siteurl'); ?>/wp-content/uploads/salesgen1.jpg" alt="" width="150" height="206" /></td>
</tr>
</tbody>
</table>
         <?php
       
        break;
		 case "malmo":?>
                                <h2>Contact us in Sweden-Malmo</h2>
<table border="0">
<tbody>
<tr>
<td><strong>Address:</strong>
CW Connecting World<br>
	c/o Active Coach Svenska AB<br>
	Ingenjörsgatan 5<br>
	SE-215 68 Malmö<br>
	Phone: +46 40-32 09 64<br>
	E-mail: rb.malmo.se@cw-connectingworld.com


      </td>
<td align="right" valign="top"><img class="alignright size-full wp-image-994" title="salesgen" src="<?php echo get_option('siteurl'); ?>/wp-content/uploads/salesgen1.jpg" alt="" width="150" height="206" /></td>
</tr>
</tbody>
</table>

<?php
       
        break;
		 case "tunisia":?>
                                <h2>Contact in Tunisia</h2>
<table border="0">
<tbody>
<tr>
<td><strong>Address:</strong>
2kip-SARL   <br>
67, Rue Habib Bourguiba, immeuble Farah 2eme étage <br>
Nouvelle Ariana, 2080 <br />
Tunis-Tunisia<br>
Phone Business: +33 (0) 1 83 64 29 19 <br>
Phone Production : +216 50 524 200 / +216 26 201 221    / +216 50 524 208 <br>
E-mail: <a href="mailto:info@2kip-dev.com">info@2kip-dev.com</a><br>
<br>

Contact person: Mr. Khelil Achraf<br>
E-mail: <a href="mailto:achraf.khelil@cw-connectingworld.com">achraf.khelil@cw-connectingworld.com</a><br>
Mobile: +57 317 591 0418<br>
      </td>
<td align="right" valign="top"><img class="alignright size-full wp-image-994" title="salesgen" src="<?php echo get_option('siteurl'); ?>/wp-content/uploads/salesgen1.jpg" alt="" width="150" height="206" /></td>
</tr>
</tbody>
</table>

		 <?php
       
        break;
		 case "vasteras":?>
                                <h2>Contact us in Sweden-Vasteras</h2>
<table border="0">
<tbody>
<tr>
<td><strong>Address:</strong>
CW Connecting World<br>
	<!-- c/o Omfång Marknadskunskap AB<br> -->
<!--	Köpmangatan 75<br>-->
    Narvavägen 75<br />
	SE-724 68 Västerås<br>
	Phone: +46 21-18 02 00<br>
	E-mail: rb.vasteras.se@cw-connectingworld.com



      </td>
<td align="right" valign="top"><img class="alignright size-full wp-image-994" title="salesgen" src="<?php echo get_option('siteurl'); ?>/wp-content/uploads/salesgen1.jpg" alt="" width="150" height="206" /></td>
</tr>
</tbody>
</table>
		 <?php
       
        break;
}
	}?>
&nbsp;
                    <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

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