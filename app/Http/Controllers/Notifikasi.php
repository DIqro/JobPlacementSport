<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\M_member;
use App\Models\M_notifikasi;

class Notifikasi extends Controller {

	public function index(){
		$notifikasi = M_notifikasi::join('lowker', 'lowker.id_lowker', 'notifikasi.id_lowker')
							->where('id_penerima', Auth::user()->id)
							->orderBy('id_notifikasi', 'desc')
							->get();
   		return view('member.notifikasi', compact('notifikasi'));
	}
}