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
        Route::get('/', ['as' => '/', 'uses' => 'DefaultController@index']);
});
Route::get('/servicecheck','SecurityController@check');
Route::get('/servicelogout','SecurityController@logout');
Route::get('/akademik','DefaultController@akademik');
Route::get('/penelitian','DefaultController@penelitian');
Route::get('/pengabdian','DefaultController@pengabdian');
Route::get('/kegiatan_lain','DefaultController@kegiatan_lain');
Route::get('/tambah_kegiatan/{kategori}','DefaultController@tambah_kegiatan');
Route::post('/tambah_kegiatan/{kategori}','DefaultController@tambah_kegiatan');


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
