<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
//ini_set('display_errors', '1');
//Route::get('/', function () {
//    return view('welcome');
//});
if (App::environment('production')) {
	URL::forceSchema('https');
}
Route::group(['middleware' => ['web']], function () {
	Route::get('/', ['as' => '/', 'uses' => 'DashboardController@index']);
	Route::get('/pilih_dosen','pilih_dosen@index');
	Route::get('/akademik','DefaultController@akademik');
	Route::get('/kegiatan_penunjang','DefaultController@kegiatan_penunjang');
	Route::post('/pilih_dosen/create','pilih_dosen@create');


// --------------------------------------------------------------
// ----------------penelitian------------------------------------
// --------------------------------------------------------------

	// route tampil data
	Route::get('/penelitian_non_dilitabmas','PenelitianController@penelitian_non_dilitabmas');
	Route::get('/penelitian_dilitabmas','PenelitianController@penelitian_dilitabmas');
	Route::get('/tampil_pen_luaran_buku','PenelitianController@tampil_pen_luaran_buku');
	Route::get('/tampil_pen_luaran_jurnal','PenelitianController@tampil_pen_luaran_jurnal');
	Route::get('/tampil_pen_luaran_pemakalah','PenelitianController@tampil_pen_luaran_pemakalah');
	Route::get('/tampil_pen_luaran_hki','PenelitianController@tampil_pen_luaran_hki');
	Route::get('/tampil_pen_luaran_lain','PenelitianController@tampil_pen_luaran_lain');
	
	// route tambah data
	Route::get('/penelitian_non_dilitabmas/tambah_non_dilitabmas','PenelitianController@tambah_non_dilitabmas');

	Route::get('/penelitian_dilitabmas/tambah_dilitabmas','PenelitianController@tambah_dilitabmas');

	Route::get('/tampil_pen_luaran_buku/tambah_non_pen_luaran_buku','PenelitianController@tambah_non_pen_luaran_buku');

	Route::get('/tampil_pen_luaran_jurnal/tambah_non_pen_luaran_jurnal','PenelitianController@tambah_non_pen_luaran_jurnal');
	Route::get('/tampil_pen_luaran_pemakalah/tambah_non_pen_luaran_pemakalah','PenelitianController@tambah_non_pen_luaran_pemakalah');
	Route::get('/tampil_pen_luaran_hki/tambah_non_pen_luaran_hki','PenelitianController@tambah_non_pen_luaran_hki');
	Route::get('/tampil_pen_luaran_lain/tambah_non_pen_luaran_lain','PenelitianController@tambah_non_pen_luaran_lain');



	Route::post('/penelitian_dilitabmas/tambah_dilitabmas','PenelitianController@tambah_dilitabmas');

	Route::post('/penelitian_non_dilitabmas/tambah_non_dilitabmas','PenelitianController@tambah_non_dilitabmas');

	Route::post('/tampil_pen_luaran_buku/tambah_non_pen_luaran_buku','PenelitianController@tambah_non_pen_luaran_buku');

	Route::post('/tampil_pen_luaran_jurnal/tambah_non_pen_luaran_jurnal','PenelitianController@tambah_non_pen_luaran_jurnal');
	Route::post('/tampil_pen_luaran_pemakalah/tambah_non_pen_luaran_pemakalah','PenelitianController@tambah_non_pen_luaran_pemakalah');
	Route::post('/tampil_pen_luaran_hki/tambah_non_pen_luaran_hki','PenelitianController@tambah_non_pen_luaran_hki');
	Route::post('/tampil_pen_luaran_lain/tambah_non_pen_luaran_lain','PenelitianController@tambah_non_pen_luaran_lain');


//lihat data
	Route::get('/penelitian_dilitabmas/lihat_dilitabmas/{id}', "PenelitianController@lihat_dilitabmas");
	Route::get('/penelitian_non_dilitabmas/lihat_non_dilitabmas/{id}', "PenelitianController@lihat_non_dilitabmas");


//route luaran
	Route::get('/{kategori}/luaran_jurnal/{id}','PenelitianController@luaran_jurnal');
	Route::get('/{kategori}/luaran_buku_ajar/{id}','PenelitianController@luaran_buku_ajar');
	Route::get('/{kategori}/luaran_pemakalah/{id}','PenelitianController@luaran_pemakalah');
	Route::get('/{kategori}/luaran_hki/{id}','PenelitianController@luaran_hki');
	Route::get('/{kategori}/luaran_lain/{id}','PenelitianController@luaran_lain');
	
	
	Route::post('/{kategori}/tambah_pen_luaran_buku/{id}','PenelitianController@tambah_pen_luaran_buku');
	Route::post('/{kategori}/tambah_pen_luaran_jurnal/{id}','PenelitianController@tambah_pen_luaran_jurnal');
	Route::post('/{kategori}/tambah_pen_luaran_pemakalah/{id}','PenelitianController@tambah_pen_luaran_pemakalah');
	Route::post('/{kategori}/tambah_pen_luaran_hki/{id}','PenelitianController@tambah_pen_luaran_hki');
	Route::post('/{kategori}/tambah_pen_luaran_lain/{id}','PenelitianController@tambah_pen_luaran_lain');

// route edit

	Route::get('/penelitian_dilitabmas/edit_dilitabmas/{id}', "PenelitianController@edit_dilitabmas");
	Route::get('/penelitian_non_dilitabmas/edit_non_dilitabmas/{id}', "PenelitianController@edit_non_dilitabmas");
	Route::get('/tampil_pen_luaran_buku/edit_pen_luaran_buku/{id}', "PenelitianController@edit_pen_luaran_buku");
	Route::get('/tampil_pen_luaran_jurnal/edit_pen_luaran_jurnal/{id}',"PenelitianController@edit_pen_luaran_jurnal");
	Route::get('/tampil_pen_luaran_hki/edit_pen_luaran_hki/{id}', "PenelitianController@edit_pen_luaran_hki");
	Route::get('/tampil_pen_luaran_pemakalah/edit_pen_luaran_pemakalah/{id}',"PenelitianController@edit_pen_luaran_pemakalah");
	Route::get('/tampil_pen_luaran_lain/edit_pen_luaran_lain/{id}', "PenelitianController@edit_pen_luaran_lain");
// route update data
	Route::post('/{kategori}/update_dilitabmas/{id}', "PenelitianController@update_dilitabmas");
	Route::post('/{kategori}/update_non_dilitabmas/{id}', "PenelitianController@update_non_dilitabmas");
	Route::post('/tampil_pen_luaran_buku/update_pen_luaran_buku','PenelitianController@update_pen_luaran_buku');
	Route::post('/tampil_pen_luaran_jurnal/update_pen_luaran_jurnal','PenelitianController@update_pen_luaran_jurnal');
	Route::post('/tampil_pen_luaran_hki/update_pen_luaran_hki','PenelitianController@update_pen_luaran_hki');
	Route::post('/tampil_pen_luaran_pemakalah/update_pen_luaran_pemakalah','PenelitianController@update_pen_luaran_pemakalah');
	Route::post('/tampil_pen_luaran_lain/update_pen_luaran_lain','PenelitianController@update_pen_luaran_lain');

// route hapus data
	Route::get('/{kategori}/hapus_dilitabmas/{id}', "PenelitianController@hapus_dilitabmas");
	Route::get('/{kategori}/hapus_non_dilitabmas/{id}', "PenelitianController@hapus_non_dilitabmas");
	Route::get('/tampil_pen_luaran_buku/hapus_buku/{id}', "PenelitianController@hapus_buku");
	Route::get('/tampil_pen_luaran_jurnal/hapus_jurnal/{id}', "PenelitianController@hapus_jurnal");
	Route::get('/tampil_pen_luaran_pemakalah/hapus_pemakalah/{id}', "PenelitianController@hapus_pemakalah");
	Route::get('/tampil_pen_luaran_hki/hapus_hki/{id}', "PenelitianController@hapus_hki");
	Route::get('/tampil_pen_luaran_lain/hapus_lain/{id}', "PenelitianController@hapus_lain");




// --------------------------------------------------------------
// ----------------pengabdian------------------------------------
// --------------------------------------------------------------

	// route tampil data
	Route::get('/pengabdian_non_dilitabmas','PengabdianController@pengabdian_non_dilitabmas');
	Route::get('/pengabdian_dilitabmas','PengabdianController@pengabdian_dilitabmas');
	Route::get('/tampil_peng_luaran_buku','PengabdianController@tampil_peng_luaran_buku');
	Route::get('/tampil_peng_luaran_jurnal','PengabdianController@tampil_peng_luaran_jurnal');
	Route::get('/tampil_peng_luaran_pemakalah','PengabdianController@tampil_peng_luaran_pemakalah');
	Route::get('/tampil_peng_luaran_hki','PengabdianController@tampil_peng_luaran_hki');
	Route::get('/tampil_peng_luaran_lain','PengabdianController@tampil_peng_luaran_lain');


	// route tambah data
	
	Route::get('/pengabdian_non_dilitabmas/tambah_peng_non_dilitabmas','PengabdianController@tambah_peng_non_dilitabmas');
	Route::get('/pengabdian_dilitabmas/tambah_peng_dilitabmas','PengabdianController@tambah_peng_dilitabmas');
	Route::get('/tampil_peng_luaran_jurnal/tambah_non_peng_luaran_jurnal','PengabdianController@tambah_non_peng_luaran_jurnal');
	Route::get('/tampil_peng_luaran_buku/tambah_non_peng_luaran_buku','PengabdianController@tambah_non_peng_luaran_buku');
	Route::get('/tampil_peng_luaran_pemakalah/tambah_non_peng_luaran_pemakalah','PengabdianController@tambah_non_peng_luaran_pemakalah');
	Route::get('/tampil_peng_luaran_hki/tambah_non_peng_luaran_hki','PengabdianController@tambah_non_peng_luaran_hki');
	Route::get('/tampil_peng_luaran_lain/tambah_non_peng_luaran_lain','PengabdianController@tambah_non_peng_luaran_lain');



	Route::post('/pengabdian_non_dilitabmas/tambah_peng_non_dilitabmas','PengabdianController@tambah_peng_non_dilitabmas');
	Route::post('/pengabdian_dilitabmas/tambah_peng_dilitabmas','PengabdianController@tambah_peng_dilitabmas');
	Route::post('/tampil_peng_luaran_buku/tambah_non_peng_luaran_buku','PengabdianController@tambah_non_peng_luaran_buku');
	Route::post('/tampil_peng_luaran_jurnal/tambah_non_peng_luaran_jurnal','PengabdianController@tambah_non_peng_luaran_jurnal');
	Route::post('/tampil_peng_luaran_pemakalah/tambah_non_peng_luaran_pemakalah','PengabdianController@tambah_non_peng_luaran_pemakalah');
	Route::post('/tampil_peng_luaran_hki/tambah_non_peng_luaran_hki','PengabdianController@tambah_non_peng_luaran_hki');
	Route::post('/tampil_peng_luaran_lain/tambah_non_peng_luaran_lain','PengabdianController@tambah_non_peng_luaran_lain');


//route lihat pengabdian
	Route::get('/pengabdian_dilitabmas/lihat_peng_dilitabmas/{id}', "PengabdianController@lihat_peng_dilitabmas");
	Route::get('/pengabdian_non_dilitabmas/lihat_peng_non_dilitabmas/{id}', "PengabdianController@lihat_peng_non_dilitabmas");


//route luaran

	Route::get('/{kategori}/luaran_jurnal_peng/{id}','PengabdianController@luaran_jurnal_peng');
	Route::get('/{kategori}/luaran_buku_ajar_peng/{id}','PengabdianController@luaran_buku_ajar_peng');
	Route::get('/{kategori}/luaran_pemakalah_peng/{id}','PengabdianController@luaran_pemakalah_peng');
	Route::get('/{kategori}/luaran_hki_peng/{id}','PengabdianController@luaran_hki_peng');
	Route::get('/{kategori}/luaran_lain_peng/{id}','PengabdianController@luaran_lain_peng');
	
	Route::post('/{kategori}/tambah_peng_luaran_buku/{id}','PengabdianController@tambah_peng_luaran_buku');
	Route::post('/{kategori}/tambah_peng_luaran_jurnal/{id}','PengabdianController@tambah_peng_luaran_jurnal');
	Route::post('/{kategori}/tambah_peng_luaran_pemakalah/{id}','PengabdianController@tambah_peng_luaran_pemakalah');
	Route::post('/{kategori}/tambah_peng_luaran_hki/{id}','PengabdianController@tambah_peng_luaran_hki');
	Route::post('/{kategori}/tambah_peng_luaran_lain/{id}','PengabdianController@tambah_peng_luaran_lain');
	

// route hapus data
	Route::get('/{kategori}/hapus_peng_dilitabmas/{id}', "PengabdianController@hapus_peng_dilitabmas");
	Route::get('/{kategori}/hapus_peng_non_dilitabmas/{id}', "PengabdianController@hapus_peng_non_dilitabmas");
	Route::get('/tampil_peng_luaran_buku/hapus_buku_peng/{id}', "PengabdianController@hapus_buku_peng");
	Route::get('/tampil_peng_luaran_jurnal/hapus_jurnal_peng/{id}', "PengabdianController@hapus_jurnal_peng");
	Route::get('/tampil_peng_luaran_pemakalah/hapus_pemakalah_peng/{id}', "PengabdianController@hapus_pemakalah_peng");
	Route::get('/tampil_peng_luaran_hki/hapus_hki_peng/{id}', "PengabdianController@hapus_hki_peng");
	Route::get('/tampil_peng_luaran_lain/hapus_lain_peng/{id}', "PengabdianController@hapus_lain_peng");


// route edit

	Route::get('/pengabdian_dilitabmas/edit_peng_dilitabmas/{id}', "PengabdianController@edit_peng_dilitabmas");
	Route::get('/pengabdian_non_dilitabmas/edit_peng_non_dilitabmas/{id}', "PengabdianController@edit_peng_non_dilitabmas");
	Route::get('/tampil_peng_luaran_buku/edit_peng_luaran_buku/{id}', "PengabdianController@edit_peng_luaran_buku");
	Route::get('/tampil_peng_luaran_jurnal/edit_peng_luaran_jurnal/{id}',"PengabdianController@edit_peng_luaran_jurnal");
	Route::get('/tampil_peng_luaran_hki/edit_peng_luaran_hki/{id}', "PengabdianController@edit_peng_luaran_hki");
	Route::get('/tampil_peng_luaran_pemakalah/edit_peng_luaran_pemakalah/{id}',"PengabdianController@edit_peng_luaran_pemakalah");
	Route::get('/tampil_peng_luaran_lain/edit_peng_luaran_lain/{id}', "PengabdianController@edit_peng_luaran_lain");

// route update data
	Route::post('/{kategori}/update_peng_dilitabmas/{id}', "PengabdianController@update_peng_dilitabmas");
	Route::post('/{kategori}/update_peng_non_dilitabmas/{id}', "PengabdianController@update_peng_non_dilitabmas");
	Route::post('/tampil_peng_luaran_buku/update_peng_luaran_buku','PengabdianController@update_peng_luaran_buku');
	Route::post('/tampil_peng_luaran_jurnal/update_peng_luaran_jurnal','PengabdianController@update_peng_luaran_jurnal');
	Route::post('/tampil_peng_luaran_hki/update_peng_luaran_hki','PengabdianController@update_peng_luaran_hki');
	Route::post('/tampil_peng_luaran_pemakalah/update_peng_luaran_pemakalah','PengabdianController@update_peng_luaran_pemakalah');
	Route::post('/tampil_peng_luaran_lain/update_peng_luaran_lain','PengabdianController@update_peng_luaran_lain');







	// get list dosen on pilih_dosen
	Route::get("/api/dosen/{id}", "DosenController@show");
	// Route::get("/api/akademik/{thaka}", "AkademikController@import_for_ajax");
	// Route::get("/api/penelitian/{tahun}", "PenelitianController@import");
	// Route::get("/api/pengabdian/{tahun}", "PengabdianController@import");
	Route::get("/api/pegawai/{keyword}", "PegawaiController@index");

	Route::get("/pilih_dosen/remove", "pilih_dosen@destroy");
	Route::get("/akademik/import", "AkademikController@import");
	Route::get("/akademik/import/{thaka}", "AkademikController@import");
	Route::post("/akademik/save_import", "AkademikController@save_import");

	Route::get("/user", "UserController@index");
	Route::post("/user/save", "UserController@store");
	Route::get("/user/status/{user_id}", "UserController@edit");
	Route::get("/user/hapus/{user_id}", "UserController@hapus");
	// Route::post("/user/simpan", "UserController@simpan");
	Route::post("/user/update", "UserController@update");

	Route::get('/servicecheck','SecurityController@check');
	Route::get('/servicelogout','SecurityController@logout');

});





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
