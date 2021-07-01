<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\UserScocial;
use App\Traits\HasPermissions;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasPermissions;

    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function social(){
        //users -> id : id_nguoi_dung
        //user_socials -> user_id : nguoidung_id

        //user_socials -> nguoidung_id

        return $this->hasOne( UserScocial::class, 'user_id' , 'id' );
        return $this->hasOne( UserScocial::class, 'nguoidung_id' , 'id_nguoi_dung' );
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
