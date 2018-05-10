<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\M_member;
use App\Models\M_admin;

class Login extends Controller {

	public function login(Request $req){
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password]))
			return Redirect::to("/");
		else
			return back()->with("notif", "Email atau password yang anda masukkan salah");
	}

	public function login_admin(Request $req){
		$admin = M_admin::where(["email" => $req->email])->first();

	    if(count($admin) == 1 && Hash::check($req->password, $admin->password)) {
			Session::put('admin', $admin->id_admin);
			Session::put('nama', $admin->nama);
			return Redirect::to("/");
		}
		return back()->with("notif", "Email atau password yang anda masukkan salah");
	}

	public function register(Request $req){
		$this->validate($req, [
			"name"		=> "required|",
			"email"		=> "required|email|unique:member",
			"alamat"	=> "required|min:5",
			"tgl_lahir"	=> 'required|date_format:"Y-m-d"',
			"password"	=> "required|confirmed|min:6",
			"password_confirmation" => "required|same:password"
		]);

		M_member::create([
			"nama"		=> $req->name,
			"email"		=> $req->email,
			"alamat"	=> $req->alamat,
			"tgl_lahir"	=> $req->tgl_lahir,
			"password"	=> bcrypt($req->password)
		]);
		$me = M_member::where('email', $req->email)->first();
		mkdir(public_path().'/members/'.$me->id);

		return back()->with("terdaftar", "Akun anda berhasil dibuat. Silahkan login");
	}    

	public function logout(){
		Auth::logout();
		return Redirect::to("/");
	}

	public function logout_admin(){
		session()->flush();
		return Redirect::to('/');
	}
}






// <!-- <li><a href="{{ route('login') }}">Login</a></li>
// <li><a href="{{ route('register') }}">Register</a></li> -->


// INSERT INTO `lowker` (`id`, `id_pemilik`, `judul`, `nama_lembaga`, `kategori`, `syarat`, `masa_berlaku`, `gaji`, `deadline`, `alamat`, `kontak`, `deskripsi`, `status`, `tgl_post`) VALUES (NULL, '1', 'Dicari pelatih badminton', '-', 'Pelatih', 'bisa ini, itu, dan lain lain', 'sampai kapanpun', '10000', '2017-11-15', 'Jln. kehidupan 48', '0844494294 (momod)', 'pekerjaan ini. . .', 'valid', '0000-00-00 00:00:00.000000');