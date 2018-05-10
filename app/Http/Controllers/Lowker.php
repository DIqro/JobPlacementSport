<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use App\Models\M_lowker;
use App\Models\M_komentar;
use App\Models\M_lamaran;
use App\Models\M_notifikasi;
use Fpdf;
use Faker\Factory as Faker;

class Lowker extends Controller {

	public function faker(){

		$faker = Faker::create('id_ID');
        for ($i = 0; $i  < 10 ; $i ++) { 
        	echo '<br>'; echo $faker->company;
        	echo '<br>'; echo $faker->address;
        	echo '<br>'; echo $faker->e164PhoneNumber;
        	echo '<br>'; echo $faker->text;
        	echo '<br>'; echo $faker->numberBetween($min = 10000, $max = 900000);
        	echo '<br>'; echo "". $faker->dateTime($max = 'now', $timezone = date_default_timezone_get())->format('Y-m-d H:i:s');
        	echo '<br>'; echo $faker->randomElement($array = array ('pelatih','veteran', 'atlet')); echo '<br>';
        }
	} 

	public function cetak_pdf($id){
		$data = M_lowker::join('member', 'member.id', '=', 'lowker.id_pemilik')
							->where('lowker.id_lowker', $id)
							->first();

		require public_path('fpdf/fpdf.php');
		$pdf = new FPDF('P','mm','A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 14);

		$pdf->Cell(0, 10, "Informasi Lowker", 0, "", "C");
		$pdf->Ln(); $pdf->Ln();

        $info = array('Judul', 'Nama Pemilik', 'Nama Lembaga', 'Kategori', 'Syarat', 'Masa Berlaku', 'Gaji', 'Deadline', 'Alamat', 'Kontak', 'Deskripsi', 'Dipost');
        $kolom = array('judul', 'nama', 'nama_lembaga', 'kategori', 'syarat', 'masa_berlaku', 'gaji', 'deadline', 'alamat', 'kontak', 'deskripsi', 'tgl_post', 'id_lowker');

        $pdf->SetFont('Arial', '', 11);
        for ($i = 0; $i < count($info); $i++) {
        
			$pdf->Write(5, $info[$i]);
			$pdf->SetX(50);

			$temp = $kolom[$i];
			$tot_text = strlen($data->$temp);
			$length = 80; 
			$loop = $tot_text / $length;

			if($tot_text > $length){
				for ($j = 1; $j <= $loop; $j++) {

					$temp3 = $kolom[$i];
					$pdf->Write('5', substr($data->$temp3, ($length * $j) - $length, ($length * $j) ));
		            $pdf->Ln();
					$pdf->SetX(50);
				}
			}else{
				$temp2 = $kolom[$i];
				$pdf->Write('5', $data->$temp2);
			}
            $pdf->Ln();
        }
        $pdf->Write('5', 'Link Lowker');
        $pdf->SetX(50);
        $pdf->SetTextColor(0, 0, 255);
        $pdf->SetFont('Arial', 'I', 11);
        $pdf->Write('5', "http://127.0.0.1:8000/lowker/$data->id_lowker");
		$pdf->Output();
		exit;
	}

	public function one_lowker($id){
		$data = M_lowker::join('member', 'member.id', '=', 'lowker.id_pemilik')
							->where('lowker.id_lowker', $id)
							->select('member.nama', 'lowker.*')
							->first();
		if($data == null)
			return view('404');
		$komentar = M_komentar::join('member', 'komentar.id_komentator', '=', 'member.id')
						->where('id_lowker', $id)
						->orderBy('id_komentar', 'asc')
						->get();
		$total_melamar = M_lamaran::where([
							'id_lowker'	=> $id,
							'id_pelamar'=> Auth::id()
						])->count();
        return view("member.lowker", compact('data', 'komentar', 'total_melamar'));
	}

	public function komentari(Request $req){
		$this->validate($req, [
			'komentar' => 'required|min:2'
		]);

		M_komentar::create([
			'id_lowker'		=> $req->id_lowker,
			'id_komentator'	=> Auth::user()->id,
			'isi'			=> $req->komentar
		]);

		return back();
	}

	public function simpan_lowker(Request $req){
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
		M_lowker::create([
			'id_pemilik'	=> Auth::user()->id,
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
			'status'		=> 'invalid'
		]);
		return redirect('/lowker/tambah-lowker')->with('terdaftar', 'Lowker berhasil ditambahkan dan sedang menunggu validasi Admin');
	}

	public function lamar_kerja(Request $req){
		$id = Auth::user()->id;
		if(!file_exists(public_path("members/$id/$id.pdf")))
			return back()->with([
				'key'	=> 'gagal',
				'notif' => 'Gagal Melamar pekerjaan. Anda belum mengunggah file CV. Silahkan menuju menu profil anda.'
			]);
		M_lamaran::create([
			'id_lowker'		=> $req->id_lowker,
			'id_pelamar'	=> Auth::user()->id,
			'status_lamaran'=> 'proses'
		]);
		return back()->with([
			'key'	=> 'sukses',
			'notif' => 'Lamaran anda terkirim dan sedang menunggu keputusan pemilik'
		]);
	}

	public function semua_pelamar($id){
		$lamaran = M_lamaran::join('lowker', 'lamaran.id_lowker', '=', 'lowker.id_lowker')
				->join('member', 'lamaran.id_pelamar', '=', 'member.id')
				->where('lamaran.id_lowker', $id)
				->get();
		return view('member.seleksi-pelamar', compact('lamaran'));
		dd($lamaran);
	}

	public function cv_pelamar($id_pelamar){
		$path = public_path().'/members/'.$id_pelamar.'/'.$id_pelamar.'.pdf';
		if (file_exists($path)) {
		    $content = file_get_contents($path);
		    return Response::make($content, 200, [
			    'Content-Type'			=> 'application/pdf',
			    'Content-Disposition'	=> 'inline; filename="cv-pelamar-'.$id_pelamar.'.pdf"'
			]);
		}else
			return back();
	}

	public function lolos(Request $req){
		M_lamaran::where('id_lamaran', $req->id_lamaran)
				->update([
					'status_lamaran' => 'lolos'
		]);
		M_notifikasi::create([
			"id_pengirim"	=>	Auth::id(),
			"id_penerima"	=>	$req->id_pelamar,
			"id_lowker"		=>	$req->id_lowker,
			"pesan"			=>	'lolos',
		]);
		return back()->with([
			'key'	=> 'sukses',
			'notif' => 'Lamaran tersebut lolos dan dapat dilihat pada menu Pelamar Lolos'
		]);
	}

	public function tidak_lolos(Request $req){
		M_lamaran::where('id_lamaran', $req->id_lamaran)
				->update([
					'status_lamaran' => 'tidak lolos'
		]);
		M_notifikasi::create([
			"id_pengirim"	=>	Auth::id(),
			"id_penerima"	=>	$req->id_pelamar,
			"id_lowker"		=>	$req->id_lowker,
			"pesan"			=>	'tidak lolos',
		]);
		return back()->with([
			'key'	=> 'gagal',
			'notif' => 'Lamaran tersebut gagal dan dapat dilihat pada menu Pelamar Tidak Lolos'
		]);
	}
}