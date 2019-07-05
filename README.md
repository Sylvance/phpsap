# phpsap
PHP SAP is an API gateway class that enables php developers to easily integrate SMS,Airtime and Mobile payments using MPESA into their dynamic web applications.It is very easy to get started by creating an account and grabbing an API Key.Upon creation of an account a SAP wallet is automatically created for you,you will have to top it up with cash to start using our API to send SMS and distribute airtime.
Simply hit this link to get started https://renthero.co.ke/phpsap
# Getting started
1. [DOWNLOAD](https://github.com/ronniengoda/phpsap/blob/master/PHPSAPGateway.php) our fantastic gateway class and place it in your project directoy
## Sending SMS
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
## Sending Airtime
```php
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below
$username="sandbox";
$apiKey="api key here";

//Set airtime Receiver and Amount below
$Receiver="+254708344101";
$Amount="10";

//Pass authentication credentials and your airtime data into an array
$AirtimeData = array(
	'Receiver' => $Receiver,
	'Amount' => $Amount,
	'username'=>$username,
	'apiKey'=>$apiKey
);

	//Convert the array into JSON string.
$AirtimeDataEncoded = json_encode($AirtimeData);

	//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ReceiveAirtimeData($AirtimeDataEncoded);
} catch (Exception $e) {
	echo $e->getMessage();
}
```
## Checking Your SAP Wallet Balance
```php
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
```
![alt text](https://github.com/ronniengoda/phpsap/blob/master/phpsapweb.png "PHP SAP")
