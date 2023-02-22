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
 * Refund: Refund money from a previous Debit (or Capture) transaction to the customer.
 *
 * @note Preauthorized transactions can be reverted with a Void transaction, not a Refund!
 *
 * @package Exchange\Client\Transaction
 */
class Refund extends AbstractTransactionWithReference
             implements AmountableInterface,
                        ItemsInterface,
                        TransactionSplitsInterface,
                        LevelTwoAndThreeDataInterface
{
    use AmountableTrait;
    use ItemsTrait;
    use TransactionSplitsTrait;
    use LevelTwoAndThreeDataTrait;

    /** @var string */
    protected $callbackUrl;

    /** @var string */
    protected $transactionToken;

    /** @var string */
    protected $description;

    /**
     * @return string
     */
    public function getCallbackUrl() {
        return $this->callbackUrl;
    }

    /**
     * @param string $callbackUrl
     */
    public function setCallbackUrl($callbackUrl) {
        $this->callbackUrl = $callbackUrl;
    }

    /**
     * @return string
     */
    public function getTransactionToken()
    {
        return $this->transactionToken;
    }

    /**
     * @param string $transactionToken
     */
    public function setTransactionToken($transactionToken)
    {
        $this->transactionToken = $transactionToken;
    }

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