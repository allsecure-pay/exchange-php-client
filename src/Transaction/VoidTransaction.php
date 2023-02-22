<?php

namespace Exchange\Client\Transaction;

use Exchange\Client\Transaction\Base\AbstractTransactionWithReference;
use Exchange\Client\Transaction\Base\AmountableTrait;

/**
 * Void: Revert a previously preauthorized transaction.
 *
 * @package Exchange\Client\Transaction
 */
class VoidTransaction extends AbstractTransactionWithReference {
    use AmountableTrait;

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