
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