<?php
if(isset($_POST["rating"])) {
	$rating = $_POST["rating"];
	$xml = "<ratings><average>" . mt_rand( 1, 5 ) . "</average><count>" . mt_rand( 100, 1000 ) . "</count></ratings>";
	header('Content-type: text/xml'); 
	echo $xml;
}

?>
