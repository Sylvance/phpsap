# phpsap
PHP SAP is an API gateway class that enables php developers to easily integrate SMS,Airtime and Mobile payments using MPESA into their dynamic web applications.It is very easy to get started by creating an account and grabbing an API Key.
Simpliy hit this link to get started https://renthero.co.ke/phpsap
# Getting started
1. [DOWNLOAD](https://www.google.com) our fantastic gateway class and place it in your project directoy
## Sending an sms
```php
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
```
