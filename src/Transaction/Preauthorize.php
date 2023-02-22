<?php

namespace Exchange\Client\Transaction;

use Exchange\Client\Transaction\Base\AbstractTransactionWithReference;
use Exchange\Client\Transaction\Base\AddToCustomerProfileInterface;
use Exchange\Client\Transaction\Base\AddToCustomerProfileTrait;
use Exchange\Client\Transaction\Base\AmountableInterface;
use Exchange\Client\Transaction\Base\AmountableTrait;
use Exchange\Client\Transaction\Base\CustomerInterface;
use Exchange\Client\Transaction\Base\CustomerTrait;
use Exchange\Client\Transaction\Base\IndicatorInterface;
use Exchange\Client\Transaction\Base\IndicatorTrait;
use Exchange\Client\Transaction\Base\ItemsInterface;
use Exchange\Client\Transaction\Base\ItemsTrait;
use Exchange\Client\Transaction\Base\LevelTwoAndThreeDataInterface;
use Exchange\Client\Transaction\Base\LevelTwoAndThreeDataTrait;
use Exchange\Client\Transaction\Base\OffsiteInterface;
use Exchange\Client\Transaction\Base\OffsiteTrait;
use Exchange\Client\Transaction\Base\PayByLinkTrait;
use Exchange\Client\Transaction\Base\DccDataInterface;
use Exchange\Client\Transaction\Base\DccDataTrait;
use Exchange\Client\Transaction\Base\ReferenceSchemeTransactionIdentifierInterface;
use Exchange\Client\Transaction\Base\ReferenceSchemeTransactionIdentifierTrait;
use Exchange\Client\Transaction\Base\ScheduleInterface;
use Exchange\Client\Transaction\Base\ScheduleTrait;
use Exchange\Client\Transaction\Base\SurchargeInterface;
use Exchange\Client\Transaction\Base\SurchargeTrait;
use Exchange\Client\Transaction\Base\TransactionSplitsInterface;
use Exchange\Client\Transaction\Base\TransactionSplitsTrait;
use Exchange\Client\Transaction\Base\ThreeDSecureInterface;
use Exchange\Client\Transaction\Base\ThreeDSecureTrait;

/**
 * Preauthorize: Reserve a certain amount, which can be captured (=charging) or voided (=revert) later on.
 *
 * @package Exchange\Client\Transaction
 */
class Preauthorize extends AbstractTransactionWithReference
                   implements AddToCustomerProfileInterface,
                              AmountableInterface,
                              CustomerInterface,
                              ItemsInterface,
                              TransactionSplitsInterface,
                              OffsiteInterface,
                              ScheduleInterface,
                              ThreeDSecureInterface,
                              IndicatorInterface,
                              DccDataInterface,
                              SurchargeInterface,
                              ReferenceSchemeTransactionIdentifierInterface,
                              LevelTwoAndThreeDataInterface
{

    use AddToCustomerProfileTrait;
    use AmountableTrait;
    use CustomerTrait;
    use ItemsTrait;
    use TransactionSplitsTrait;
    use OffsiteTrait;
    use ScheduleTrait;
    use ThreeDSecureTrait;
    use PayByLinkTrait;
    use IndicatorTrait;
    use DccDataTrait;
    use SurchargeTrait;
    use ReferenceSchemeTransactionIdentifierTrait;
    use LevelTwoAndThreeDataTrait;

    const TRANSACTION_INDICATOR_SINGLE = 'SINGLE';
    const TRANSACTION_INDICATOR_INITIAL = 'INITIAL';
    const TRANSACTION_INDICATOR_RECURRING = 'RECURRING';
    const TRANSACTION_INDICATOR_CARDONFILE = 'CARDONFILE';
    const TRANSACTION_INDICATOR_CARDONFILE_MERCHANT = 'CARDONFILE-MERCHANT-INITIATED';

    /** @var string */
    protected $transactionToken;

    /** @var bool */
    protected $withRegister = false;

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
     * @return boolean
     */
    public function isWithRegister() {
        return $this->withRegister;
    }

    /**
     * set true if you want to register a user vault together with the debit
     *
     * @param boolean $withRegister
     *
     * @return $this
     */
    public function setWithRegister($withRegister) {
        $this->withRegister = $withRegister;
        return $this;
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
