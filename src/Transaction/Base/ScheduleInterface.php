<?php

namespace Exchange\Client\Transaction\Base;

use Exchange\Client\Schedule\ScheduleData;
use Exchange\Client\Schedule\ScheduleWithTransaction;

interface ScheduleInterface {

    /**
     * @return ScheduleData|ScheduleWithTransaction
     */
    public function getSchedule();

    /**
     * @param ScheduleData|ScheduleWithTransaction $schedule |null
     *
     * @return $this
     */
    public function setSchedule($schedule = null);
}