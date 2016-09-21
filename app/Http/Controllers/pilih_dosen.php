<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use View;
use DB;
use Session;
use Redirect;
use App;
use Request;
use App\Dosen;

class pilih_dosen extends Controller
{
    public function __construct(){
    	$this->middleware('auth_josso');
    }

    public function index(){
    	$menu=array('menu'=>'Pilih Dosen','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'));
        return View::make('pilih_dosen/form')->with('menu',$menu);
    }

   public function create(){
    // dd(Session::all());
	   // Session::put('userID', Request::input('cari_dosen'));
     // need filter, if nip dosen not found from PTIK.m_dosen, m_jur, m_fak
    $dosen=Dosen::with("jurusan")->whereHas('jurusan', function($q){
        $q->where('fak_kd', '=', Session::get('userFak'));
      })->where('dsn_nip', Request::input('cari_dosen'))->get();

        if (!$dosen->isEmpty()) {
          Session::forget('ketDosen');
          Session::put('ketDosen',Request::get('cari_dosen'));
          return redirect()->back()->with("success", "Berhasil memilih NIP");
        }else{
          return redirect()->back()->with("error", "NIP tidak ditemukan");
        }
       
        
	   // return Redirect::to('/');
   }

   public function destroy(){
    // session_start();
                Session::flush();
                \Cookie::forget('JOSSO_SESSIONID');
                if (isset($_SERVER['HTTP_COOKIE'])) {
                    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
                    foreach($cookies as $cookie) {
                        $parts = explode('=', $cookie);
                        $name = trim($parts[0]);
                        setcookie($name, '', time()-1000);
                        setcookie($name, '', time()-1000, '/');
                    }
                }

                // Unset all of the session variables.
                $_SESSION = array();

                // If it's desired to kill the session, also delete the session cookie.
                // Note: This will destroy the session, and not just the session data!
                if (ini_get("session.use_cookies")) {
                    $params = session_get_cookie_params();
                    setcookie(session_name(), '', time() - 42000,
                        $params["path"], $params["domain"],
                        $params["secure"], $params["httponly"]
                    );
                }

                // Finally, destroy the session.
                session_destroy();

                return redirect()->back()->with("success", "Berhasil keluar dari akun dosen");
   }

}
