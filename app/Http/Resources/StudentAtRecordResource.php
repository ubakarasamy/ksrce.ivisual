<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class StudentAtRecordResource extends Resource
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
            'attendancedate' => $this->attendancedate,
            'student_id' => $this->student_id,
            'regno' => $this->regno,
            'hrspresent' => $this->hrspresent,
            'h1' => $this->h1,
            'h2' => $this->h2,
            'h3' => $this->h3,
            'h4' => $this->h4,
            'h5' => $this->h5,
            'h6' => $this->h6,
            'h7' => $this->h7,
            'h8' => $this->h8,
        ];
    }
}
