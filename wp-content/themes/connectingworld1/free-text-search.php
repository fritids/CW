 <?php
  /*
  Template Name: free-text-search
  */
 get_header(); ?>
<script type="text/javascript"> 
function searchcompany()
  {
var poststr = "searchfor=" + encodeURI( document.getElementById("searchfor").value ) +
 "&country=" + encodeURI( document.getElementById("country").value ) +
                    "&business1=" + encodeURI( document.getElementById("business1").value ) +
					"&main_industry=" + encodeURI( document.getElementById("main_industry").value ) +
					"&employ_numbr=" + encodeURI( document.getElementById("employ_numbr").value ) +
					"&annual_sales=" + encodeURI( document.getElementById("annual_sales").value );
					
		  //alert (""+param+"");
		  if(document.all)
		  {
			  //Internet Explorer
			  var XhrObj = new ActiveXObject("Microsoft.XMLHTTP");
		  }//fin if
		  else
		  {
			  //Mozilla
		  var XhrObj = new XMLHttpRequest();
		  }//fin else
		  //définition de l'endroit d'affichage:
		  var regionsous = document.getElementById("results");
		   //  alert ("erreur : " + XhrObj.status); 	
		  XhrObj.open("POST", '<?php bloginfo('template_directory'); ?>/ajax_searchcompany.php');
		  //Ok pour la page cible
		  XhrObj.onreadystatechange = function()
		  {
			  if (XhrObj.readyState == 4 && XhrObj.status == 200)
				  regionsous.innerHTML = XhrObj.responseText ;
		  }
  
		  XhrObj.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		  XhrObj.send(poststr);
	  }
	  
	  
	  
	 function searchcompanypage(valeur)
  {
var poststr = "searchfor=" + encodeURI( document.getElementById("searchfor").value ) +
 "&country=" + encodeURI( document.getElementById("country").value ) +
                    "&business1=" + encodeURI( document.getElementById("business1").value ) +
					"&main_industry=" + encodeURI( document.getElementById("main_industry").value ) +
					"&employ_numbr=" + encodeURI( document.getElementById("employ_numbr").value ) +
					"&annual_sales=" + encodeURI( document.getElementById("annual_sales").value ) +
					"&pageno=" + valeur;
					
		  //alert (""+param+"");
		  if(document.all)
		  {
			  //Internet Explorer
			  var XhrObj = new ActiveXObject("Microsoft.XMLHTTP");
		  }//fin if
		  else
		  {
			  //Mozilla
		  var XhrObj = new XMLHttpRequest();
		  }//fin else
		  //définition de l'endroit d'affichage:
		  var regionsous = document.getElementById("results");
		   //  alert ("erreur : " + XhrObj.status); 	
		  XhrObj.open("POST", '<?php bloginfo('template_directory'); ?>/ajax_searchcompany.php');
		  //Ok pour la page cible
		  XhrObj.onreadystatechange = function()
		  {
			  if (XhrObj.readyState == 4 && XhrObj.status == 200)
				  regionsous.innerHTML = XhrObj.responseText ;
		  }
  
		  XhrObj.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		  XhrObj.send(poststr);
	  }
  </script>
<div class="span-24" id="contentwrap">
	<div class="span-13"> 
		<div id="content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" id="post-<?php the_ID(); ?>">
			<!-- <h2 class="title"><?php //the_title(); ?></h2> -->
				<div class="entry">
                <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                    <label for="Product-Service"><?php _e('Product/Service keyword *') ?><br /></label>
                <INPUT type="tex"t name="searchfor" id="searchfor" size="10" maxlength="15"
value="<?php print htmlspecialchars($_GET['searchfor']) ?>">
             
			 <p>
			 <br />
			 <label for="country"><?php _e('Choose Country *') ?></label>
			 <?php list_country();?>
			 </p>
<p>         
 <label for="business1"><?php _e('Business Type *') ?><br /></label>
<?php $businessTypes=get_BusinessType();?>
<select id="business1" name="business1">
<option value="">All</option>
<?php 
foreach($businessTypes as $businessType){
?>
<option value="<?php echo $businessType->business_type_id ;?>"><?php echo $businessType->name ;?></option>
<?php }?>
</select>
</p>
<p>
<?php $industries=get_industry();?>
<label for="main_industry"><?php _e('Main Industry *') ?><br /></label>
<select id="main_industry" name="main_industry">
<option value="">ALL</option>
<?php foreach($industries as $industry){?>
<option value="<?php echo $industry->industry_id;?>"><?php echo $industry->industry_name;?></option>
<?php }?>
</select>
</p>
	<p><?php $NbrEmployees = get_EmployeeNbr();	?>
<label for="employ_numbr"><?php _e('Number of Employees') ?><br /></label>
<select id="employ_numbr" name="employ_numbr">
<option value="">ALL</option>
<?php foreach($NbrEmployees as $NbrEmployee){?>
<option value="<?php echo $NbrEmployee->employe_id;?>"><?php echo $NbrEmployee->nbr_emplye;?></option>
<?php }?>
</select></p>
<p>
<?php $AnnualSales = get_AnnualSales();	?>
<label for="annual_sales"><?php _e('Approxim.Annual Sales') ?><br /></label>
<select id="annual_sales" name="annual_sales">
<option value="">ALL</option>
  <?php foreach($AnnualSales as $AnnualSale){?>
  <option value="<?php echo $AnnualSale->sales_id;?>"><?php echo $AnnualSale->description ;?></option>
  <?php }?>
</select>
</p>
	<input type="button" id="demo_btn" value="Search" onclick="searchcompany()">
			 <div id='results'>
   <label><?php _e('Results') ?><br /></label>
  
  </div>
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