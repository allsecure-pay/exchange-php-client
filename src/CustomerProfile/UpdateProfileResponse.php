<?php

namespace Exchange\Client\CustomerProfile;

use Exchange\Client\Json\ResponseObject;

/**
 * Class UpdateProfileResponse
 *
 * @package Exchange\Client\CustomerProfile
 *
 * @property string       $profileGuid
 * @property string       $customerIdentification
 * @property CustomerData $customer
 * @property array        $changedFields
 */
class UpdateProfileResponse extends ResponseObject {

}