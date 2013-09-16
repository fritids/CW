<?php
require('../../../wp-load.php' );

define("LIMIT",10);
define("LIMIT2",5);
?>

<style>
table a:visited, h2 a:visited { color:blue;}
</style>

<h2> <a href="/business-search/cw-business-directory">Start</a> / 
<a onclick="senddata(<?php print htmlspecialchars($_POST['segment']) ?>)">
<?php print get_level2_name($_POST['segment']) ?> </a> / 
<?php print get_level3_name($_POST['segment'], $_POST['family'] , $_POST['class']) ?> </h2>


<table>

<?php	
	$result = get_level3($_POST['segment'], $_POST['family'] , $_POST['class']);
?>

<?php
	foreach($result as $row){
?>

<?php
		$color=='' ? $color=' class=row' : $color='';
		print '<tr'. $color . '>';
?>

		<td>
			<a onclick="resultCompany('<?php print $row->segment ?>', '<?php print $row->family ?>', '<?php print $row->class ?>', '<?php print $row->egci ?>');">
				<?php print $row->title ?>			
			</a>
			<span style="color:gray">(<?php print $row->tot?>)</span>

		</td>
		</tr>
<?php	
	}
?>

</table>
