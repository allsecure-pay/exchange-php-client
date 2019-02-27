<?php

namespace Asx\Client\Transaction;

use Asx\Client\Transaction\Base\AbstractTransactionWithReference;
use Asx\Client\Transaction\Base\AmountableInterface;
use Asx\Client\Transaction\Base\AmountableTrait;
use Asx\Client\Transaction\Base\ItemsInterface;
use Asx\Client\Transaction\Base\ItemsTrait;

/**
 * Capture: Charge a previously preauthorized transaction.
 *
 * @package Asx\Client\Transaction
 */
class Capture extends AbstractTransactionWithReference implements AmountableInterface, ItemsInterface {
    use AmountableTrait;
    use ItemsTrait;
}
