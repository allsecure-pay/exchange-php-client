<?php

namespace Exchange\Client\Transaction\Base;
use Exchange\Client\Data\ThreeDSecureData;

/**
 * Interface ThreeDSecureInterface
 *
 * @package Exchange\Client\Transaction\Base
 */
interface ThreeDSecureInterface {

    /**
     * @return ThreeDSecureData
     */
    public function getThreeDSecureData();

    /**
     * @param ThreeDSecureData $threeDSecureData
     *
     * @return mixed
     */
    public function setThreeDSecureData($threeDSecureData);

}