<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission','permission_role','role_id','permisison_id');
    }
}
