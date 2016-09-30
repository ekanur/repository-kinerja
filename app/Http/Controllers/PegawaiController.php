<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pegawai;
use App\Unit_kerja;
use App\User;
use Session;

class PegawaiController extends Controller
{
    public function index($keyword){

    	$unit_kerja=Unit_kerja::select("kode_unit")->where("nama_unit", "=", Session::get("userFakNm"))->get();
    	foreach ($unit_kerja as $data_unit_kerja) {
    		$unit_kerja=substr($data_unit_kerja->kode_unit, 0,2);
    	}

    	$user=User::select("user_id")->get();


    	$pegawai=Pegawai::select("nip", "nama_pegawai", "gelar_depan", "gelar_belakang")->whereNotIn("nip", $user)->where([["kode_unit_induk", "LIKE", $unit_kerja.'%'],["id_jns_pegawai", "<>", "5"], ["nip", "LIKE", $keyword."%"]])->get();
    	// dd($pegawai);
    	return response()->json($pegawai);
    }

    public function hei(){
    	echo "hei";
    }
}
