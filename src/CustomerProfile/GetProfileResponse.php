<?php

namespace Exchange\Client\CustomerProfile;

use Exchange\Client\Json\ResponseObject;

/**
 * Class GetProfileResponse
 *
 * @package Exchange\Client\CustomerProfile
 *
 * @property bool                $profileExists
 * @property string              $profileGuid
 * @property string              $customerIdentification
 * @property string              $preferredMethod
 * @property CustomerData        $customer
 * @property PaymentInstrument[] $paymentInstruments
 */
class GetProfileResponse extends ResponseObject {

}