<?php 
global $wpdb;

require_once PLUGIN_DIR ."/include/func.php";

$ajax_map = site_url('/wp-content/plugins/gbg_presentation/ajax');

$id_group = $_GET['group'];
$id_country = $_GET['country'];

	if($id_group)
	{
		include(PLUGIN_DIR . '/templates/group_profile.php');
	}
	elseif ($id_country)
	{
		include(PLUGIN_DIR . '/templates/country_profile.php');
	} else
	{
?>
<link type="text/css" href="<?php echo site_url('/wp-content/plugins/gbg_presentation/include/gbg_pres.css');?>" rel="stylesheet">

      <script type="text/javascript">
          function affichersweeden(param)
          {
        param = 'cont='+param;
          
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
		var regionsous = document.getElementById("sweeden");
		 //  alert ("erreur : " + XhrObj.status); 	
		XhrObj.open("POST", '<?php echo $ajax_map; ?>/ajax_sweeden.php');
		//Ok pour la page cible
		XhrObj.onreadystatechange = function()
		{
			if (XhrObj.readyState == 4 && XhrObj.status == 200)
				regionsous.innerHTML = XhrObj.responseText ;
		}

		XhrObj.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		XhrObj.send(param);   
          }
function afficher_country(param)
{
   

param = 'cont='+param;

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
		var regionsous = document.getElementById("countries");
		 //  alert ("erreur : " + XhrObj.status); 	
		XhrObj.open("POST", '<?php echo $ajax_map; ?>/ajax_countries.php');
		//Ok pour la page cible
		XhrObj.onreadystatechange = function()
		{
			if (XhrObj.readyState == 4 && XhrObj.status == 200)
				regionsous.innerHTML = XhrObj.responseText ;
		}

		XhrObj.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		XhrObj.send(param);
}

function afficher_group(param)
{
 param = 'grp='+param;

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
		var regionsous = document.getElementById("sweeden");
		 //  alert ("erreur : " + XhrObj.status); 	
		XhrObj.open("POST", '<?php echo $ajax_map; ?>/ajax_group.php');
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
<div id="content" >
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
		  
  <div class="post" id="post-<?php the_ID(); ?>">
    <div class="cover">
  <div class="entry" style="padding-top:5px;">

<?php the_content('Read the rest of this entry &raquo;');?>
   <?php $continents=get_continents();
      ?>

<table>
<tr>
      <td style="width: 270px;"> <ul style="list-style:none;">
              <?php foreach($continents as $continent){?>
              <li><a href="javascript:afficher_country('<?php echo $continent->id; ?>')" <?php if($continent->id!=3) echo 'style="color: #999999;"'; ?> ><?php echo $continent->continent_name;?> </a></li>
              <?php }?>
          </ul></td>
      <td id="countries" >
      </td><td><img alt="demo" src="<?php echo plugins_url('/include/images/demorightsmall.png', dirname( __FILE__) ); ?>" style="position:absolute; z-index:1; left: 859px;"/>
	<img src="<?php echo plugins_url('/include/images/globe3.gif', dirname( __FILE__) ); ?>"></td></tr></table>
<div id="sweeden" >

</div>

		<div class="clear"></div>
 <?php wp_link_pages(array('before' => '<p><strong>Pages: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>

</div>
</div>

<?php endwhile; endif; ?>
</div>
<?php 
}		