<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\M_lowker;
use App\Models\M_lamaran;
use App\Models\M_member;
use App\Models\M_notifikasi;
use App\Models\M_komentar;

class Admin extends Controller {

	public function lowker_invalid(){
		$data = M_lowker::join('member', 'member.id', '=', 'lowker.id_pemilik')
							->where('status', 'invalid')
							->select('member.nama', 'lowker.*')
							->get();
        return view("admin.data-lowker", compact('data'));
	}
	
	public function terima_lowker(Request $req){
		M_lowker::where('id_lowker', $req->id_lowker)->update(['status' => 'valid']);
		return back()->with([
			'key'	=> 'sukses',
			'notif' => 'Lowker telah disetujui dan dapat dilihat semua member'
		]);
	}

	public function tolak_lowker(Request $req){
		M_lowker::where('id_lowker', $req->id_lowker)->update(['status' => 'ditolak']);
		return back()->with([
			'key'	=> 'gagal',
			'notif' => 'Lowker tidak di setujui dan masuk ke menu Lowker Tertolak'
		]);
	}

	public function lowker_valid(){
		$data = M_lowker::join('member', 'member.id', '=', 'lowker.id_pemilik')
							->where('status', 'valid')
							->select('member.nama', 'lowker.*')
							->get();
        return view("admin.data-lowker-valid", compact('data'));
	}

	public function edit_lowker(Request $req){
		$this->validate($req, [
			'judul'			=> 'required',
			'nama_lembaga'	=> 'required',
			'syarat'		=> 'required',
			'masa_berlaku'	=> 'required',
			'gaji'			=> 'required|max:10',
			'deadline'		=> 'required|date_format:"Y-m-d"',
			'alamat'		=> 'required',
			'kontak'		=> 'required',
			'kategori'		=> 'required',
			'deskripsi'		=> 'required'
		]);

		M_lowker::where('id_lowker', $req->id_lowker)->update([
			'judul'			=> $req->judul,
			'nama_lembaga'	=> $req->nama_lembaga,
			'syarat'		=> $req->syarat,
			'masa_berlaku'	=> $req->masa_berlaku,
			'gaji'			=> $req->gaji,
			'deadline'		=> $req->deadline,
			'alamat'		=> $req->alamat,
			'kontak'		=> $req->kontak,
			'kategori'		=> $req->kategori,
			'deskripsi'		=> $req->deskripsi,
			'status'		=> $req->status
		]);
		return back()->with([
			'key'	=> 'sukses',
			'notif' => 'Data Lowker telah diperbaruhi'
		]);
	}

	public function hapus_lowker(Request $req){
		M_lamaran::where('id_lowker', $req->id_lowker)->delete();
		M_notifikasi::where('id_lowker', $req->id_lowker)->delete();
		M_komentar::where('id_lowker', $req->id_lowker)->delete();
		M_lowker::destroy($req->id_lowker);
		return back()->with([
			'key'	=> 'sukses',
			'notif' => 'Lowker berhasil di hapus'
		]);
	}

	public function data_pengguna(){
		$member = M_member::all();
		return view("admin.data-pengguna", compact('member'));
	}

	public function data_pelamar(){
		$member = M_lamaran::join('member', 'member.id', '=', "lamaran.id_pelamar")
							->distinct()->get(['id_pelamar', "member.*"]);
		return view("admin.data-pelamar", compact('member'));
	}

	public function edit_pengguna(Request $req){
		if($req->email != $req->real_email)
			$this->validate($req, ["email"	=> "required|email|unique:member"]);

		$this->validate($req, [
			"nama"		=> "required|",
			"alamat"	=> "required|min:5",
			"tgl_lahir"	=> 'required|date_format:"Y-m-d"'
		]);

		M_member::where('id', $req->id_pengguna)->update([
			"nama"		=> $req->nama,
			"email"		=> $req->email,
			"alamat"	=> $req->alamat,
			"tgl_lahir"	=> $req->tgl_lahir
		]);
		
		return back()->with([
			'key'	=> 'sukses',
			'notif' => 'Data profil berhasil di update'
		]);

		return view("admin.data-pelamar", compact('member'));
	}

	public function hapus_pengguna(Request $req){
		M_komentar::where('id_komentator', $req->id_lowker)->delete();
		M_lamaran::where('id_pelamar', $req->id_member)->delete();
		M_notifikasi::where('id_penerima', $req->id_member)
						->orWhere('id_pengirim', $req->id_member)
						->delete();
		M_lowker::where('id_pemilik', $req->id_member)->delete();
		M_member::destroy($req->id_member);

		$this->rrmdir(public_path().'/members/'.$req->id_member);
		return back()->with([
			'key'	=> 'sukses',
			'notif' => 'Member berhasil di hapus'
		]);
	}

	function rrmdir($dir) { 
		if (is_dir($dir)) { 
			$objects = scandir($dir); 
			foreach ($objects as $object) { 
				if ($object != "." && $object != "..") { 
					if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
				} 
			}
			reset($objects); 
			rmdir($dir); 
		}
	}

	public function lowker_ditolak(){
		$data = M_lowker::join('member', 'member.id', '=', 'lowker.id_pemilik')
							->where('status', 'ditolak')
							->select('member.nama', 'lowker.*')
							->get();
        return view("admin.data-lowker-ditolak", compact('data'));
	}
}