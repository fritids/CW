<?php
	if ( !$user_ID ) {
	$company_row=get_company_byid($_GET["idc"]); 

	}
	else
	{
		$company_row=get_company_byuserid($user_ID);
	//print_r($company_row);
	}
	if ($company_row)
	{
?>
<?php
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
		
		 bact_form_ajax_save($check,$_POST['type'],$company_row->company_id);
		 
	}
	
	
	
}
 ?>
<script>
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
<style>
li { list-style-type:none;}
</style>
<?php $company_row=get_company_byuserid($user_info->ID);?>
 <a href="<?php $monUrl ?>/my-page-2?action=editcompanyprofile" title="Edit Company" class="bluelink">Edit Company Profile » 
 </a> | <a href="<?php $monUrl ?>/my-page-2?action=editcbusiness" class="bluelink" title="Edit business category">Edit business category »</a> |  <a href="<?php $monUrl ?>/my-page-2?action=editmapos" title="Edit map position" class="bluelink">Edit map position » 
 </a>|  <a href="<?php $monUrl ?>/my-page-2?action=uploadcimage" title="Upload Company Image" class="bluelink">Upload Image » 
 </a>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/registration.css" type="text/css" media="screen, projection" />
<form name"step1" action=""  method="POST" id="register1form" style="min-height:700px;">
Text Search
<div>
<label for="prod_serv">Product/Service </label>
	
<input type="text" name="prod_serv" id="prod_serv" size=20 maxlength=20 value="" /> <input type="button" value="Search" onclick="senddata2()"/>
<div id="sscategs2"></div>
</div>
<hr>
<?php $types=get_BusinessType();?>
<label for="categories">Browse Categories </label><label for="type" style="margin-left:300px;">Type-Optionnal.(?)<select name="type"><option value="0"></option><?php foreach($types as $type){?><option value="<?php echo $type->business_type_id;?>"><?php echo $type->name;?></option><?php }?></select></label>
<div id="categs" style="margin-top:20px;">

<?php $cats = get_unspsc_level1();?>
<ul style="float:left;width:310px;height:400px;overflow:scroll;margin-right:10px">
<li class="bluelink"><h3>Products:</h3></li>
<?php foreach ($cats as $cat){if( !mb_strpos(mb_strtolower($cat->title), "services" )){?><li><a href="javascript:senddata(<?php   echo $cat->egci; ?>)" class="bluelink"><?php   echo $cat->title; ?></a></li><?php } }?>
<li><h3>Services:</h3></li>
<?php foreach ($cats as $cat){ if(! mb_strpos(mb_strtolower($cat->title), "services" ) === false){?><li><a href="javascript:senddata(<?php   echo $cat->egci; ?>)" class="bluelink"><?php   echo $cat->title; ?></a></li><?php } }?>
</ul>
</div>

<div id="sscategs1">

</div>
<br/>
<input	type="submit" value="Finish" onclick="alert('Registration Done! Thank You.')">
</form>   <?php }
else
{
echo 'You must register your Company First!<br />'?>
<a href="<?php $monUrl ?>/register-step2" title="as seen by others" class="bluelink">Register Your Company</a>
<?php }
?>