<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class StaffAttendanceResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'attendanceDate' => $this->attendanceDate,
            'staff_id' => $this->staff_id,
            'dateStatus' => $this->dateStatus,
            'eid' => $this->eid,
            'year_start' => $this->year_start,
        ];
    }
}
