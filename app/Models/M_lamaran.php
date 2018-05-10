<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_lamaran extends Model {
    protected $table = "lamaran";
    protected $primaryKey = "id_lamaran";
    const CREATED_AT = "tanggal_melamar";
    protected $fillable = ["id_lowker", 'id_pelamar', 'status_lamaran', 'tanggal_melamar'];

    public function setUpdatedAt($value){ 
    	
    }
    public function getUpdatedAtColumn(){
    	
	}
}