<?php


namespace Exchange\Client\Data\Result;

/**
 * Class ResultData
 *
 * @package Exchange\Client\Data\Result
 */
abstract class ResultData {

    /**
     * @return array
     */
    abstract public function toArray();

}