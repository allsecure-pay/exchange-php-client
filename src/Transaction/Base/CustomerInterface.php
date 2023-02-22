<?php

namespace Exchange\Client\Transaction\Base;
use Exchange\Client\Data\Customer;

/**
 * Interface CustomerInterface
 *
 * @package Exchange\Client\Transaction\Base
 */
interface CustomerInterface {

    /**
     * @return Customer
     */
    public function getCustomer();

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer);

}