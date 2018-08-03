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
	
	// route tambah data
	Route::get('/{kategori}/tambah_non_dilitabmas','PenelitianController@tambah_non_dilitabmas');
	Route::get('/{kategori}/tambah_dilitabmas','PenelitianController@tambah_dilitabmas');
	
	Route::post('/{kategori}/tambah_dilitabmas','PenelitianController@tambah_dilitabmas');
	Route::post('/{kategori}/tambah_non_dilitabmas','PenelitianController@tambah_non_dilitabmas');

// route edit

	Route::get('/{kategori}/edit_dilitabmas/{id}', "PenelitianController@edit_dilitabmas");
	Route::get('/{kategori}/edit_non_dilitabmas/{id}', "PenelitianController@edit_non_dilitabmas");



//route luaran
	Route::get('/{kategori}/luaran_jurnal/{id}','PenelitianController@luaran_jurnal');
	Route::get('/{kategori}/luaran_buku_ajar/{id}','PenelitianController@luaran_buku_ajar');
	Route::get('/{kategori}/luaran_pemakalah/{id}','PenelitianController@luaran_pemakalah');
	Route::get('/{kategori}/luaran_hki/{id}','PenelitianController@luaran_hki');
	Route::get('/{kategori}/luaran_lain/{id}','PenelitianController@luaran_lain');
	
	Route::post('/{kategori}/luaran_jurnal/{id}','PenelitianController@luaran_jurnal');
	Route::post('/{kategori}/luaran_buku_ajar/{id}','PenelitianController@luaran_buku_ajar');
	Route::post('/{kategori}/luaran_pemakalah/{id}','PenelitianController@luaran_pemakalah');
	Route::post('/{kategori}/luaran_hki/{id}','PenelitianController@luaran_hki');
	Route::post('/{kategori}/luaran_lain/{id}','PenelitianController@luaran_lain');

// route update data
	Route::post('/{kategori}/update_dilitabmas/{id}', "PenelitianController@update_dilitabmas");
	Route::post('/{kategori}/update_non_dilitabmas/{id}', "PenelitianController@update_non_dilitabmas");

// route hapus data
	Route::get('/{kategori}/hapus_dilitabmas/{id}', "PenelitianController@hapus_dilitabmas");
	Route::get('/{kategori}/hapus_non_dilitabmas/{id}', "PenelitianController@hapus_non_dilitabmas");



// --------------------------------------------------------------
// ----------------pengabdian------------------------------------
// --------------------------------------------------------------

	// route tampil data
	Route::get('/pengabdian_non_dilitabmas','PengabdianController@pengabdian_non_dilitabmas');
	Route::get('/pengabdian_dilitabmas','PengabdianController@pengabdian_dilitabmas');

	// route tambah data
	Route::get('/{kategori}/tambah_peng_dilitabmas','PengabdianController@tambah_peng_dilitabmas');
	Route::post('/{kategori}/tambah_peng_dilitabmas','PengabdianController@tambah_peng_dilitabmas');
	Route::get('/{kategori}/tambah_peng_non_dilitabmas','PengabdianController@tambah_peng_non_dilitabmas');
	Route::post('/{kategori}/tambah_peng_non_dilitabmas','PengabdianController@tambah_peng_non_dilitabmas');


// route edit

	Route::get('/{kategori}/edit_peng_dilitabmas/{id}', "PengabdianController@edit_peng_dilitabmas");
	Route::get('/{kategori}/edit_peng_non_dilitabmas/{id}', "PengabdianController@edit_peng_non_dilitabmas");



//route luaran
	Route::get('/{kategori}/luaran_jurnal_peng/{id}','PengabdianController@luaran_jurnal_peng');
	Route::get('/{kategori}/luaran_buku_ajar_peng/{id}','PengabdianController@luaran_buku_ajar_peng');
	Route::get('/{kategori}/luaran_pemakalah_peng/{id}','PengabdianController@luaran_pemakalah_peng');
	Route::get('/{kategori}/luaran_hki_peng/{id}','PengabdianController@luaran_hki_peng');
	Route::get('/{kategori}/luaran_lain_peng/{id}','PengabdianController@luaran_lain_peng');
	
	Route::post('/{kategori}/luaran_jurnal_peng/{id}','PengabdianController@luaran_jurnal_peng');
	Route::post('/{kategori}/luaran_buku_ajar_peng/{id}','PengabdianController@luaran_buku_ajar_peng');
	Route::post('/{kategori}/luaran_pemakalah_peng/{id}','PengabdianController@luaran_pemakalah_peng');
	Route::post('/{kategori}/luaran_hki_peng/{id}','PengabdianController@luaran_hki_peng');
	Route::post('/{kategori}/luaran_lain_peng/{id}','PengabdianController@luaran_lain_peng');


// route update data
	Route::post('/{kategori}/update_peng_dilitabmas/{id}', "PengabdianController@update_peng_dilitabmas");
	Route::post('/{kategori}/update_peng_non_dilitabmas/{id}', "PengabdianController@update_peng_non_dilitabmas");

// route hapus data
	Route::get('/{kategori}/hapus_peng_dilitabmas/{id}', "PengabdianController@hapus_peng_dilitabmas");
	Route::get('/{kategori}/hapus_peng_non_dilitabmas/{id}', "PengabdianController@hapus_peng_non_dilitabmas");










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
