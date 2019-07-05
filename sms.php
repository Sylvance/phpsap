<?php 
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below
$username="sanxbox";
$apiKey="api key here";

//Set SMS Receiver(in international format for this case +254) and Message below
$Receiver="+254708344101";
$Message="Hello there,PHP SAP Here!!";

//Pass authentication credentials and your SMS data into an array
$SMSData = array(
	'Receiver' => $Receiver,
	'Message' => $Message,
	'username'=>$username,
	'apiKey'=>$apiKey
);

	//Convert the array to JSON String.
$SMSDataEncoded = json_encode($SMSData);

	//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ReceiveSMSData($SMSDataEncoded);
} catch (Exception $e) {
	echo $e->getMessage();
}

?>