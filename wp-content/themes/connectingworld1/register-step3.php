<?php
  /*
  Template Name: register-step3
  */
  get_header(); 
  ?>
<?php
if (isset ($_REQUEST['iduser']))
{
	$iduser = $_REQUEST['iduser'];
}
if(isset($_POST['check']))
{
	//unspsc_company
	global $wpdb;
/*$req="SELECT max(company_id) as 	company_id FROM $wpdb->company ";
	$company=$wpdb->get_row($req);*/
     
	foreach($_POST['check'] as $check)
	{
		
		/*$data=array('egci'=>$check,'company_id'=>$company->company_id,'type'=>$_POST['type']);
		$wpdb->insert($wpdb->unspsc_company,$data);*/
		
	wpusercity_form_ajax_save($check,$_POST['type'],$iduser);
		 
	}
}
 ?>
<script type="text/javascript">
function search_cat(val)
{
param = 'cat='+val;
param1='type='+document.getElementById("type_search").value;

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
		//var regionsous = document.getElementById("asma");
		 //  alert ("erreur : " + XhrObj.status); 	
		XhrObj.open("POST", '<?php bloginfo('template_directory'); ?>/ajax_cat_save.php');
		//Ok pour la page cible
		XhrObj.onreadystatechange = function()
		{
			if (XhrObj.readyState == 4 && XhrObj.status == 200)
				regionsous.innerHTML = XhrObj.responseText ;
		}

		XhrObj.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		XhrObj.send(param,param1);	
}

function senddata(val)
{
	var hi = toString(val);
param = 'cat='+val;
document.getElementById('sscategs1').innerHTML = '<img src="<?php bloginfo('template_directory'); ?>/images/loading-search.gif" alt="Load" title="Load" />';
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
		var regionsous = document.getElementById("sscategs1");
		 //  alert ("erreur : " + XhrObj.status); 	
		XhrObj.open("POST", '<?php bloginfo('template_directory'); ?>/ajax_cat.php');
		//Ok pour la page cible
		XhrObj.onreadystatechange = function()
		{
			if (XhrObj.readyState == 4 && XhrObj.status == 200)
				regionsous.innerHTML = XhrObj.responseText ;
		}

		XhrObj.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		XhrObj.send(param);
	}
	
	
function senddata1(val,val1)
{
	
param = 'cat='+val;

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
		var regionsous = document.getElementById("categ"+val1);
		 //  alert ("erreur : " + XhrObj.status); 	
		XhrObj.open("POST", '<?php bloginfo('template_directory'); ?>/ajax_cat1.php');
		//Ok pour la page cible
		XhrObj.onreadystatechange = function()
		{
			if (XhrObj.readyState == 4 && XhrObj.status == 200)
				regionsous.innerHTML = XhrObj.responseText ;
		}

		XhrObj.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		XhrObj.send(param)
	}
	
	function senddata2()
{
param = 'cat='+document.getElementById("prod_serv").value;

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
		var regionsous = document.getElementById("sscategs2");
		 //  alert ("erreur : " + XhrObj.status); 	
		XhrObj.open("POST", '<?php bloginfo('template_directory'); ?>/ajax_search.php');
		//Ok pour la page cible
		XhrObj.onreadystatechange = function()
		{
			if (XhrObj.readyState == 4 && XhrObj.status == 200)
				regionsous.innerHTML = XhrObj.responseText ;
		}

		XhrObj.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		XhrObj.send(param);
	}
</script>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/registration.css" type="text/css" media="screen, projection" />
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/contact-form.js"></script>


<div class="span-24" id="contentwrap">
	<div class="span-13"  style="width:790px; background-color:#FFF;"> 
		<div id="content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="postwrap">
			<div class="post" style="margin-top:2px;">
				<div class="entry">
                    <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array('class' => 'alignleft post_thumbnail')); } ?>
   <h2 class="title">Registration to CW STEP-3</h2>
  <?php if($Errorfields != '') { ?>
						  <ul class="error"><? echo $Errorfields;?></ul> 
					  <?php } ?>
                      
<form name"step1" action=""  method="POST" id="register1form" style="min-height:700px;">

<div style="color:#1250A1;font-weight:bold;margin-bottom:20px;">Registration in CW</div>

<div style="clear:both;margin-bottom:20px;margin-bottom:20px;" class="clearfix">
	<div style="float:left;font-weight:bold;color:gray;border:solid 1px gray;padding:5px">1. Member registration</div>
	<div style="width:50px;float:left;border-bottom:solid 1px gray">&nbsp;</div>

	<div style="float:left;color:gray;border:solid 1px gray;padding:5px">2. Company registration</div>
	<div style="width:50px;float:left;border-bottom:solid 1px gray">&nbsp;</div>

	<div style="float:left;border:solid 1px gray;padding:5px">3. Products/services registration</div>

</div>
<hr>
<div>
<label for="prod_serv">Search Product/Service </label> <br />
	
<input type="text" name="prod_serv" id="prod_serv" size=20 maxlength=20 value="" /> <input type="button" value="Search" onclick="senddata2()"/>
<div id="sscategs2"></div>
</div>
<br />
<?php $types=get_BusinessType();?>
<label for="categories">Browse Categories </label> <br />
<select name="type"><option value="0"></option><?php foreach($types as $type){?><option value="<?php echo $type->business_type_id;?>"><?php echo $type->name;?></option><?php }?></select> 

<div id="categs" style="margin-top:20px;">

<?php $cats = get_unspsc_level1();?>
<ul style="float:left;width:310px;height:400px;overflow:scroll;margin-right:10px">
<li><h3>Products:</h3></li>
<?php foreach ($cats as $cat){if( !mb_strpos(mb_strtolower($cat->title), "services" )){?><li><a href="javascript:senddata(<?php   echo $cat->egci; ?>)"><?php   echo $cat->title; ?></a></li><?php } }?>
<li><h3>Services:</h3></li>
<?php foreach ($cats as $cat){ if(! mb_strpos(mb_strtolower($cat->title), "services" ) === false){?><li><a href="javascript:senddata(<?php   echo $cat->egci; ?>)"><?php   echo $cat->title; ?></a></li><?php } }?>
</ul>
</div>

<div id="sscategs1">

</div>
<br/>
<input type="submit" id="Finish" value="Finish" class="contact">
</form>   
                      
                      
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
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