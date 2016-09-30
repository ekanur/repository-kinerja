<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Session;
use View;

class UserController extends Controller
{
    //

    public function __construct(){
    	$this->middleware('auth_josso');
    	if(Session::get('userRole')!="Admin"){
    		abort(404);
    	}
    }

    public function index(){
    	$data=User::where([["user_fak","=", Session::get('userFak')],["user_level","=", "2"]])->get();
    	// foreach ($data as $user) {
    	// 	var_dump($user);
    	// }exit();
    	$menu=array('menu'=>'User','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'', 'data'=>$data,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'));
    	return View::make("user.index")->with('menu', $menu);
    }

    public function store(Request $request){


    	// $data=null;	
    	// $menu=array('menu'=>'User','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'', 'data'=>$data,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'));
    	// return View::make("user.tambah")->with('menu', $menu);
        // var_dump($request->all());exit();
        $user=new User;

        $user->user_id=$request->user_id;
        $user->user_fak=Session::get("userFak");
        $user->user_level="2";
        $user->status="1";
        $user->fak_nm=Session::get("userFakNm");
        
        if(!$user->save()){
            return redirect()->back()->with("gagal", "Tidak berhasil menyimpan user");
        }

        return redirect()->back()->with("berhasil", "Berhasil menambah Operator");
    }

    public function edit($user_id){
        $user=User::findOrFail($user_id);

        if($user->status==1){
            $user->status=0;
        }else{
            $user->status=1;
        }

        if (!$user->save()) {
            return redirect()->back()->with("gagal", "Gagal mengubah status user");
        }
    
        return redirect()->back()->with("berhasil", "Berhasil mengubah status user");          

    }


    public function hapus($user_id){
        $user=User::findOrFail($user_id);

        if(!$user->delete()){
            return redirect()->back()->with("gagal", "Gagal menghapus user");
        }
        return redirect()->back()->with("berhasil", "Berhasil menghapus user");   
    }


    public function update(){}
}
