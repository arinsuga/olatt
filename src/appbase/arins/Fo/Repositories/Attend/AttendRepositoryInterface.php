<?php

namespace Arins\Fo\Repositories\Attend;

use Arins\Repositories\Data\DataRepositoryInterface;

//Inherit interface to DataRepositoryInterface
interface AttendRepositoryInterface extends DataRepositoryInterface
{
    function getAttendanceByUserIdAndDate($parUserId, $parAttend_dt = null);
}