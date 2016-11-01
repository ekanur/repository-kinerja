<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Litabmas;
use App\LitabmasAnggota;
use App\LitabmasPegawai;
use App\Pengabdian;
use Session;
use DB;

class PengabdianController extends Controller
{
     public function __construct()
	{
		$this->middleware('auth_josso');
                // SecurityController::check();
		if(Session::get('userRole')=='Dosen'){
            abort(404);
        }
    }


    public function import($tahun=null){
    	$tahun = ($tahun==null) ? date("Y") : $tahun ;

    	$id_litabmas=Pengabdian::select("id_litabmas")->where("nip_dosen", Session::get("userID_login"))->whereNotNull("id_litabmas")->get();

    	$litabmas=Litabmas::select("id_litabmas","judul_litabmas", "status", "lama_kegiatan", DB::raw('("dana_dikti"+"dana_pt"+"dana_institusi_lain") as total_dana'))->whereHas('anggota.pegawai',function($q){
            $q->where("pegawai.nip", Session::get("userID_login"));
        })->whereNotIn("id_litabmas", $id_litabmas)->where([["id_jns", 2], ["id_thn_kegiatan", $tahun]])->get();
    	// dd($litabmas);

    	foreach ($litabmas as $data_litabmas) {
    		if($data_litabmas->status=='1'){$data_litabmas->status="Selesai";}
    		elseif($data_litabmas->status=='2'){$data_litabmas->status="Belum Selesai";}
    		elseif($data_litabmas->status=='3'){$data_litabmas->status="Tidak Selesai";}
    		elseif($data_litabmas->status=='4'){$data_litabmas->status="Mengundurkan Diri";}
    	}

    	if (Request::ajax()) {
    		return response()->json($litabmas);
    	}

    	$menu=array('menu'=>'Pengabdian','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'),"tahun"=>$tahun,"data_litabmas"=>$litabmas);
    	return view("pengabdian.import")->with("menu", $menu);
    }

    // public function import_for_ajax($tahun=null){
    //     $tahun = ($tahun==null) ? date("Y") : $tahun ;

    //     $id_litabmas=Pengabdian::select("id_litabmas")->where("nip_dosen", Session::get("userID_login"))->whereNotNull("id_litabmas")->get();

    //     $litabmas=Litabmas::select("id_litabmas","judul_litabmas", "status", "lama_kegiatan", DB::raw('("dana_dikti"+"dana_pt"+"dana_institusi_lain") as total_dana'))->whereHas('anggota.pegawai',function($q){
    //         $q->where("pegawai.nip", Session::get("userID_login"));
    //     })->whereNotIn("id_litabmas", $id_litabmas)->where([["id_jns", 2], ["id_thn_kegiatan", $tahun]])->get();
    //     // dd($litabmas);

    //     foreach ($litabmas as $data_litabmas) {
    //         if($data_litabmas->status=='1'){$data_litabmas->status="Selesai";}
    //         elseif($data_litabmas->status=='2'){$data_litabmas->status="Belum Selesai";}
    //         elseif($data_litabmas->status=='3'){$data_litabmas->status="Tidak Selesai";}
    //         elseif($data_litabmas->status=='4'){$data_litabmas->status="Mengundurkan Diri";}
    //     }
    //     // dd($KdGen);
    //     return response()->json($litabmas);
        
    // }

    public function save_import(){
        $data_import=Request::input("data");
        $tahun=Request::input("tahun");
        $data=array();

        foreach ($data_import as $pengabdian) {
            $data[]=array(
                    "nama_kegiatan"=>$pengabdian['judul_litabmas'],
                    "deskripsi"=>"Import dari LITABMAS: Pengabdian selama ".$pengabdian['lama_kegiatan']." tahun dengan total dana Rp.".number_format($pengabdian['total_dana'])." dengan status ".$pengabdian['status'],
                    "thaka"=>$tahun."1",
                    "created_at"=>date("Y-m-d"),
                    "created_by"=>Session::get("userID"),
                    "nip_dosen"=>Session::get("userID_login"),
                    "id_litabmas"=>$pengabdian['id_litabmas'],
                );

        }

        if(Pengabdian::insert($data)){
            return "berhasil";
        }else{
            return "gagal";
        }

    }
}
