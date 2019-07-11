# PHP SAP - SMS, AIRTIME, PAYMENTS
PHP SAP is an API gateway class that enables php developers to easily integrate SMS,Airtime and Mobile payments using MPESA into their dynamic web applications.It is very easy to get started by creating an account and grabbing an API Key.Upon creation of an account a SAP wallet is automatically created for you,you will have to top it up with cash to start using our API to send SMS and distribute airtime.For mobile payments using MPESA a payments wallet is also automatically created for you, this is where all payments made to your application will be collected and managed.
Simply hit this link to get started https://renthero.co.ke/phpsap
# Getting started
1. [DOWNLOAD](https://github.com/ronniengoda/phpsap/blob/master/PHPSAPGateway.php) our fantastic gateway class and place it in your project directoy
## Sending SMS
> You can send SMSs from your application by making a HTTP POST request to the SMS API. For each request sent from your application, we respond with a notification back indicating whether the SMS transaction was successful or failed.
```php
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

//Set SMS Receiver(in international format for this case +254) and Message below(Required)
$Receiver="+254708344101";
$Message="i love nerds";

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
	$result=$gateway->ProcessSMS($SMSDataEncoded);
} catch (Exception $e) {
	echo $e->getMessage();
}
```
## Sending Airtime
> Your application sends Airtime by making a HTTP POST request to the airtime API. For each request sent from your application, we respond with a notification back indicating whether the airtime transaction was successful or failed.
```php
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

//Set airtime Receiver and Amount below(Required)
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
	$result=$gateway->ProcessAirtime($AirtimeDataEncoded);
} catch (Exception $e) {
	echo $e->getMessage();
}
```
## Checking Your SAP Wallet Balance
> You can send a request to out APIs to get your SAP Wallet Balance. Make sure you provide the required parameters.
```php
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

//Pass authentication into an array
$SAPWalletBalanceData = array(
	'username'=>$username,
	'apiKey'=>$apiKey
);

//Convert the array to JSON String.
$SAPWalletBalanceDataEncoded = json_encode($SAPWalletBalanceData);

//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessSAPWalletBalance($SAPWalletBalanceDataEncoded);
} catch (Exception $e) {
	echo $e->getMessage();
}
```
# Mobile Payments
> We currently support Mobile checkout/STK-PUSH,Mobile B2C and Payments Wallet Balance.Ensure you set your callback urls in the developer portal so as to get notifications from our API.Also note that all payment transaction costs will be deducted from your SAP wallet and not your Payments wallet.
## Initiating Mobile Checkout-STK PUSH
> Mobile Checkout API allows you to initiate Customer to Business (C2B) payments on a mobile subscriber’s device. This allows for a seamless checkout experience, since the client will no longer need to remember the amount or an account number to complete the transaction.
```php
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

//Set PhoneNumber and Amount below(Required)
$PhoneNumber="+254708344101";
$Amount="10";

//Set any metadata you want to attach to the request below(optional);
$LNMOmetadata = [
		"MetaData"   => "0987654321"
	];

//Pass authentication credentials and your LNMO data into an array
$LNMOData = array(
	'PhoneNumber' => $PhoneNumber,
	'Amount' => $Amount,
	'username'=>$username,
	'apiKey'=>$apiKey,
	'LNMOmetadata'=>$LNMOmetadata
);

//Convert the array into JSON string.
$LNMODataEncoded = json_encode($LNMOData);

	//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessLNMO($LNMODataEncoded);
} catch (Exception $e) {
	echo $e->getMessage();
}
```
## Initiating Mobile B2C
> Mobile Business To Consumer (B2C) APIs allow you to send payments to mobile subscribers from your Payment Wallet.
```php
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;
//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";
//Set PhoneNumber and Amount below(Required)
$PhoneNumber="+254708344101";
$Amount="10";
//Pass authentication credentials and your B2C data into an array
$B2CData = array(
	'PhoneNumber' => $PhoneNumber,
	'Amount' => $Amount,
	'username'=>$username,
	'apiKey'=>$apiKey
);
//Convert the array into JSON string.
$B2CDataEncoded = json_encode($B2CData);
	//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessB2C($B2CDataEncoded);
} catch (Exception $e) {
	echo $e->getMessage();
}
```
##Initiating Mobile B2B
> Mobile Business To Business (B2B) API allow you to send payments to businesses e.g banks from your Payment Wallet.
```php
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

// Set the destination channel,destination account and amount(Required)
$DestinationChannel ="paybill";
$DestinationAccount ="account";
$Amount="10";

//Pass authentication credentials and your B2B data into an array
$B2BData = array(
	'DestinationChannel'=>$DestinationChannel,
	'DestinationAccount' => $DestinationAccount,
	'Amount' => $Amount,
	'username'=>$username,
	'apiKey'=>$apiKey
);

//Convert the array into JSON string.
$B2BDataEncoded = json_encode($B2BData);

	//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessB2B($B2BDataEncoded);
} catch (Exception $e) {
	echo $e->getMessage();
}
```
### API Response Contents
| Parameter     | Description|
| ------------- |:-------------:|
| Category      | Category of the paymet | 
| Provider      | Payment Provider in this case MPESA|
| providerRefId | The unique ID generated by the payment provider for this transaction|
|sourceType	|The type of party that is providing the funds for this transaction|
|source		|Unique identifier of the party that is providing the funds for this transaction.|
|destinationType|Unique identifier of the party that is receiving funds in this transaction (the Credit Party).|
|destination	|Unique identifier of the party that is receiving the funds for this transaction.|
|value		|The value being exchanged in this transaction.|
|status		|The final status of this transaction. Possible values are: Success or Failed|
|description	|A detailed description of this transaction, including a more detailed failure reason in the case of failures.|
|requestMetadata|Any metadata that was sent by your application when it initiated this transaction|
|transactionDate|The date and time (according to the payment provider) when a successful transaction was completed.|

## Checking Your Payments Wallet Balance
> You can send a request to out APIs to get your Payments Wallet Balance. Make sure you provide the required parameters.
```php
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;
//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";
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
```
