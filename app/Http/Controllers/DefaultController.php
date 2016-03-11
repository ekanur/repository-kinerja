<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use View;
use DB;
use Request;
use Session;
use Redirect;
class DefaultController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Profil Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/
        public function __construct()
	{
		$this->middleware('auth_josso');
                //SecurityController::check();
        
	}
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	 public function index()
    {
        $myVar = Request::instance()->query('idUser');
        $menu=array('menu'=>'Dashboard','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID'),'jml_data'=>'');
        return View::make('dashboard/vdashboard')->with('menu',$menu);
    }

    public function akademik()
    {
    	$menu=array('menu'=>'Akademik','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID'),'jml_data'=>'');
        return View::make('akademik/akademik')->with('menu',$menu);
    }

	public function penelitian()
    {
    	$menu=array('menu'=>'Penelitian','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID'),'jml_data'=>'');
        return View::make('penelitian/penelitian')->with('menu',$menu);
    }
	
	public function pengabdian()
    {
    	$menu=array('menu'=>'Pengabdian','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID'),'jml_data'=>'');
        return View::make('pengabdian/pengabdian')->with('menu',$menu);
    }
	
	public function kegiatan_lain()
    {
    	$menu=array('menu'=>'Kegiatan Lain','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID'),'jml_data'=>'');
        return View::make('kegiatan_lain/kegiatan_lain')->with('menu',$menu);
    }
	
	public function tambah_kegiatan($kategori)
    {
    	if(Request::isMethod('post'))
    	{
    		//insert to db

    		return redirect($kategori);
    	}
    	else
    	{
    		//show form

    		switch ($kategori) {
    			case 'akademik':
    				$title = 'Akademik';
    				break;
    			case 'penelitian':
    				$title = 'Penelitian';
    				break;
    			case 'pengabdian':
    				$title = 'Pengabdian';
    				break;
    			case 'kegiatan_lain':
    				$title = 'Kegiatan Lain';
    				break;
    		}
    		$menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID'),'jml_data'=>'','kategori'=>$kategori);
        	return View::make('form_tambah')->with('menu',$menu);
    	}    	
    }

}
