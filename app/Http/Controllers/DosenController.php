<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Dosen;
use App\Jurusan;
use App\Fakultas;
use App\Verifikator;
use DB;



class DosenController extends Controller
{
    

    public function index(){}

    public function create(){}

    public function store(){}

    public function show($id){
    	// var_dump(\Session::all()); userFak
    	// $dosen=Dosen::with(array("jurusan", "jurusan.fakultas"))->where('dsn_nip', 'LIKE', $id.'%')->where("m_fak.fak_kd", \Session::get('userFak'))->get();
        if(\Session::get('userFak')=='Pusat'){
            $dosen=Dosen::with("jurusan")->where(function($query) use($id){

                $query->where('dsn_nip', 'LIKE', $id.'%')->orWhere('dsn_nm', 'ILIKE', '%'.strtoupper($id).'%');
            })->whereRaw("LENGTH(dsn_nip)=18")->get();
            // ->whereIn("dsn_nip", $verifikator)
            return response()->json($dosen);
        }

        $verifikator=Verifikator::select("nip_dosen")->where("verifikator", \Session::get("userID"))->get();

    	$dosen=Dosen::with("jurusan")->whereHas('jurusan', function($q){
    		$q->where('fak_kd', '=', \Session::get('userFak'));
    	})->where(function($query) use($id){

            $query->where('dsn_nip', 'LIKE', $id.'%')->orWhere('dsn_nm', 'ILIKE', '%'.strtoupper($id).'%');
        })->whereRaw("LENGTH(dsn_nip)=18")->get();
    	// ->whereIn("dsn_nip", $verifikator)
    	return response()->json($dosen);
    }

    public function edit($id){}

    public function update($id){}

    public function destroy($id){}
   
}
