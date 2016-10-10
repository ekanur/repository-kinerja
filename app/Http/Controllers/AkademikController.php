<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use Session;
use App\Dosen;
use App\KdGen;
use App\Akademik;

class AkademikController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth_josso');
                // SecurityController::check();
        
	}

    public function import($thaka=null)
    {
        if(Session::get('userRole')=='Dosen'){
            abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
        }
    	$thaka = ($thaka==null) ? $this->getNowThaka() : $thaka ;
        $mt_kd=Akademik::select("mt_kd")->where('nip_dosen', Session::get('userID_login'))->whereNotNull("mt_kd")->get();


    	$KdGen=KdGen::select("mt_nm", "mt_kd", "mt_sks")->whereHas('dosen',function($q){
    		$q->where("dsn_nip", Session::get('userID_login'));
    	})->whereNotIn("mt_kd", $mt_kd)->where("thaka", $thaka)->groupBy( "mt_nm", "mt_kd", "mt_sks")->get();

    	$menu=array('menu'=>'Pendidikan','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'), 'thaka'=>$thaka, "data_kdgen"=>$KdGen);
    	return view("akademik.import")->with('menu', $menu);
    }

    public function import_for_ajax($thaka=null){
        if(Session::get('userRole')=='Dosen'){
            abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
        }
    	$thaka = ($thaka==null) ? $this->getNowThaka() : $thaka ;
        $mt_kd=Akademik::select("mt_kd")->where('nip_dosen', Session::get('userID_login'))->whereNotNull("mt_kd")->get();


    	$KdGen=KdGen::select("mt_nm", "mt_kd", "mt_sks")->whereHas('dosen',function($q){
    		$q->where("dsn_nip", Session::get('userID_login'));
    	})->whereNotIn("mt_kd", $mt_kd)->where("thaka", $thaka)->groupBy( "mt_nm", "mt_kd", "mt_sks")->get();
        // dd($KdGen);
    	return response()->json($KdGen);
    	
    }

    public function save_import(){
    	if(Session::get('userRole')=='Dosen'){
            abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
        }
    	$data_import=Request::input("data");
    	$thaka=Request::input("thaka");
 		$data=array();
    	foreach ($data_import as $akademik) {
    		$data[]=array(
    				"nama_kegiatan"=>"Pengampun matakuliah ".$akademik['mt_nm']." [".$akademik['mt_kd']."]",
    				"deskripsi"=>"Import dari SIAKAD,".$akademik['mt_nm']." [".$akademik['mt_kd']."] ".$akademik['mt_sks']." SKS",
    				"thaka"=>$thaka,
    				"created_at"=>date("Y-m-d"),
    				"created_by"=>Session::get("userID"),
                    "nip_dosen"=>Session::get("userID_login"),
    				"mt_kd"=>$akademik['mt_kd'],
    			);

    	}

    	if(Akademik::insert($data)){
    		return "berhasil";
    	}else{
    		return "gagal";
    	}

    }

    public function getNowThaka()
    {
    	$semester = (date("m")<=6) ? 2 : 1 ;
    	return date("Y").$semester;
    }
}
