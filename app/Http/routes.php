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
Route::group(['middleware' => ['web']], function () {
    Route::get('/', ['as' => '/', 'uses' => 'DashboardController@index']);
	Route::get('/pilih_dosen','pilih_dosen@index');
    Route::get('/akademik','DefaultController@akademik');
	Route::get('/penelitian','DefaultController@penelitian');
	Route::get('/pengabdian','DefaultController@pengabdian');
	Route::get('/kegiatan_penunjang','DefaultController@kegiatan_penunjang');
	Route::get('/{kategori}/tambah','DefaultController@tambah');
	Route::post('/{kategori}/tambah','DefaultController@tambah');
	Route::post('/pilih_dosen/create','pilih_dosen@create');


	// get list dosen on pilih_dosen
	Route::get("/api/dosen/{id}", "DosenController@show");
	Route::get("/api/akademik/{thaka}", "AkademikController@import_for_ajax");
	Route::get("/api/penelitian/{tahun}", "PenelitianController@import_for_ajax");
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


	Route::get("/penelitian/import", "PenelitianController@import");
	Route::get("/pengabdian/import", "PengabdianController@import");
	Route::get("/penelitian/import/{tahun}", "PenelitianController@import");
	Route::post("/penelitian/save_import", "PenelitianController@save_import");
	Route::get("/pengabdian/import/{tahun}", "PengabdianController@import");
});

Route::get('/servicecheck','SecurityController@check');
Route::get('/servicelogout','SecurityController@logout');
Route::get('/{kategori}/hapus/{id}', "DefaultController@hapus");
Route::get('/{kategori}/edit/{id}', "DefaultController@edit");
Route::post('/{kategori}/update/{id}', "DefaultController@update");



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
