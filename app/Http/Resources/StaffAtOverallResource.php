<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class StaffAtOverallResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'staff_id' => $this->staff_id,
            'present' => $this->present,
            'absent' => $this->absent,
            'cl' => $this->cl,
            'cpl' => $this->cpl,
            'pp' => $this->pp,
            'pl' => $this->pl,
            'od' => $this->od,
            'sod' => $this->sod

        ];
    }
}
