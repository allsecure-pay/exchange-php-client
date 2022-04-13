<?php

namespace Exchange\Client\Transaction\Base;

use Exchange\Client\Schedule\ScheduleData;
use Exchange\Client\Schedule\ScheduleWithTransaction;

/**
 * Trait ScheduleTrait
 *
 * @package Exchange\Client\Transaction\Base
 */
trait ScheduleTrait {

    /**
     * @var ScheduleWithTransaction
     */
    protected $schedule;

    /**
     * ScheduleResultData for backward compatibility
     *
     * @return ScheduleData|ScheduleWithTransaction
     */
    public function getSchedule() {
        return $this->schedule;
    }

    /**
     * ScheduleResultData for backward compatibility
     *
     * @param ScheduleData|ScheduleWithTransaction $schedule
     *
     * @return $this
     */
    public function setSchedule($schedule = null) {
        $this->schedule = $schedule;

        return $this;
    }

}