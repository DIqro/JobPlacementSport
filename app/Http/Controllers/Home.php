<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\M_lowker;

class Home extends Controller {

	public function landingPage(){
		if(Auth::user() != null){
			$lowker = M_lowker::where('status', 'valid')->get();
			return view("home", compact("lowker"));
		} else if(Session::get('admin') != null)
			return Redirect::to('validasi-lowker');
		else
			return redirect('login');
	}

	public function index(){
		return view('login');
	}
}
