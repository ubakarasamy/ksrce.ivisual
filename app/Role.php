<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    //User Relation
    public function users()
    {
      return $this->belongsToMany(User::class);
    }
}
