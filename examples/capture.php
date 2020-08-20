<?php

use PaymentGateway\Client\Client;
use PaymentGateway\Client\Transaction\Capture;
use PaymentGateway\Client\Transaction\Result;

require_once('../initClientAutoload.php');


$client = new Client('username', 'password', 'apiKey', 'sharedSecret', 'language');

// define your transaction ID: e.g. 'myId-'.date('Y-m-d').'-'.uniqid()
$merchantTransactionId = 'C-Test-'.date('Y-m-d').'-'.uniqid(); // must be unique

$capture = new Capture();
$capture
 ->setTransactionId($merchantTransactionId)
 ->setAmount(4.99)
 ->setCurrency('EUR')
 ->setReferenceTransactionId($_POST["RefTranId"]);

$result = $client->capture($capture);


$gatewayReferenceId = $result->getReferenceId(); //store it in your database

if ($result->getReturnType() == Result::RETURN_TYPE_ERROR) {
    //error handling example
    $error = $result->getFirstError();
    $outError = array();
    $outError ["message"] = $error->getMessage();
    $outError ["code"] = $error->getCode();
    $outError ["adapterCode"] = $error->getAdapterCode();
    $outError ["adapterMessage"] = $error->getAdapterMessage();
    header("Location: https://YourDomain/PaymentNOK.php?" . http_build_query($outError));
    die;
} elseif ($result->getReturnType() == Result::RETURN_TYPE_REDIRECT) { 
    //redirect the user
    header('Location: '.$result->getRedirectUrl());
    die;
} elseif ($result->getReturnType() == Result::RETURN_TYPE_PENDING) {
    //payment is pending, wait for callback to complete

    //setCartToPending();

} elseif ($result->getReturnType() == Result::RETURN_TYPE_FINISHED) {
    //payment is finished, update your cart/payment transaction
    
    header("Location: https://YourDomain/PaymentOK.php?" . http_build_query($result->toArray()));
    die;
    //finishCart();
}      
