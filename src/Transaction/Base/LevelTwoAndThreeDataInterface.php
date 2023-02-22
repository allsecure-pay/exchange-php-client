<?php

namespace Exchange\Client\Transaction\Base;

/**
 * Interface LevelTwoAndThreeDataInterface
 *
 * @package Exchange\Client\Transaction\Base
 */
interface LevelTwoAndThreeDataInterface {
    /**
     * @param array $l2l3Data
     * @return void
     */
    public function setL2L3Data($l2l3Data);

    /**
     * @return array
     */
    public function getL2L3Data();
}
