<?php

namespace Exchange\Client\Transaction\Base;

interface SurchargeInterface
{
    public function setSurchargeAmount($surchargeAmount);

    public function getSurchargeAmount();
}
