<?php


namespace Exchange\Client\Transaction\Base;


use Exchange\Client\Data\PayByLinkData;

trait PayByLinkTrait
{
    /**
     * @var PayByLinkData
     */
    protected $payByLinkData;

    /**
     * @return PayByLinkData
     */
    public function getPayByLinkData()
    {
        return $this->payByLinkData;
    }

    /**
     * @param PayByLinkData $payByLinkData
     */
    public function setPayByLinkData($payByLinkData)
    {
        $this->payByLinkData = $payByLinkData;
    }
}
