<?php
define("LIMIT",10);
define("LIMIT2",5);

?>

<style>

table a:visited, h2 a:visited { color:blue;}

</style>
<h2> <a href="/business-search/cw-business-directory">Start</a> / <?php print get_level2_name($_POST['segment']) ?> </h2>
<table>
<?php
	$result = get_level2_comp_count($_POST['segment']);
	
	foreach($result as $row){
?>

<?php

		$color=='' ? $color=' class=row' : $color='';
		print '<tr'. $color . '>';
?>

		<td>

		<?php if($row->class == '00'){ ?>

			<strong><?php print $row->title ?></strong>

		<?php }else{ ?>

			&nbsp; &nbsp; 		
			<a onclick="senddataCompany(<?php print $row->segment ?>, <?php print $row->family ?>, <?php print $row->class ?>)">
			<?php print $row->title ?>
			</a>
			<span style="color:gray">(<?php print $row->tot ?>)</span>

		<?php } ?>

		</td>
		</tr>
<?php	
	}
?>
</table>