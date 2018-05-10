<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

	protected $fillable = ['member_id', 'likeable_id', 'likeable_type'];
	public $timestamps = true;

    public function likeable(){
    	return $this->morphTo();
    }
}
