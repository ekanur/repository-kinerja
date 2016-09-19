<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use View;
use DB;
use Session;
use Redirect;
use App;
use Request;

class pilih_dosen extends Controller
{
    public function __construct(){
    	$this->middleware('auth_josso');
    }

    public function index(){
    	$menu=array('menu'=>'Pilih Dosen','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'));
        return View::make('pilih_dosen/form')->with('menu',$menu);
    }

   public function create(){
	   Session::put('userID', Request::get('dosen'));
       Session::put('ketDosen',Request::get('dosen'));
	   return Redirect::to('/');
   }

}
