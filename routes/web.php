<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'App\Http\Middleware\CheckDay'], function(){
	Route::get('/', "Home@landingPage");
	Route::get('/login', "Home@index");
	Route::get('/registrasi', function(){
		return view('register');
	});
	Route::post('/register', "Login@register");
	Route::post('/masuk', "Login@login");
	Route::get('/login-admin', function() {
		return view('admin.login-admin');
	});
	Route::post('/login-admin', "Login@login_admin");


	Route::group(['middleware' => 'App\Http\Middleware\Member'], function(){
		Route::get("/profil", "Profil@index");
		Route::get("/profil/my-cv", "Profil@my_cv");
		Route::post("/update-profil", "Profil@update_profil");
		Route::post("/update-pw", "Profil@update_pw");
		Route::post("/update-foto", "Profil@update_foto");
		Route::post("/update-cv", "Profil@update_cv");

		Route::get("/lowker/tambah-lowker", function(){
			return view('member.tambah-lowker');
		});
		Route::post("/lowker/tambah-lowker", 'Lowker@simpan_lowker');
		Route::post("/lowker/lamar", "Lowker@lamar_kerja");
		Route::post("/lowker/komentari", "Lowker@komentari");
		Route::get("/simpan-lowker/{id}", "Lowker@cetak_pdf");
		Route::any("/lowker/{id}/pelamar", "Lowker@semua_pelamar");
		Route::any("/lowker/pelamar/lolos", "Lowker@lolos");
		Route::any("/lowker/pelamar/tidak-lolos", "Lowker@tidak_lolos");
		Route::post("/lowker/cv-pelamar/{id_pelamar}", "Lowker@cv_pelamar");
		Route::get("/lowker/{id}", "Lowker@one_lowker");
		Route::get('/like/{type}/{model}', 'LikeController@like');
		Route::get('/unlike/{type}/{model}', 'LikeController@unlike');

		Route::get('/notifikasi', 'Notifikasi@index');
		Route::post('/keluar', "Login@logout");
	});

	Route::group(['middleware' => 'App\Http\Middleware\Admin'], function(){
		Route::get("/validasi-lowker", "Admin@lowker_invalid");
		Route::post("/admin/terima-lowker", "Admin@terima_lowker");
		Route::post("/admin/tolak-lowker", "Admin@tolak_lowker");
		Route::get("/data-lowker-valid", "Admin@lowker_valid");
		Route::post("/admin/edit-lowker", "Admin@edit_lowker");
		Route::post("/admin/edit-pegguna", "Admin@edit_pengguna");
		Route::post("/admin/hapus-pengguna", "Admin@hapus_pengguna");
		Route::post("/admin/hapus-lowker", "Admin@hapus_lowker");
		Route::get("/data-pengguna", "Admin@data_pengguna");
		Route::get("/data-pelamar", "Admin@data_pelamar");
		Route::get("/lowker-ditolak", "Admin@lowker_ditolak");
		Route::get('/keluar-admin', "Login@logout_admin");
	});
});


Route::get("/faker", "Lowker@faker");

Route::any('{catchall}', function() {
	return Response::view('404', array(), 404);
})->where('catchall', '.*');

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
// Route::post("/lowker/validasi-lowker", "Admin@validasi_lowker");