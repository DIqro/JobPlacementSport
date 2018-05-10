<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_notifikasi extends Model {
    protected $table = "notifikasi";
    protected $primaryKey = "id_notifikasi";
    const CREATED_AT = "waktu";
    protected $fillable = ["id_pengirim", "id_penerima", "id_lowker", "pesan", "waktu"];

    public function setUpdatedAt($value){ 
    	
    }
    public function getUpdatedAtColumn(){
    	
	}
}