<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class UserScocial extends Model
{
    use HasFactory;

    protected $table = 'user_socials';

    public function nguoi_dung(){
        return $this->belongsTo( User::class ,'user_id','id' );
    }
}
