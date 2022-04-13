Exchange Client v3 (Json)
==============

[![Packagist](https://img.shields.io/packagist/v/allsecure-pay/php-exchange.svg)](https://packagist.org/packages/allsecure-pay/php-exchange-json)
[![PHP Version](https://img.shields.io/packagist/php-v/allsecure-pay/php-exchange.svg)](https://packagist.org/packages/allsecure-pay/php-exchange-json)
[![License](https://img.shields.io/github/license/allsecure-pay/php-exchange-json.svg)](LICENSE)

## Installation via composer:

```sh
composer require allsecure-pay/php-client-json
```

## Documentation

Learn more about AllSecure Exchange platform by reading our <a href="https://asxgw.com/documentation/gateway">documentation</a>.

## Usage:

```php
<?php

// include the autoloader
require_once('path/to/vendor/autoload.php');

use Exchange\Client\Client;
use Exchange\Client\Data\Customer;
use Exchange\Client\Transaction\Debit;
use Exchange\Client\Transaction\Result;

// instantiate the "Exchange\Client\Client" with your credentials
$client = new Client("username", "password", "apiKey", "sharedSecret");

// define relevant objects
$customer = new Customer();
$customer->setBillingCountry("AT")
         ->setEmail("customer@email.test");

// define your unique transaction ID, e.g. 
$merchantTransactionId = uniqid('myId', true) . '-' . date('YmdHis');

$debit = new Debit();
$debit->setMerchantTransactionId($merchantTransactionId)
	  ->setSuccessUrl($redirectUrl)
	  ->setCancelUrl($redirectUrl)
	  ->setCallbackUrl($callbackUrl)
	  ->setAmount(10.00)
	  ->setCurrency('EUR')
	  ->setCustomer($customer);

// send the transaction
$result = $client->debit($debit);

// handle the result
if ($result->isSuccess()) {

    // store the uuid you receive from the gateway for future references
    $gatewayReferenceId = $result->getUuid(); 
	
    // handle result based on it's returnType    
    if ($result->getReturnType() == Result::RETURN_TYPE_ERROR) {

        // read errors on error handling
        $errors = $result->getErrors();

        // handle the error
        // e.g. cancelCart();
    
    } elseif ($result->getReturnType() == Result::RETURN_TYPE_REDIRECT) {

        // redirect the user
        header('Location: '.$result->getRedirectUrl());
        
    } elseif ($result->getReturnType() == Result::RETURN_TYPE_PENDING) {
        
        // payment is pending: wait for callback to complete
    
        // handle pending
        // e.g. setCartToPending();
    
    } elseif ($result->getReturnType() == Result::RETURN_TYPE_FINISHED) {
        
        //payment is finished, update your cart/payment transaction
        // e.g. finishCart();
    }
}
```

## License

The MIT License (MIT). Please see [LICENSE](LICENSE) for more information.
