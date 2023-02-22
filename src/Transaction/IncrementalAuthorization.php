<?php

namespace Exchange\Client\Transaction;

use Exchange\Client\Transaction\Base\AbstractTransactionWithReference;
use Exchange\Client\Transaction\Base\AmountableInterface;
use Exchange\Client\Transaction\Base\AmountableTrait;
use Exchange\Client\Transaction\Base\IndicatorInterface;
use Exchange\Client\Transaction\Base\IndicatorTrait;
use Exchange\Client\Transaction\Base\ItemsInterface;
use Exchange\Client\Transaction\Base\ItemsTrait;
use Exchange\Client\Transaction\Base\LevelTwoAndThreeDataInterface;
use Exchange\Client\Transaction\Base\LevelTwoAndThreeDataTrait;
use Exchange\Client\Transaction\Base\OffsiteInterface;
use Exchange\Client\Transaction\Base\OffsiteTrait;

/**
 * Class Preauthorize
 * @package ExchangeV2\Transaction
 */
class IncrementalAuthorization extends AbstractTransactionWithReference
                               implements   AmountableInterface,
                                            OffsiteInterface,
                                            ItemsInterface,
                                            IndicatorInterface,
                                            LevelTwoAndThreeDataInterface
{
    use OffsiteTrait;
    use AmountableTrait;
    use ItemsTrait;
    use IndicatorTrait;
    use LevelTwoAndThreeDataTrait;

    /**
     * @return string
     */
    public function getTransactionMethod() {
        return self::TRANSACTION_METHOD_INCREMENTAL_AUTHORIZATION;
    }
}
