<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

trait LikesTrait
{
    public function likes(){
        return $this->morphMany('App\Models\Like', 'likeable');
    }

    public function isLiked(){
        return $this->likes->where('member_id', Auth::user()->id)->count();
    }
}
