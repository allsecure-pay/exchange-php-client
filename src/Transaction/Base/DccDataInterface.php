<?php

namespace Exchange\Client\Transaction\Base;

use Exchange\Client\Data\PaymentData\DccData;

interface DccDataInterface
{
    /**
     * @param bool $requestDcc
     *
     * @return $this
     */
    public function setRequestDcc($requestDcc);

    /**
     * @return bool
     */
    public function getRequestDcc();

    /**
     * @param DccData|null $dccData
     *
     * @return $this
     */
    public function setDccData($dccData);

    /**
     * @return DccData|null
     */
    public function getDccData();
}
