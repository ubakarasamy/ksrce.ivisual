<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class StaffApprovalResource extends Resource
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
            'staff_id' => $this->staff_id,
            'date' => $this->date,
            'approvalfor' => $this->approvalfor,
            'alterStaff' => $this->alteration_staff_name,
            'description' => $this->description,
            'department' => $this->department,
            'attempt' => $this->attempt,
            'status' => $this->status
        ];
    }
}
