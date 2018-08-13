<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class StudentResource extends Resource
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
            'name' => $this->name,
            'email' => $this->email,
            'degree' => $this->degree,
            'department' => $this->department,
            'register_no' => $this->register_no,
            'batch' => $this->batch,
            'phone' => $this->phone,
            'address' => $this->address,
            'gurdian_name' => $this->gurdian_name,
            'year' => $this->year,
            'section' => $this->section,
            'semester' => $this->semester,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'bloodGroup' => $this->bloodGroup
        ];
    }
}
