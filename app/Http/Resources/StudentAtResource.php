<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class StudentAtResource extends Resource
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
            'id' => $this->id,
            'staff_eid' => $this->staff_eid,
            'attendancedate' => $this->attendancedate,
            'day' => $this->day,
            'degree' => $this->degree,
            'semester' => $this->semester,
            'department' => $this->department,
            'year' => $this->year,
            'section' => $this->section
            
        ];
    }
}
