<?php
require('../../../wp-load.php' );

ini_set('display_errors', 1);

if( isset($_POST['segment']) && isset($_POST['level']) && ($_POST['level'] == 1) ){
	include("./business-directory-search-v1.php");

}elseif( isset($_POST['segment']) &&  isset($_POST['family']) &&  isset($_POST['class']) && 
		 isset($_POST['level']) && ($_POST['level'] == 2) ){
	include("./business-directory-search-v2.php");

}elseif( isset($_POST['segment']) &&  isset($_POST['family']) &&  isset($_POST['class']) && 
		 isset($_POST['egci']) && isset($_POST['level']) && ($_POST['level'] == 3) ){
	include("./business-directory-search-v3.php");
	
}
?>
