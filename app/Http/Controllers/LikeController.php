<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Like;
use App\Models\M_lowker;
use App\Models\M_member;
use App\Models\M_komentar;
use Illuminate\Http\Request;

class LikeController extends Controller
{
 	public function like($type, $model_id){

 		$results = $this->checkType($type, $model_id);
 		$model_type = $results[0];
 		$model = $results[1];

 		// Member tidak boleh like sendiri
 		if(Auth::user()->id == $model->member->id){
 			die('0');
 		}

 		// Member hanya like satu kali
 		if($model->isLiked() == null){

 		Like::create([
 			'member_id' => Auth::user()->id,
 			'likeable_id' => $model_id,
 			'likeable_type' => $model_type
 		]);
 		}
 	}

 	public function unlike($type, $model_id){

 		$results = $this->checkType($type, $model_id);
 		$model_type = $results[0];
 		$model = $results[1];

 		// Member hanya unlike yang sudah dilike
 		if($model->isLiked()){
 			Like::where([
 				'member_id' => Auth::user()->id,
 				'likeable_id' => $model_id,
 				'likeable_type' => $model_type
 			])->delete();
 		}
 	}

 	public function checkType($type, $model_id){

 		if($type == 1){
 			$model_type = "App\Models\M_lowker";
 			$model = M_lowker::find($model_id);
 		}
 		else{
 			$model_type = "App\Models\M_komentar";
 			$model = M_komentar::find($model_id);
 		}

 		return array($model_type, $model);
 	}
}
