<?php 
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below
$username="sandbox";
$apiKey="api key here";

//Pass authentication into an array
$SAPWalletBalanceData = array(
	'username'=>$username,
	'apiKey'=>$apiKey
);

//Convert the array to JSON String.
$SAPWalletBalanceDataEncoded = json_encode($SAPWalletBalanceData);

//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ReceiveSAPWalletBalanceData($SAPWalletBalanceDataEncoded);
} catch (Exception $e) {
	echo $e->getMessage();
}
 ?>