<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Penelitian;
use App\Pengabdian;
use App\Litabmas;
use App\LitabmasAnggota;
use App\LitabmasPegawai;
use Session;
use DB;

class ImportLitabmasController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth_josso');
                // SecurityController::check();
		if(Session::get('userRole')=='Dosen'){
            abort(404);
        }
    }


    public function import($tahun=null){}
}
