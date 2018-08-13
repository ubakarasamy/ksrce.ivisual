<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class StudentOverResource extends Resource
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
            'student_id' => $this->student_id,
            'mon1' => $this->mon1,
            'mon2' => $this->mon2,
            'mon3' => $this->mon3,
            'mon4' => $this->mon4,
            'mon5' => $this->mon5,
            'mon6' => $this->mon6,
            'mon7' => $this->mon7,
            'tue1' => $this->tue1,
            'tue2' => $this->tue2,
            'tue3' => $this->tue3,
            'tue4' => $this->tue4,
            'tue5' => $this->tue5,
            'tue6' => $this->tue6,
            'tue7' => $this->tue7,
            'wed1' => $this->wed1,
            'wed2' => $this->wed2,
            'wed3' => $this->wed3,
            'wed4' => $this->wed4,
            'wed5' => $this->wed5,
            'wed6' => $this->wed6,
            'wed7' => $this->wed7,
            'thu1' => $this->thu1,
            'thu2' => $this->thu2,
            'thu3' => $this->thu3,
            'thu4' => $this->thu4,
            'thu5' => $this->thu5,
            'thu6' => $this->thu6,
            'thu7' => $this->thu7,
            'fri1' => $this->fri1,
            'fri2' => $this->fri2,
            'fri3' => $this->fri3,
            'fri4' => $this->fri4,
            'fri5' => $this->fri5,
            'fri6' => $this->fri6,
            'fri7' => $this->fri7
        ];
        }
}
