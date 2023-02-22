<?php

namespace Exchange\Client\Transaction;

use Exchange\Client\Transaction\Base\AbstractTransactionWithReference;
use Exchange\Client\Transaction\Base\AmountableInterface;
use Exchange\Client\Transaction\Base\AmountableTrait;
use Exchange\Client\Transaction\Base\CustomerInterface;
use Exchange\Client\Transaction\Base\CustomerTrait;
use Exchange\Client\Transaction\Base\IndicatorInterface;
use Exchange\Client\Transaction\Base\ItemsInterface;
use Exchange\Client\Transaction\Base\ItemsTrait;
use Exchange\Client\Transaction\Base\LevelTwoAndThreeDataInterface;
use Exchange\Client\Transaction\Base\LevelTwoAndThreeDataTrait;
use Exchange\Client\Transaction\Base\TransactionSplitsInterface;
use Exchange\Client\Transaction\Base\TransactionSplitsTrait;
use Exchange\Client\Transaction\Base\OffsiteInterface;
use Exchange\Client\Transaction\Base\OffsiteTrait;
use Exchange\Client\Transaction\Base\PayByLinkTrait;
use Exchange\Client\Transaction\Base\IndicatorTrait;

/**
 * Payout: Payout a certain amount of money to the customer. (Debits the merchant's account, Credits the customer's account)
 *
 * @package Exchange\Client\Transaction
 */
class Payout extends AbstractTransactionWithReference
             implements AmountableInterface,
                        CustomerInterface,
                        ItemsInterface,
                        OffsiteInterface,
                        TransactionSplitsInterface,
                        IndicatorInterface,
                        LevelTwoAndThreeDataInterface
{

    use AmountableTrait;
    use CustomerTrait;
    use ItemsTrait;
    use TransactionSplitsTrait;
    use OffsiteTrait;
    use PayByLinkTrait;
    use IndicatorTrait;
    use LevelTwoAndThreeDataTrait;

    /** @var string */
    protected $transactionToken;

    /** @var string */
    protected $language;

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
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

}