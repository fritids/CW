<?php

// Replace with your own.
$secretkey	 = '5CSa7Mt5TpFAP82C';
// Set variable values
$haystack= $_POST;
function between($haystack, $beg, $end)
{
	$start = strpos($haystack, $beg) + strlen($beg);
	$fin = strpos($haystack, $end, $start);
	$needle = substr($haystack, $start, ($fin-$start));
	return $needle;
}


$status			= $_POST["paynova_session"];   
$substatus 		= $_POST["paynova_substatus"];                         
$statusmessage 	= $_POST["paynova_statusmessage"];
$transid        = $_POST["paynova_transid"];
$orderid        = $_POST["merchant_orderid"];
$payment_method	= $_POST["payment_method"];
$card_no		= $_POST["card_no"];
$exp_date		= $_POST["exp_date"];
$approved		= $_POST["approved"];
$strChecksumRec	= $_POST["checksum"];
$orderdata      = $_POST["merchant_orderdata"];


// Create md5 checksum	
//$checksum = md5($status . $substatus . $transid . $secretkey);

// Create md5 checksum
//$checksum    = md5($merchant_id . $merchant_orderid . $pay_cents . $pay_currency . $secretkey);

// $checksum = md5($status . $substatus . $statusmessage . $orderid . $transid . $secretkey);
//if ($checksum == $strChecksumRec)
//{
	if ($status	 == "1")
	{
		sendResponse(1,"OK|OK","","",$secretkey);
		echo $card_no;
	} else
	{
		sendResponse(1,"OK|Cancel","","",$secretkey);
	} 
//} else
//{
//	sendResponse(-2,"ERROR|Checksum mismatch","","",$secretkey);
//}

function sendResponse($status, $statusmessage, $neworderid, $batchid)
{
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo "<responsemessage>";
	echo "<status>".$status."</status>";
	echo "<statusmessage>".$statusmessage."</statusmessage>";
	echo "<neworderid>".$neworderid."</neworderid>";
	echo "<batchid>".$batchid."</batchid>";
	echo "</responsemessage>";
}

?>