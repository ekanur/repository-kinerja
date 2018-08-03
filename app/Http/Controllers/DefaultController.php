<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use View;
use DB;
use Request;
use Session;
use Redirect;
use App;
use Validator;
use Storage;
use File;


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
                // SecurityController::check();

  }
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
  public function index()
  {

  }

  public function akademik()
  {
   $akademik=new App\Akademik;
   $data=$akademik->where('nip_dosen', '=', Session::get('userID_login'))->orderBy('id', 'DESC')->get();
   foreach ($data as $akademik) {
    $akademik->bukti_kinerja=explode(",", $akademik->bukti_kinerja);
  }
  $menu=array('menu'=>'Pendidikan','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'', 'data'=>$data,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'));
  return View::make('akademik/akademik')->with('menu',$menu);
}





public function pengabdian()
{
 $pengabdian=new App\Pengabdian;
 $data=$pengabdian->where('nip_dosen', '=', Session::get('userID_login'))->orderBy('id', 'DESC')->get();

 foreach ($data as $pengabdian) {
  $pengabdian->bukti_kinerja=explode(",", $pengabdian->bukti_kinerja);
}
$menu=array('menu'=>'Pengabdian','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'', 'data'=>$data,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'));
return View::make('pengabdian/pengabdian')->with('menu',$menu);
}

public function kegiatan_penunjang()
{
 $kegiatan_penunjang=new App\Kegiatan_penunjang;
 $data=$kegiatan_penunjang->where('nip_dosen', '=', Session::get('userID_login'))->orderBy('id', 'DESC')->get();
 foreach ($data as $kegiatan_penunjang) {
  $kegiatan_penunjang->bukti_kinerja=explode(",", $kegiatan_penunjang->bukti_kinerja);
}
$menu=array('menu'=>'Kegiatan Penunjang','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'', 'data'=>$data,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'));
return View::make('kegiatan_penunjang/kegiatan_penunjang')->with('menu',$menu);
}




// akhir default controller
}


