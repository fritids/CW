<?php
// Replace with your own.

$secretkey	 = '5CSa7Mt5TpFAP82C';
// Set variable values
$status			=  urlencode ($_POST["paynova_session"]);   
$substatus 		= $_POST["paynova_substatus"];                         
$statusmessage 	= $_POST["paynova_statusmessage"];
$transid        = $_POST["paynova_transid"];
$orderid        = $_POST["merchant_orderid"];
$payment_method	= $_POST["payment_method"];
$orderdata      =  urlencode($_POST["merchant_orderdata"]);

echo 'result <br />';
print_r ($_POST);
echo $_POST["paynova_session"];


?>
 