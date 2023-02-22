Exchange Client
==============

[![Packagist](https://img.shields.io/packagist/v/allsecure-pay/php-exchange.svg)](https://packagist.org/packages/allsecure-pay/php-exchange)
[![PHP Version](https://img.shields.io/packagist/php-v/allsecure-pay/php-exchange.svg)](https://packagist.org/packages/allsecure-pay/php-exchange)
[![License](https://img.shields.io/github/license/allsecure-pay/php-exchange.svg)](LICENSE)

## API Documentation:

Learn more about AllSecure Exchange platform by reading our <a href="https://asxgw.com/documentation/gateway">documentation</a>.

## Installation via composer:

### Requirements

- PHP 5.6 or newer
- Installed [Composer][composer]

### Composer

Add the ALLSECURE EXCHANGE PHP SDK to your `composer.json`.
```sh
composer require allsecure-pay/php-exchange
```
Refer to <a href="https://github.com/composer/composer/blob/master/doc/00-intro.md#introduction" alt="_new">Composer Documentation</a> if you are not familiar with composer).

## Usage with test parameters:

PHP client is made having in mind the LIVE environment. If you are to test 
on a Sandbox environment, you should ammend the client as follows:

- src/Client.php to comment-out line 46 and uncomment line 47
- src/Client.php to comment-out line 70 and uncomment line 71
- src/Xml/Generator.php to comment-out line 43 and uncomment line 44


## Usage:

### Prerequisites

- [ALLSECURE EXCHANGE] account
- API User - consisting of:
  - username, and
  - password
- Connector - consisting of:
  - API key, and
  - optional: shared secret

### Setting up credentials

Instantiate a new `Exchange\Client\Client` authenticated via your API user & password,
connecting it to a payment adapter identified by an API key and authenticated using a shared secret.

```php
<?php

use Exchange\Client\Client;
use Exchange\Client\Data\Customer;
use Exchange\Client\Transaction\Debit;
use Exchange\Client\Transaction\Result;

// Include the autoloader (if not already done via Composer autoloader)
require_once('path/to/initClientAutoload.php');

// Instantiate the "Exchange\Client\Client" with your credentials
$api_user = "your_username";
$api_password = "your_username";
$connector_api_key = "your_chosen_connector_api_key";
$connector_shared_secret = "your_generated_connector_shared_secret";
$client = new Client("username", "password", "apiKey", "sharedSecret");
### Process a debit transaction

Once you instantiated a [client with credentials](#setting-up-credentials),
you can use the instance to make transaction API calls.

```php
// define your transaction ID: e.g. 'myId-'.date('Y-m-d').'-'.uniqid()
$merchantTransactionId = 'your_transaction_id'; // must be unique

$customer = new Customer();
$customer->setBillingCountry("AT")
	->setEmail("customer@email.test");

// after the payment flow the user is redirected to the $redirectUrl
$redirectUrl = 'https://example.org/success';
// all payment state changes trigger the $callbackUrl hook
$callbackUrl = 'https://api.example.org/payment-callback';

$debit = new Debit();
$debit->setTransactionId($merchantTransactionId)
	->setSuccessUrl($redirectUrl)
	->setCancelUrl($redirectUrl)
	->setCallbackUrl($callbackUrl)
	->setAmount(10.00)
	->setCurrency('EUR')
	->setCustomer($customer);

// send the transaction
$result = $client->debit($debit);

// now handle the result
if ($result->isSuccess()) {
	//act depending on $result->getReturnType()
	
    $gatewayReferenceId = $result->getReferenceId(); //store it in your database
    
    if ($result->getReturnType() == Result::RETURN_TYPE_ERROR) {
        //error handling
        $errors = $result->getErrors();
        //cancelCart();
    
    } elseif ($result->getReturnType() == Result::RETURN_TYPE_REDIRECT) {
        //redirect the user
        header('Location: '.$result->getRedirectUrl());
        die;
        
    } elseif ($result->getReturnType() == Result::RETURN_TYPE_PENDING) {
        //payment is pending, wait for callback to complete
    
        //setCartToPending();
    
    } elseif ($result->getReturnType() == Result::RETURN_TYPE_FINISHED) {
        //payment is finished, update your cart/payment transaction
    
        //finishCart();
    }
}
```
## Status Request:

```php
<?php

use Exchange\Client\Client;
use Exchange\Client\StatusApi\StatusRequestData;

$username = 'Your Username';
$password = 'Your password';
$apiKey = 'Connector API Key';
$sharedSecret = 'Connector Shared Secret';

require_once __DIR__ . '/vendor/autoload.php';

$client = new Client($username, $password, $apiKey, $sharedSecret);

$statusRequestData = new StatusRequestData();

// use either the UUID or your merchantTransactionId but not both
//$statusRequestData->setTransactionUuid($transactionUuid);
$statusRequestData->setMerchantTransactionId($merchantTransactionId);

$statusResult = $client->sendStatusRequest($statusRequestData);

// dump all data 
var_dump($statusResult);

// dump card data
$cardData = $statusResult->getreturnData();
var_dump($cardData);

// dump & echo error data
$errorData = $statusResult->getFirstError();

echo $errorData->getMessage();
echo $errorData->getCode();
echo $errorData->getAdapterCode();
echo $errorData->getAdapterMessage();
