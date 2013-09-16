<?php
require('../../../wp-load.php' );

define("LIMIT",10);
?>

<style>
table a:visited, h2 a:visited { color:blue}
</style>
<h2> <a href="/business-search/cw-business-directory">Start</a> / 

<a onclick="senddata(<?php print htmlspecialchars($_POST['segment']) ?>)">
<?php print get_level2_name($_POST['segment']) ?> </a> / 

<a onclick="senddataCompany('<?php print $_POST['segment'] ?>', '<?php print $_POST['family'] ?>', '<?php print $_POST['class'] ?>');">
	<?php print get_level3_name($_POST['segment'], $_POST['family'] , $_POST['class']) ?> 
</a> /
<?php print get_egci_name($_POST['egci']); ?>
</h2>

<br><br>

<?php	
	$result = get_company_by_egci2($_POST['egci'], 0, LIMIT);
?>

<?php
	include ("business-directory-search-company-list.php");
?>