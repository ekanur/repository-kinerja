<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use View;
use DB;
use Request;
use Session;
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

}
