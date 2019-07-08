<?php 
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below
$username="username";
$apiKey="api key";

//Set PhoneNumber and Amount below
$PhoneNumber="+254708344101";
$Amount="10";

//Pass authentication credentials and your LNMO data into an array
$LNMOData = array(
	'PhoneNumber' => $PhoneNumber,
	'Amount' => $Amount,
	'username'=>$username,
	'apiKey'=>$apiKey
);

	//Convert the array into JSON string.
$LNMODataEncoded = json_encode($LNMOData);

	//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ReceiveLNMOData($LNMODataEncoded);
} catch (Exception $e) {
	echo $e->getMessage();
}