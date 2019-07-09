<?php 
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="ronniengoda";
$apiKey="z3qww3f7z27b19h2chumz1cs2uhrt8pxo574sphh1szbm59fx0poufadwgbnf9fu";

//Pass authentication into an array
$PaymentsWalletBalanceData = array(
	'username'=>$username,
	'apiKey'=>$apiKey
);

//Convert the array to JSON String.
$PaymentsWalletBalanceDataEncoded = json_encode($PaymentsWalletBalanceData);

//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessBalance($PaymentsWalletBalanceDataEncoded);
} catch (Exception $e) {
	echo $e->getMessage();
}