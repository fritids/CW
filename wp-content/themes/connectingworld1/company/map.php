<style type="text/css">
div#popup {
background:#EFEFEF;
border:1px solid #999999;
margin:0px;
padding:7px;
width:270px;
}
</style>
 <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAkWqnnHNhJArQvg9gg1hEmBT_GlCCkqVmHltvydHq70kjj-_VxxSAiGZ3AnZiMtqxiK4LAt8vVvcuLw"
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
	map.setCenter(new GLatLng(<?php echo $_REQUEST['company_map_lat'];?>, <?php echo $_REQUEST['company_map_lon'];?>), 5);
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
 
	newpoints[0] = new Array(<?php echo $_REQUEST['company_map_lat'];?>, <?php echo $_REQUEST['company_map_lon'];?>, icon0, 'sdfsdf', 'sdfdsf'); 
 
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
<div id="map" style="width:500px;height:450px"></div>