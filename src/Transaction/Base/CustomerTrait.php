<?php

namespace Exchange\Client\Transaction\Base;

use Exchange\Client\Data\CreditCardCustomer;
use Exchange\Client\Data\Customer;
use Exchange\Client\Data\IbanCustomer;

/**
 * Class ThreeDSecureTrait
 *
 * @package Exchange\Client\Transaction\Base
 */
trait CustomerTrait {

    /** @var Customer */
    protected $customer;

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * with backward compatibility for IbanCustomer/CreditCardCustomer
     * @param IbanCustomer|CreditCardCustomer|Customer $customer
     *
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

}