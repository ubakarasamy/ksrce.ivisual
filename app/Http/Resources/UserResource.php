<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\User;

class UserResource extends Resource
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
            'department' => $this->department,
            'occupation' => $this->role,
            'mojoined' => $this->mojoined,
            'eid' => $this->eid,
            'profile_url' => $this->profile_url,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
