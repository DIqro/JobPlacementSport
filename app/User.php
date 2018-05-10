<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "member";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ["id"];
    // protected $fillable = ["nama", "email", "password", "alamat", "tgl_lahir", "remember_token"];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];
}
