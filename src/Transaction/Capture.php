<?php

namespace Exchange\Client\Transaction;

use Exchange\Client\Transaction\Base\AbstractTransactionWithReference;
use Exchange\Client\Transaction\Base\AmountableInterface;
use Exchange\Client\Transaction\Base\AmountableTrait;
use Exchange\Client\Transaction\Base\ItemsInterface;
use Exchange\Client\Transaction\Base\ItemsTrait;

/**
 * Capture: Charge a previously preauthorized transaction.
 *
 * @package Exchange\Client\Transaction
 */
class Capture extends AbstractTransactionWithReference implements AmountableInterface, ItemsInterface {
    use AmountableTrait;
    use ItemsTrait;
}