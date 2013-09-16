<?php

global $wpdb;
$iso='AD';
$sql = $wpdb->prepare("SELECT * FROM $wpdb->region where iso_country=".$iso);  
            $regions = $wpdb->get_results($sql); 

?>
<select id="country">
<?php foreach($regions as $region){?>
<option value="<?php echo $region->region_id;?>"><?php echo $region->region_name;?></option>
<?php }?>
</select>

