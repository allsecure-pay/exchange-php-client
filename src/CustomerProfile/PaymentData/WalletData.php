<?php

namespace Asx\Client\CustomerProfile\PaymentData;

/**
 * Class WalletData
 *
 * @package Asx\Client\CustomerProfile\PaymentData
 *
 * @property string $walletReferenceId
 * @property string $walletOwner
 * @property string $walletType
 */
class WalletData extends PaymentData {

    const TYPE_PAYPAL = 'paypal';

}
