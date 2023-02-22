<?php

namespace Exchange\Client\Transaction;

use Exchange\Client\Transaction\Base\AbstractTransactionWithReference;
use Exchange\Client\Transaction\Base\AmountableInterface;
use Exchange\Client\Transaction\Base\AmountableTrait;
use Exchange\Client\Transaction\Base\ItemsInterface;
use Exchange\Client\Transaction\Base\ItemsTrait;
use Exchange\Client\Transaction\Base\LevelTwoAndThreeDataInterface;
use Exchange\Client\Transaction\Base\LevelTwoAndThreeDataTrait;
use Exchange\Client\Transaction\Base\TransactionSplitsInterface;
use Exchange\Client\Transaction\Base\TransactionSplitsTrait;

/**
 * Capture: Charge a previously preauthorized transaction.
 *
 * @package Exchange\Client\Transaction
 */
class Capture extends AbstractTransactionWithReference
              implements    AmountableInterface,
                            ItemsInterface,
                            TransactionSplitsInterface,
                            LevelTwoAndThreeDataInterface
{
    use AmountableTrait;
    use ItemsTrait;
    use TransactionSplitsTrait;
    use LevelTwoAndThreeDataTrait;

    /** @var string */
    protected $description;

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }
}