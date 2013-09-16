<?php

function get_lang_spoken($langs_spoken){
	global $arr_lang;
	
	if(!$langs_spoken)
		return "";

	$pieces = explode(" ", $langs_spoken);
	
	$strcheck = "";
	
	foreach ($arr_lang as $key => $value){
		
		if(is_array($pieces)){
			if(in_array($key, $pieces))
				$strcheck = $strcheck  . $value . " " ;
		}
		//print "<input $strcheck type=checkbox style=\"display:inline\" name=langs_spoken[] value=\"$key\"> $value <br>";
	}
	return $strcheck;
}

function get_regions_provide($regions_provide){
	global $arr_regions_provide;
	
	if(!$regions_provide)
		return "";

	$pieces = explode(" ", $regions_provide);
	
	$strcheck = "";
	
	foreach ($arr_regions_provide as $key => $value){
		
		if(is_array($pieces)){
			if(in_array($key, $pieces))
				$strcheck = $strcheck  . $value . ", " ;
		}
		//print "<input $strcheck type=checkbox style=\"display:inline\" name=langs_spoken[] value=\"$key\"> $value <br>";
	}
	return $strcheck;
}


?>


<style>
#main__ {	
	width:829px;	
}

#ctable td, #ctable th { padding-right:3px	}
#ctable th.nw, #ctable td.nw {white-space:nowrap}
</style>

<table id=ctable>
	<tr>
	<th>Company</th>
	<th>Type</th>
	<th>Product/<br>Service</th>
	<th>Industry/<br>branch</th>
	<th>Country/<br>Region</th>
	<!--th>Adress/Phone</th-->
	<th class=nw>Empl.</th>
	<th  class=nw title="Annual. (MUSD)">Sales</th>
	

	<?php 
		if($LATEST){
			
	?>

			<!--th  class=nw>Reg. date</th-->	
	<?php	
	}else{
	?>
			<th   class=nw title="Year established">Est.year</th>	
	<?php	
	}
	?>
	</tr>





<?php
	foreach($result as $row){
		if($row->company_name != 'None'){

?>

<?php
		$color=='' ? $color=' class=row' : $color='';
		
?>
		<?php print '<tr'. $color . '  style="' . $style . '">' ?>
		<td sstyle="width:190px">
			<a href="<?php echo site_url("/business-search/free-text-search?cp=$row->company_id");?>"><?php print $row->company_name ?></a>
			

			<span style="white-space:nowrap;display:block">
			<?php  if($row->skype_nick){ ?> 
				<IMG SRC="<?php echo site_url("wp-content/themes/connectingworld1");?>/images/skype.gif" sstyle="padding-top:-2px" WIDTH="16" HEIGHT="16" BORDER="0" ALT="Skype available">
			<?php }?>

			<?php  if($row->c_display_email && $row->company_email){ ?> 
				<IMG SRC="<?php echo site_url("wp-content/themes/connectingworld1");?>/images/p_email.gif" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Email">
			<?php }?>

			<?php  if($row->prod_count){ ?> 
				<IMG SRC="<?php echo site_url("wp-content/themes/connectingworld1");?>/images/p_catalogue.gif" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Product catalogue">
			<?php }?>

			<?php  if($row->company_url){ ?> 
				<IMG SRC="<?php echo site_url("wp-content/themes/connectingworld1");?>/images/p_weblink.gif" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Web site">
			<?php }?>

			<?php  if($row->company_map_lon && $row->company_map_lat){ ?> 
				<IMG SRC="<?php echo site_url("wp-content/themes/connectingworld1");?>/images/p_map.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="Visible on map">
			<?php }?>
			
			<?php  if($row->unspcs_count){ ?> 
				<IMG SRC="<?php echo site_url("wp-content/themes/connectingworld1");?>/images/b_report.gif" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Has product/service registration">
			<?php  } ?> 

			<?php  if($row->lang_spoken){ ?>
				<span title="Languages contact speaks: <?php print get_lang_spoken($row->lang_spoken) ?>">L</span> 
			<?php  } ?> 
			
			<?php  if($row->regions_provide){ ?>
				<span title="Can provide/export to: <?php print get_regions_provide($row->regions_provide)?>">E</span>  
			<?php  } ?> 
			</span>




		</td>
		<td>
			
			<?php print $row->btype_name ?>

		</td>
		<td>



			 <?php  if($row->main_unspcs){ ?>
				<?php 
					$sout = $row->title;
					if(mb_strlen($sout) > 28) 
						$sout2 = mb_substr($sout,0, 28) . "..." ;		
				?>
				<span title="<?php print ($sout) ?>"><?php print $sout2 ?></span>
			<?php  } ?> 
		</td>
		<td>
			<?php print ($row->industry_name) ?>			

		</td>
		<td>
			<?php print $row->country_name ?> <?php print $row->region_name ?>		
		</td>
						
		<td class=nw>
			<?php 
				if($row->company_noof_employee){
					$s_emp = str_replace("People", "",$arr_employees[$row->company_noof_employee]);
					$s_emp = str_replace("Less than", "<",$s_emp);
					$s_emp = str_replace("Above", ">",$s_emp);
					print $s_emp;
				}
			?> 
		</td>
		<td  class=nw>
			<?php  
				if($row->company_annualsales){
					$s_s = str_replace("Million", "", $arr_annual_sales[$row->company_annualsales]);
					$s_s = str_replace("US$", "",$s_s);
					$s_s = str_replace("Below", "<",$s_s);
					print $s_s;
				}
					
				?> 
		</td>
		
			<?php 
				if($LATEST){
					
			?>

					<?php //print ($row->date_register']) ?> 
			<?php	
			}else{
			?><td class=nw>
				<?php print ($row->company_established) ?> </td>
				<?php	
			}
			?>
		
		</tr>

		<?php 
				if($SEARCH){
					$out = str_ireplace($_GET['searchfor'], 
									"<b>" . htmlspecialchars($_GET['searchfor']) . "</b>", 
									$row->search_title);  
					
				
		?>
			
			<?php print '<tr'. $color . ' style="' . $style . '">' ?>
				<td colspan=9><i>Search-hit: <?php print  $out; ?></i></td>
			</tr>

		<?php	
		}
		?>

<?php	
	}
	}
?>

</table>


<?php
	if(count($result)==0){
		print "<i>No companies</i> <br><br>";
	}else{
?>

<div class=clearfix style="width:300px">
	<div style="float:left;font-size:smaller;width:140px;margin-right:10px">
		<IMG SRC="<?php echo site_url("wp-content/themes/connectingworld1");?>/images/skype.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="Skype available"> = Skype available <br>


		<IMG SRC="<?php echo site_url("wp-content/themes/connectingworld1");?>/images/p_email.gif" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Email"> = Visible email <br>

		<IMG SRC="<?php echo site_url("wp-content/themes/connectingworld1");?>/images/p_catalogue.gif" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Product catalogue"> = Product catalogue  <br>

		<IMG SRC="<?php echo site_url("wp-content/themes/connectingworld1");?>/images/p_weblink.gif" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Web site"> = Web site link <br>
	</div>
	<div style="float:left;font-size:smaller;width:140px;">

		<IMG SRC="<?php echo site_url("wp-content/themes/connectingworld1");?>/images/p_map.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="Visible on map">  = Visible on map<br>


		<IMG SRC="<?php echo site_url("wp-content/themes/connectingworld1");?>/images/b_report.gif" WIDTH="13" HEIGHT="13" BORDER="0" ALT="Has product/service registration"> = Product/service reg.<br>

		E = export/provide <br>
		L = languages <br>
	</div>
</div><br>

<?php
	}
?>