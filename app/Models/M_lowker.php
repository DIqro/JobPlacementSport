<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class M_lowker extends Model {
    use LikesTrait;
    protected $table = "lowker";
    protected $primaryKey = "id_lowker";
    const CREATED_AT = "tgl_post";
    protected $fillable = ["id_pemilik", 'judul', "nama_lembaga", "kategori", "syarat", "masa_berlaku", "gaji", 'deadline', 'alamat', 'kontak', 'deskripsi', 'status', 'tgl_post'];

    public function setUpdatedAt($value){ 
    	
    }
    public function getUpdatedAtColumn(){
    	
	}

    public function member()
    {
        return $this->belongsTo('App\Models\M_member', 'id_pemilik');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\M_komentar');
    }

}