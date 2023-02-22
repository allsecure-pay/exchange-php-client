<?php

namespace Exchange\Client\Transaction;

use Exchange\Client\Transaction\Base\AbstractTransaction;
use Exchange\Client\Transaction\Base\AddToCustomerProfileInterface;
use Exchange\Client\Transaction\Base\AddToCustomerProfileTrait;
use Exchange\Client\Transaction\Base\CustomerInterface;
use Exchange\Client\Transaction\Base\CustomerTrait;
use Exchange\Client\Transaction\Base\IndicatorInterface;
use Exchange\Client\Transaction\Base\IndicatorTrait;
use Exchange\Client\Transaction\Base\LevelTwoAndThreeDataInterface;
use Exchange\Client\Transaction\Base\LevelTwoAndThreeDataTrait;
use Exchange\Client\Transaction\Base\OffsiteInterface;
use Exchange\Client\Transaction\Base\OffsiteTrait;
use Exchange\Client\Transaction\Base\PayByLinkTrait;
use Exchange\Client\Transaction\Base\ScheduleInterface;
use Exchange\Client\Transaction\Base\ScheduleTrait;
use Exchange\Client\Transaction\Base\ThreeDSecureInterface;
use Exchange\Client\Transaction\Base\ThreeDSecureTrait;

/**
 * Register: Register the customer's payment data for recurring charges.
 *
 * The registered customer payment data will be available for recurring transaction without user interaction.
 *
 * @package Exchange\Client\Transaction
 */
class Register extends AbstractTransaction
               implements AddToCustomerProfileInterface,
                          CustomerInterface,
                          OffsiteInterface,
                          ScheduleInterface,
                          ThreeDSecureInterface,
                          IndicatorInterface,
                          LevelTwoAndThreeDataInterface
{

    use AddToCustomerProfileTrait;
    use CustomerTrait;
    use OffsiteTrait;
    use ScheduleTrait;
    use ThreeDSecureTrait;
    use PayByLinkTrait;
    use IndicatorTrait;
    use LevelTwoAndThreeDataTrait;

    /** @var string */
    protected $language;

    /** @var string */
    protected $transactionToken;

    /**
     * @var string
     */
    protected $transactionIndicator;

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