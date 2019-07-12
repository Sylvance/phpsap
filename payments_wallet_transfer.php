<?php
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="ronniengoda";
$apiKey="z3qww3f7z27b19h2chumz1cs2uhrt8pxo574sphh1szbm59fx0poufadwgbnf9fu";

// Set the DestinationAccountName and Amount(Required)
$DestinationAccountName ="ronniengoda";
$Amount="10";

//Pass authentication credentials and your Transfer data into an array
$WalletTransferData = array(
	'DestinationAccountName' => $DestinationAccountName,
	'Amount' => $Amount,
	'username'=>$username,
	'apiKey'=>$apiKey
);

//Convert the array into JSON string.
$WalletTransferDataEncoded = json_encode($WalletTransferData);

//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessWalletTransfer($WalletTransferDataEncoded);
} catch (Exception $e) {
	echo $e->getMessage();
}