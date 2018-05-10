<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class M_komentar extends Model {
    use LikesTrait;
    protected $table = "komentar";
    protected $primaryKey = 'id_komentar';
    const CREATED_AT = "tgl_komen";
    protected $fillable = ["id_lowker", "id_komentator", "isi", "tgl_komen"];

    public function setUpdatedAt($value){ 
    	
    }
    public function getUpdatedAtColumn(){
    	
	}

    public function member()
    {
        return $this->belongsTo('App\Models\M_member', 'id_komentator');
    }

    public function lowker()
    {
        return $this->belongsTo('App\Models\M_lowker', 'id_lowker');
    }

}