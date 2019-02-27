<?php

namespace Asx\Client\Transaction;

use Asx\Client\Transaction\Base\AbstractTransaction;
use Asx\Client\Transaction\Base\AddToCustomerProfileInterface;
use Asx\Client\Transaction\Base\AddToCustomerProfileTrait;
use Asx\Client\Transaction\Base\OffsiteInterface;
use Asx\Client\Transaction\Base\OffsiteTrait;
use Asx\Client\Transaction\Base\ScheduleInterface;
use Asx\Client\Transaction\Base\ScheduleTrait;

/**
 * Register: Register the customer's payment data for recurring charges.
 *
 * The registered customer payment data will be available for recurring transaction without user interaction.
 *
 * @package Asx\Client\Transaction
 */
class Register extends AbstractTransaction implements OffsiteInterface, ScheduleInterface, AddToCustomerProfileInterface {
    use OffsiteTrait;
    use ScheduleTrait;
    use AddToCustomerProfileTrait;
}
