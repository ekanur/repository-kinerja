<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use DB;
use Session;
use Redirect;
use App;
use App\Http\Requests;

class DashboardController extends Controller
{
    public function __construct(){
    	$this->middleware('auth_josso');
    }

    public function index(){
        
    	$data_chart=array(
    		"akademik"=>$this->data_chart_akademik(),
    		"penelitian"=>$this->data_chart_penelitian(),
    		"pengabdian"=>$this->data_chart_pengabdian(),
    		"kegiatan_penunjang"=>$this->data_chart_kegiatan_penunjang(),

    		);

    	$menu=array('menu'=>'Dashboard','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'', 'data'=>$this->get_total_tridarma(), 'chart'=>$data_chart,'userfak'=>Session::get('userFak')
		,'ketdosen'=>Session::get('ketDosen'));
        return View::make('dashboard/vdashboard')->with('menu',$menu);
    }

    public function get_total_tridarma(){
    	$result=array();
    	$akademik=new App\Akademik;
    	$penelitian=new App\Penelitian;
    	$pengabdian=new App\Pengabdian;
    	$kegiatan_penunjang=new App\Kegiatan_penunjang;

    	$result=array(
    		"akademik"=>$akademik->where('nip_dosen', '=', Session::get('userID_login'))->where("deleted_at", "=", null)->get()->count(),
    		"penelitian"=>$penelitian->where('nip_dosen', '=', Session::get('userID_login'))->where("deleted_at", "=", null)->get()->count(),
    		"pengabdian"=>$pengabdian->where('nip_dosen', '=', Session::get('userID_login'))->where("deleted_at", "=", null)->get()->count(),
    		"kegiatan_penunjang"=>$kegiatan_penunjang->where('nip_dosen', '=', Session::get('userID_login'))->where("deleted_at", "=", null)->get()->count(),
    		);

    	return $result;
    }

    public function data_chart_akademik(){

    		$data=array();
    		for ($i=date("Y")-5; $i <= date("Y"); $i++) { 

    			$data[$i]=DB::select("select count(id) from akademik where extract(year from tgl)=".$i." and nip_dosen='".Session::get('userID_login')."' and deleted_at IS NULL ");

    		}   	
    		
    	return $data;

    }

    public function data_chart_penelitian(){

    		$data=array();
    		for ($i=date("Y")-5; $i <= date("Y"); $i++) { 

    			$data[$i]=DB::select("select count(id) from penelitian where extract(year from tgl)=".$i." and nip_dosen='".Session::get('userID_login')."' and deleted_at IS NULL ");

    		}   	
    		
    	return $data;

    }

    public function data_chart_pengabdian(){

    		$data=array();
    		for ($i=date("Y")-5; $i <= date("Y"); $i++) { 

    			$data[$i]=DB::select("select count(id) from pengabdian where extract(year from tgl)=".$i." and nip_dosen='".Session::get('userID_login')."' and deleted_at IS NULL ");

    		}   	
    		
    	return $data;

    }

    public function data_chart_kegiatan_penunjang(){
    	$data=array();
    		for ($i=date("Y")-5; $i <= date("Y"); $i++) { 

    			$data[$i]=DB::select("select count(id) from kegiatan_penunjang where extract(year from tgl)=".$i." and nip_dosen='".Session::get('userID_login')."' and deleted_at IS NULL ");

    		}   	
    		
    	return $data;
    }

}
