<?php

namespace Arins\Fo\Repositories\Attend;

use Arins\Repositories\Data\EloquentRepository;
use Arins\Fo\Repositories\Attend\AttendRepositoryInterface;

class AttendRepository extends EloquentRepository implements AttendRepositoryInterface
{
    protected $attend;


    public function getAttendanceByUserIdAndDate($parUserId, $parAttend_dt = null)
    {

        $result = $this->data->where('user_id', $parUserId)
                   ->where('attend_dt', $parAttend_dt->toDateString())
                   ->first();

        return $result;
    }
}