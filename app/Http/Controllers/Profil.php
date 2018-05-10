<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use App\Models\M_member;
use App\Models\M_lowker;

class Profil extends Controller {

	public function index(){
        $member = M_member::find(Auth::user()->id);
        $lowker = M_lowker::where('lowker.id_pemilik', Auth::user()->id)
        		->join('member', 'member.id', '=', 'lowker.id_pemilik')
        		->select("lowker.*", "member.nama")
        		->get();
        return view('member.profil', compact("member", 'lowker'));
	}

	public function update($data){
		M_member::where('id', Auth::user()->id)->update($data);
	}

	public function update_profil(Request $req){
		if($req->email != Auth::user()->email)
			$this->validate($req, ["email"	=> "required|email|unique:member"]);

		$this->validate($req, [
			"nama"		=> "required|",
			"alamat"	=> "required|min:5",
			"tgl_lahir"	=> 'required|date_format:"Y-m-d"'
		]);

		$this->update([
			"nama"		=> $req->nama,
			"email"		=> $req->email,
			"alamat"	=> $req->alamat,
			"tgl_lahir"	=> $req->tgl_lahir
		]);
		
		return redirect('/profil')->with([
			'key'	=> 'sukses',
			'notif' => 'Data profil berhasil di update'
		]);
	}

	public function update_foto(Request $req){
		$this->validate($req, [
			'foto' => 'required|image|max:10000'
		]);

		$image = $req->file('foto');
		$destinationPath = public_path().'/members/'.Auth::user()->id;
		$image->move($destinationPath, Auth::user()->id.'.jpg');
		return back();
	}

	public function update_pw(Request $req){
		$this->validate($req, [
			"new_password"			=> "required|min:6",
			"password_confirmation"	=> "required|min:6"
		]);
		if(Hash::check($req->current_password, Auth::user()->password)){
			if($req->new_password == $req->password_confirmation){
				$this->update(["password" => bcrypt($req->new_password)]);
				return back()->with([
					'key'	=> 'sukses',
					'notif' => 'Password berhasil diganti'
				]);
			}else{
				return back()->with([
					'key'	=> 'gagal',
					'notif' => 'Pengubahan password gagal. Password baru dan konfirmasi password tidak cocok'
				]);
			}
		}else{
			return back()->with([
				'key'	=> 'gagal',
				'notif' => 'Pengubahan password gagal. Password saat ini salah'
			]);
		}
	}

	public function update_cv(Request $req){
		$this->validate($req, [
			'file_cv'	=>	'required|mimes:pdf|max:10000'
		]);

		$cv = $req->file('file_cv');
		$destinationPath = public_path().'/members/'.Auth::user()->id.'/';
		$cv->move($destinationPath, Auth::user()->id.'.pdf');

		return back()->with([
			'key'	=> 'sukses',
			'notif' => 'CV anda berhasil diperbaruhi'
		]);
	}

	public function my_cv(){
		$path = public_path().'/members/'.Auth::user()->id.'/'.Auth::user()->id.'.pdf';
		if (file_exists($path)) {
		    $content = file_get_contents($path);
		    return Response::make($content, 200, [
			    'Content-Type'			=> 'application/pdf',
			    'Content-Disposition'	=> 'inline; filename="my-cv"'
			]);
		}else
			return back();
		// return response()->file($path);
	}
}


// <!-- <li><a href="{{ route('login') }}">Login</a></li>
// <li><a href="{{ route('register') }}">Register</a></li> -->