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
	Route::get("/pilih_dosen/remove", "pilih_dosen@destroy");
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
