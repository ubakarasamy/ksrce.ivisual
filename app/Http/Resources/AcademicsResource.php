<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AcademicsResource extends Resource
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
            'academic_semester' => $this->academic_semester,
            'academic_year' => $this->academic_year,
            'staff_cl' => $this->staff_cl,
            'staff_od' => $this->staff_od,
            'staff_permission' => $this->staff_permission,
            'staff_late_register' => $this->staff_late_register
        ];
    }
}
