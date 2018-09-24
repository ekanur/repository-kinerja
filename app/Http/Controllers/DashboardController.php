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
    		"penelitian_dilitabmas"=>$this->data_chart_penelitian_dilitabmas(),
    		"penelitian_non_dilitabmas"=>$this->data_chart_penelitian_non_dilitabmas(),
    		"pengabdian_dilitabmas"=>$this->data_chart_pengabdian_dilitabmas(),
    		"pengabdian_non_dilitabmas"=>$this->data_chart_pengabdian_non_dilitabmas(),
    		);
        // print_r($data_chart); die();

    	$menu=array('menu'=>'Dashboard','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'', 'data'=>$this->get_total_tridarma(), 'chart'=>$data_chart,'userfak'=>Session::get('userFak')
		,'ketdosen'=>Session::get('ketDosen'));
        return View::make('dashboard/vdashboard')->with('menu',$menu);
    }

    public function get_total_tridarma(){
    	$result=array();
    	$penelitian_dilitabmas=new App\penelitian_dilitabmas;
    	$penelitian_non_dilitabmas=new App\penelitian_non_dilitabmas;
    	$pengabdian_dilitabmas=new App\pengabdian_dilitabmas;
    	$pengabdian_non_dilitabmas=new App\pengabdian_non_dilitabmas;

    	$result=array(
    		"penelitian_dilitabmas"=>$penelitian_dilitabmas->where('nip_dosen', '=', Session::get('userID_login'))->where("deleted_at", "=", null)->get()->count(),
    		"penelitian_non_dilitabmas"=>$penelitian_non_dilitabmas->where('nip_dosen', '=', Session::get('userID_login'))->where("deleted_at", "=", null)->get()->count(),
    		"pengabdian_dilitabmas"=>$pengabdian_dilitabmas->where('nip_dosen', '=', Session::get('userID_login'))->where("deleted_at", "=", null)->get()->count(),
    		"pengabdian_non_dilitabmas"=>$pengabdian_non_dilitabmas->where('nip_dosen', '=', Session::get('userID_login'))->where("deleted_at", "=", null)->get()->count(),
    		);

    	return $result;
    }

    public function data_chart_penelitian_dilitabmas(){

    		$data=array();
    		for ($i=date("Y")-5; $i <= date("Y"); $i++) { 

                // $data[$i]=DB::select("select count(id) from penelitian_dilitabmas where extract(year from tgl)=".$i." and nip_dosen='".Session::get('userID_login')."' and deleted_at IS NULL ");
    			$data[$i]=DB::select("select count(id) from penelitian_dilitabmas where CAST(tahun AS TEXT) like '".$i."%' and nip_dosen='".Session::get('userID_login')."' and deleted_at IS NULL ");

    		}   	
    		
    	return $data;

    }

    public function data_chart_penelitian_non_dilitabmas(){

    		$data=array();
    		for ($i=date("Y")-5; $i <= date("Y"); $i++) { 

                // $data[$i]=DB::select("select count(id) from penelitian_non_dilitabmas where extract(year from tgl)=".$i." and nip_dosen='".Session::get('userID_login')."' and deleted_at IS NULL ");
    			$data[$i]=DB::select("select count(id) from penelitian_non_dilitabmas where CAST(tahun AS TEXT) like '".$i."%' and nip_dosen='".Session::get('userID_login')."' and deleted_at IS NULL ");

    		}   	
    		
    	return $data;

    }

    public function data_chart_pengabdian_dilitabmas(){

    		$data=array();
    		for ($i=date("Y")-5; $i <= date("Y"); $i++) { 

                // $data[$i]=DB::select("select count(id) from pengabdian_dilitabmas where extract(year from tgl)=".$i." and nip_dosen='".Session::get('userID_login')."' and deleted_at IS NULL ");
    			$data[$i]=DB::select("select count(id) from pengabdian_dilitabmas where CAST(tahun AS TEXT) like '".$i."%' and nip_dosen='".Session::get('userID_login')."' and deleted_at IS NULL ");

    		}   	
    		
    	return $data;

    }

    public function data_chart_pengabdian_non_dilitabmas(){
    	$data=array();
    		for ($i=date("Y")-5; $i <= date("Y"); $i++) { 

                // $data[$i]=DB::select("select count(id) from pengabdian_non_dilitabmas where extract(year from tgl)=".$i." and nip_dosen='".Session::get('userID_login')."' and deleted_at IS NULL ");
    			$data[$i]=DB::select("select count(id) from pengabdian_non_dilitabmas where CAST(tahun AS TEXT) like '".$i."%' and nip_dosen='".Session::get('userID_login')."' and deleted_at IS NULL ");

    		}   	
    		
    	return $data;
    }

}
