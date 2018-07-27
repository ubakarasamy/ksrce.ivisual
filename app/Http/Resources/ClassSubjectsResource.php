<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ClassSubjectsResource extends Resource
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
            'degree'=> $this->degree,
            'department'=> $this->department,
            'year'=> $this->year,
            'semester'=> $this->semester,
            'section'=> $this->section,
            'last_modified'=> $this->last_modified,
            'sub1'=> $this->sub1,
            'sub2'=> $this->sub2,
            'sub3'=> $this->sub3,
            'sub4'=> $this->sub4,
            'sub5'=> $this->sub5,
            'sub6'=> $this->sub6,
            'sub7'=> $this->sub7,
            'sub8'=> $this->sub8,
            'sub9'=> $this->sub9,
            'sub10'=> $this->sub10,
            'sub11'=> $this->sub11,
            'sub12'=> $this->sub12
        ];
    }
}
