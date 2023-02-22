<?php

namespace Exchange\Client\Transaction;

use Exchange\Client\Transaction\Base\AbstractTransactionWithReference;

/**
 * Deregister: Cancels the registration from a previous Register call.
 *
 * @package Exchange\Client\Transaction
 */
class Deregister extends AbstractTransactionWithReference {

    /** @var string */
    protected $transactionToken;


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
        return $this;
    }

}