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
$customer
    ->setFirstName('John')
    ->setLastName('Smith')
    ->setEmail('john@smith.com')
    ->setIpAddress('123.123.123.123');
//add further customer details if necessary

// define your transaction ID
// must be unique! e.g.
$merchantTransactionId = $merchantTransactionId = uniqid('myId', true) . '-' . date('YmdHis');

// define transaction relevant object
$debit = new Debit();
$debit->setMerchantTransactionId($merchantTransactionId)
    ->setAmount(9.99)
    ->setCurrency('EUR')
    ->setCallbackUrl('https://myhost.com/path/to/my/callbackHandler')
    ->setSuccessUrl('https://myhost.com/checkout/successPage')
    ->setErrorUrl('https://myhost.com/checkout/errorPage')
    ->setDescription('One pair of shoes')
    ->setCustomer($customer);

//if token acquired via payment.js
if (isset($token)) {
    $debit->setTransactionToken($token);
}

//for recurring transactions
if ($isRecurringTransaction) {
    $debit->setReferenceTransactionId($referenceIdFromFirstTransaction);
}

$result = $client->debit($debit);

// handle the result
if ($result->isSuccess()) {

    // store the uuid you receive from the gateway for future references
$gatewayReferenceId = $result->getUuid();

// handle result based on it's returnType
if ($result->getReturnType() == Result::RETURN_TYPE_ERROR) {
    //error handling
    $errors = $result->getErrors();
// handle the error
    //cancelCart();

} elseif ($result->getReturnType() == Result::RETURN_TYPE_REDIRECT) {
    //redirect the user
    header('Location: '.$result->getRedirectUrl());

} elseif ($result->getReturnType() == Result::RETURN_TYPE_PENDING) {
    //payment is pending, wait for callback to complete

// handle pending
    //setCartToPending();

} elseif ($result->getReturnType() == Result::RETURN_TYPE_FINISHED) {
    //payment is finished, update your cart/payment transaction

    //finishCart();
    }

} else{

    // handle error
    // $result->getErrorMessage()
    // $result->getErrorCode()
    // $result->getAdapterMessage()
    // $result->getAdapterCode()

}