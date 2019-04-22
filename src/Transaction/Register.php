<?php

namespace Exchange\Client\Transaction;

use Exchange\Client\Transaction\Base\AbstractTransaction;
use Exchange\Client\Transaction\Base\AddToCustomerProfileInterface;
use Exchange\Client\Transaction\Base\AddToCustomerProfileTrait;
use Exchange\Client\Transaction\Base\OffsiteInterface;
use Exchange\Client\Transaction\Base\OffsiteTrait;
use Exchange\Client\Transaction\Base\ScheduleInterface;
use Exchange\Client\Transaction\Base\ScheduleTrait;

/**
 * Register: Register the customer's payment data for recurring charges.
 *
 * The registered customer payment data will be available for recurring transaction without user interaction.
 *
 * @package Exchange\Client\Transaction
 */
class Register extends AbstractTransaction implements OffsiteInterface, ScheduleInterface, AddToCustomerProfileInterface {
    use OffsiteTrait;
    use ScheduleTrait;
    use AddToCustomerProfileTrait;
}