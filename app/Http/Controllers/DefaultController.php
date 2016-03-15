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
        
    }

    public function akademik()
    {
    	$akademik=new App\Akademik;
    	$data=$akademik->where('nip_dosen', '=', Session::get('userID'))->orderBy('id', 'DESC')->get();
 
    	$menu=array('menu'=>'Akademik','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID'),'jml_data'=>'', 'data'=>$data);
        return View::make('akademik/akademik')->with('menu',$menu);
    }

	public function penelitian()
    {
    	$penelitian=new App\Penelitian;
    	$data=$penelitian->where('nip_dosen', '=', Session::get('userID'))->orderBy('id', 'DESC')->get();

    	$menu=array('menu'=>'Penelitian','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID'),'jml_data'=>'', 'data'=>$data);

        return View::make('penelitian/penelitian')->with('menu',$menu);
    }
	
	public function pengabdian()
    {
    	$pengabdian=new App\Pengabdian;
    	$data=$pengabdian->where('nip_dosen', '=', Session::get('userID'))->orderBy('id', 'DESC')->get();

    	$menu=array('menu'=>'Pengabdian','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID'),'jml_data'=>'', 'data'=>$data);
        return View::make('pengabdian/pengabdian')->with('menu',$menu);
    }
	
	public function kegiatan_penunjang()
    {
    	$kegiatan_penunjang=new App\Kegiatan_penunjang;
    	$data=$kegiatan_penunjang->where('nip_dosen', '=', Session::get('userID'))->orderBy('id', 'DESC')->get();

    	$menu=array('menu'=>'Kegiatan Penunjang','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID'),'jml_data'=>'', 'data'=>$data);
        return View::make('kegiatan_penunjang/kegiatan_penunjang')->with('menu',$menu);
    }

    public function get_kategori_model($kategori){
    	$data=null;
    	switch ($kategori) {
    		case 'akademik':
    			$data=new App\Akademik;
    			break;
    		case 'penelitian':
    			$data=new App\Penelitian;
    			break;
    		case 'pengabdian':
    			$data=new App\Pengabdian;
    			break;
    		case 'kegiatan_penunjang':
    			$data=new App\Kegiatan_penunjang;
    			break;
    		default:
    			Session::flash('error', 'Terjadi kesalahan');
    			return redirect("/");
    			break;
    	}

    	return $data;
    }
	
	public function tambah($kategori)
    {
    	if(Request::isMethod('post'))
    	{
    		$data=$this->get_kategori_model($kategori);

    			$array_file_info=array(
    					"input_name"=>"surat_penugasan",
    					"required"=>'required|image',
    				);

    			$data->nama_kegiatan=Request::get('nama_kegiatan');
    			$data->deskripsi=Request::get('deskripsi_kegiatan');
    			$data->url=Request::get('url_kegiatan');
    			$data->tgl=Request::get('waktu_pelaksanaan');
    			$data->thaka=Request::get('thaka');
    			$data->surat_penugasan=$this->single_upload('akademik', $array_file_info);
    			// $data->bukti_kinerja=$this->multiple_upload('akademik', $array_file_info);
    			$data->created_at=date('Y-m-d H:i:s');
    			$data->updated_at=null;
    			$data->created_by=Session::get('userID');
    			$data->updated_by=null;
    			$data->deleted_at=null;
    			$data->nip_dosen=Session::get('userID');
    			

    			if($data->save()){
    				session()->flash('success', 'Berhasil menambahkan kegiatan '.$kategori.' baru');
    			}
    			else{
    				session()->flash('error', 'Gagal menambahkan kegiatan '.$kategori.' ');
    			}


    		return Redirect::to($kategori);
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
    			case 'kegiatan_penunjang':
    				$title = 'Kegiatan Penunjang';
    				break;
    		}
    		$menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID'),'jml_data'=>'','kategori'=>$kategori);
        	return View::make('form_tambah')->with('menu',$menu);
    	}    	
    }


    public function edit($kategori, $id){
    	$data=$this->get_kategori_model($kategori);

    	$model=$data->find($id);
    	$model->tgl=$this->format_tgl($model->tgl);
    	$menu=array('menu'=>$kategori,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID'),'jml_data'=>'','kategori'=>$kategori, 'data'=>$model);
    	return View::make('form_edit')->with('menu', $menu);
    }

    public function format_tgl($tgl){
    	
    	$tahun=substr($tgl, 0,4);
    	$bulan=substr($tgl, 5,2);
    	$hari=substr($tgl, 8,2);

    	return $bulan."/".$hari."/".$tahun;
    }


    public function update($kategori, $id){
    	 $data=$this->get_kategori_model($kategori);

    	 $update=$data::find($id);

    		$update->nama_kegiatan=Request::get('nama_kegiatan');
			$update->deskripsi=Request::get('deskripsi');
			$update->url=Request::get('url');
			$update->tgl=Request::get('tgl');
			$update->thaka=Request::get('thaka');
			// $update->surat_penugasan=$this->single_upload('akademik', $array_file_info);
			// $update->bukti_kinerja=$this->multiple_upload('akademik', $array_file_info);
			// $update->created_at=date('Y-m-d H:i:s');
			$update->updated_at=date('Y-m-d H:i:s');
			// $update->created_by="Admin";
			$update->updated_by=Session::get("userID");
			// $update->deleted_at=null;
			$update->nip_dosen=Session::get('userID');
    			

    			if($update->save()){
    				session()->flash('success', 'Berhasil memperbarui kegiatan '.$kategori);
    			}
    			else{
    				session()->flash('error', 'Gagal memperbarui kegiatan '.$kategori);
    			}


    		return Redirect::to($kategori);

    }

    public function single_upload($kategori,$array_file_info){
            $result=null;

            /*Array File Info
				-input_name
				-required
            */

            if(!Request::hasFile($array_file_info['input_name'])){
                Session::flash('error', 'File bukti kinerja belum diupload');
                return redirect($kategori.'/tambah_kegiatan');
            }
            $file = Request::file($array_file_info['input_name']);
            // $file_count = count($files);
            // $uploadcount = 0;
            // foreach($files as $file) {
                $rules = array($array_file_info['input_name'] => $array_file_info['required']);
                $validator = Validator::make(array($array_file_info['input_name']=> $file), $rules);
                if($validator->passes()){
                    $destinationPath = base_path('public/uploads'); //folder destination
                    $extension = Request::file($array_file_info['input_name'])->getClientOriginalExtension();
                    $fileName = rand(11111,99999).'.'.$extension; //filename format
                    $upload_success = $file->move($destinationPath, $fileName);

                    if($upload_success){
		                Session::flash('success', 'Upload successfully'); 
		                $result=$fileName; //return filename
		            } 
		            else {
		                return redirect($kategori.'/tambah_kegiatan')->withErrors($validator)->withInput();
		            }
                    
                }
            // }
            


            return $result;
    }


    public function multiple_upload(){
    	// loop single_upload function, then create concat string that will be stored into table
    	// if(!Request::hasFile($array_file_info['input_name'])){
     //            Session::flash('error', 'File bukti kinerja belum diupload');
     //            return redirect($kategori.'/tambah_kegiatan');
     //        }
     //        $files = Request::file($array_file_info['input_name']);
     //        $file_count = count($files);
     //        $uploadcount = 0;
     //        foreach($files as $file) {
     //            $rules = array($array_file_info['input_name'] => $array_file_info['required']);
     //            $validator = Validator::make(array($array_file_info['input_name']=> $file), $rules);
     //            if($validator->passes()){
     //                $destinationPath = base_path('uploads'); //folder destination
     //                $extension = Request::file($array_file_info['input_name'])->getClientOriginalExtension();
     //                $fileName = rand(11111,99999).'.'.$extension; //filename format
     //                $upload_success = $file->move($destinationPath, $fileName);
     //                $uploadcount ++;
     //            }
     //        }
     //        if($uploadcount == $file_count){
     //            Session::flash('success', 'Upload successfully'); 
     //            //return Redirect::to($kategori);
     //        } 
     //        else {
     //            return redirect($kategori.'/tambah_kegiatan')->withErrors($validator)->withInput();
     //        }
    }


    public function hapus($kategori, $id){

    	$data=$this->get_kategori_model($kategori);

    	$model=$data::findOrfail($id);

    	if($model->delete())
    	{
    		Session::flash('success', 'Data kegiatan berhasil dihapus');
    	}
    	else{
    		Session::flash('error', 'Data kegiatan gagal dihapus');
    	}

    	return redirect($kategori);
    }

}
