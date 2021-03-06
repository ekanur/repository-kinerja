<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use Session;
use App\Dosen;
use App\KdGen;
use App\Akademik;
use PDF;


class AkademikController extends Controller
{
    public function __construct()
	{
        if(Session::get('userRole')=='Dosen'){
            abort(404);
        }

		$this->middleware('auth_josso');
   
	}

    public function import($thaka=null)
    {
    	$thaka = ($thaka==null) ? $this->getNowThaka() : $thaka ;
        $kd_komp=Akademik::select("kd_komp")->where('nip_dosen', Session::get('userID_login'))->whereNotNull("kd_komp")->get();


    	$KdGen=KdGen::select("kd_komp","mt_nm", "mt_kd", "mt_sks", "angkatan","jw_kls", "jw_offr")->whereHas('dosen',function($q){
    		$q->where("dsn_nip", Session::get('userID_login'));
    	})->whereNotIn("kd_komp", $kd_komp)->where("thaka", $thaka)->get();

        if (Request::ajax()) {
            return response()->json($KdGen);
        }

    	$menu=array('menu'=>'Pendidikan','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'), 'thaka'=>$thaka, "data_kdgen"=>$KdGen);
    	return view("akademik.import")->with('menu', $menu);
    }

    // public function import_for_ajax($thaka=null){
    //     if(Session::get('userRole')=='Dosen'){
    //         abort(404);
    //         // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
    //     }
    // 	$thaka = ($thaka==null) ? $this->getNowThaka() : $thaka ;
    //     $mt_kd=Akademik::select("mt_kd")->where('nip_dosen', Session::get('userID_login'))->whereNotNull("mt_kd")->get();


    // 	$KdGen=KdGen::select("mt_nm", "mt_kd", "mt_sks")->whereHas('dosen',function($q){
    // 		$q->where("dsn_nip", Session::get('userID_login'));
    // 	})->whereNotIn("mt_kd", $mt_kd)->where("thaka", $thaka)->groupBy( "mt_nm", "mt_kd", "mt_sks")->get();
    //     // dd($KdGen);
    // 	return response()->json($KdGen);
    	
    // }

    public function save_import(){
    	$data_import=Request::input("data");
    	$thaka=Request::input("thaka");
 		$data=array();
    	foreach ($data_import as $akademik) {
    		$data[]=array(
    				"nama_kegiatan"=>"Pengampun matakuliah ".$akademik['mt_nm']." [".$akademik['mt_kd']."] kelas ".$akademik['angkatan'].' '.$akademik['jw_kls'].'-'.$akademik['jw_offr'],
    				"deskripsi"=>"Import dari SIAKAD:".$akademik['mt_nm']." [".$akademik['mt_kd']."] ".$akademik['mt_sks']." SKS",
                    // "surat_penugasan"=>$this->createSuratPenugasan($akademik['kd_komp']),
                    "bukti_kinerja"=>$this->createBuktiKinerja($akademik['kd_komp']),
    				"thaka"=>$thaka,
    				"created_at"=>date("Y-m-d"),
    				"created_by"=>Session::get("userID"),
                    "nip_dosen"=>Session::get("userID_login"),
    				"kd_komp"=>$akademik['kd_komp'],
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

    public function createBuktiKinerja($kd_komp)
    {
        $dosen=null;
        $jadwal=null;
        $data=array("dosen"=>$dosen);
        $pdf=PDF::loadView("pdf.bukti_kinerja", $data);
        return $pdf->stream("file.pdf");
    }


    public function exportPDF()
    {
        
    }
}
