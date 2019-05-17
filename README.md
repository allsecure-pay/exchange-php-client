Exchange Client
==============

## Installation via composer:

```sh
composer require allsecure-pay/php-exchange
```
## Usage with test parameters:

PHP client is made having in mind the LIVE environment. If you are to test 
on a Sandbox environment, you should ammend the client as follows:

- src/Client.php to comment-out line 44 and uncomment line 45
- src/Client.php to comment-out line 68 and uncomment line 69
- src/Xml/Generator.php to comment-out line 43 and uncomment line 44


## Usage:

```php
<?php

use Exchange\Client\Client;
use Exchange\Client\Data\Customer;
use Exchange\Client\Transaction\Debit;
use Exchange\Client\Transaction\Result;

// Include the autoloader (if not already done via Composer autoloader)
require_once('path/to/initClientAutoload.php');

// Instantiate the "Exchange\Client\Client" with your credentials
$client = new Client("username", "password", "apiKey", "sharedSecret");

$customer = new Customer();
$customer->setBillingCountry("AT")
	->setEmail("customer@email.test");

$debit = new Debit();

// define your transaction ID: e.g. 'myId-'.date('Y-m-d').'-'.uniqid()
$merchantTransactionId = 'your_transaction_id'; // must be unique

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
## Get Error data:

```php
<?php

$errorData = $statusResult->getFirstError();

echo '<p>
message: ' . $errorData->getMessage() . '</br>
code: ' . $errorData->getCode() . '</br>
adapterCode: ' . $errorData->getAdapterCode() . '</br>
adapterMessage: ' . $errorData->getAdapterMessage() . '</p>';
