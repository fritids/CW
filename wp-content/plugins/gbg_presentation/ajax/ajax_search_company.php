<?php 
require('../../../../wp-load.php' );
require_once('../include/func.php' );

//$countries = get_gbg_countries( (int)$_REQUEST['cont'] );
$search = $_GET['s'];
if ($search) {
	$companies = search_gbg_company($search); ?>
	<ul>
		<?php foreach ( $companies as $company ) { ?>
			<li><a href="javascript: choose_comp('<?php echo $company->company_id; ?>', '<?php echo $company->company_name; ?>');" id="<?php echo $company->company_id;?>" ><?php echo $company->company_name; ?></a></li>
			<?php } // End foreach ?>
		
	</ul>
<?php 
}
else {
	echo '<b>Wrong company name</b>';
}