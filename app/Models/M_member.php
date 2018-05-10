<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class M_member extends Model implements Authenticatable{
    use AuthenticableTrait;
    protected $table = "member";
    public $timestamps = false;
    protected $fillable = ["nama", "email", "password", "alamat", "tgl_lahir", "remember_token"];

    public function jobs()
    {
        return $this->hasMany('App\Models\M_lowker');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\M_komentar');
    }
}