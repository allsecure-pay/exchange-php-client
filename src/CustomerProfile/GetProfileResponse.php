<?php

namespace Asx\Client\CustomerProfile;

use Asx\Client\Json\ResponseObject;

/**
 * Class GetProfileResponse
 *
 * @package Asx\Client\CustomerProfile
 *
 * @property bool $profileExists
 * @property string $profileGuid
 * @property string $customerIdentification
 * @property string $preferredMethod
 * @property CustomerData $customer
 * @property PaymentInstrument[] $paymentInstruments
 */
class GetProfileResponse extends ResponseObject {

}
