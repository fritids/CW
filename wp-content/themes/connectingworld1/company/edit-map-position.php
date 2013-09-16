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
function findexts ($filename) { 
$filename = strtolower($filename) ;
 $exts = split("[/\\.]", $filename) ;
  $n = count($exts)-1; 
  $exts = $exts[$n];
   return $exts; }
   
  
   
$blog= ABSPATH;
if ($_REQUEST['submitted'])
{
if (!empty ($_REQUEST['lat']) && !empty ($_REQUEST['long']))
{
	update_latitude($_REQUEST['lat'], $_REQUEST['long'], $company_row->company_id);
	echo 'update succefull!';
	}
else
{
	echo 'There is an empty field!';
	}
}
?>
<style type="text/css">
div#popup {
background:#EFEFEF;
border:1px solid #999999;
margin:0px;
padding:7px;
width:270px;
}
</style>
 <script src="http://maps.google.com/maps?file=api&v=2&key=
   ABQIAAAAkWqnnHNhJArQvg9gg1hEmBSVfudpzG8FEw0qdtP2BHBgoSQrgxT8oTVUmnGLTfRyDillapKXZdk1Ug"
    type="text/javascript"></script>

   <script type="text/javascript">
//<![CDATA[
// Google Map Maker script v.1.1
// (c) 2006 Richard Stephenson http://www.donkeymagic.co.uk
// Email: donkeymagic@gmail.com
// http://mapmaker.donkeymagic.co.uk
var map;
var icon0;
var newpoints = new Array();
 
function addLoadEvent(func) { 
	var oldonload = window.onload; 
	if (typeof window.onload != 'function'){ 
		window.onload = func
	} else { 
		window.onload = function() {
			oldonload();
			func();
		}
	}
}
 
addLoadEvent(loadMap);
addLoadEvent(addPoints);
 
function loadMap() {
	map = new GMap2(document.getElementById("map"));
	map.addControl(new GLargeMapControl());
	map.addControl(new GMapTypeControl());
	map.setCenter(new GLatLng(<?php echo $company_row->company_map_lon;?>, <?php echo $company_row->company_map_lat;?>), 5);
	map.setMapType(G_NORMAL_MAP);
 
	icon0 = new GIcon();
	icon0.image = "http://www.google.com/mapfiles/marker.png";
	icon0.shadow = "http://www.google.com/mapfiles/shadow50.png";
	icon0.iconSize = new GSize(20, 34);
	icon0.shadowSize = new GSize(37, 34);
	icon0.iconAnchor = new GPoint(9, 34);
	icon0.infoWindowAnchor = new GPoint(9, 2);
	icon0.infoShadowAnchor = new GPoint(18, 25);
}
 
function addPoints() {
 
	newpoints[0] = new Array(<?php echo $company_row->company_map_lon;?>, <?php echo $company_row->company_map_lat;?>, icon0, '<?php echo $company_row->company_name;?>', '<?php echo $company_row->company_name;?>'); 
 
	for(var i = 0; i < newpoints.length; i++) {
		var point = new GPoint(newpoints[i][1],newpoints[i][0]);
		var popuphtml = newpoints[i][4] ;
		var marker = createMarker(point,newpoints[i][2],popuphtml);
		map.addOverlay(marker);
	}
}
 
function createMarker(point, icon, popuphtml) {
	var popuphtml = "<div id=\"popup\">" + popuphtml + "<\/div>";
	var marker = new GMarker(point, icon);
	GEvent.addListener(marker, "click", function() {
		marker.openInfoWindowHtml(popuphtml);
	});
	return marker;
}
//]]>
</script>
 


<?php
 $monUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  ?>
 <p class=infobox><br>
Here you can edit your position <br><br>
<br>
</p>
<form enctype="multipart/form-data" action="my-page-2?action=editmapos" method="POST">
<label>Map Latitude</label>
:<br/>
<input type="text" name="lat" value="<?php echo $company_row->company_map_lat;?>" /><br/>
<label>Map Langitude</label>
:<br/><input type="text" name="long" value="<?php echo $company_row->company_map_lon;?>"><br />
<input type="submit" name="submitted" value="Save">
</form>

<hr>
<div id="map" style="width:500px;height:450px"></div>
 <?php }
else
{
echo 'You must register your Company First!<br />'?>
<a href="<?php $monUrl ?>/register-step2" title="as seen by others" class="bluelink">Register Your Company</a>
<?php }
?>