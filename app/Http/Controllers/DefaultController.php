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
		// $this->middleware('auth_josso');
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
 		foreach ($data as $akademik) {
    		$akademik->bukti_kinerja=explode(",", $akademik->bukti_kinerja);
    	}
    	$menu=array('menu'=>'Akademik','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID'),'jml_data'=>'', 'data'=>$data);
        return View::make('akademik/akademik')->with('menu',$menu);
    }

	public function penelitian()
    {
    	$penelitian=new App\Penelitian;
    	$data=$penelitian->where('nip_dosen', '=', Session::get('userID'))->orderBy('id', 'DESC')->get();

    	$menu=array('menu'=>'Penelitian','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID'),'jml_data'=>'', 'data'=>$data);
    	foreach ($data as $penelitian) {
    		$penelitian->bukti_kinerja=explode(",", $penelitian->bukti_kinerja);
    	}
        return View::make('penelitian/penelitian')->with('menu',$menu);
    }
	
	public function pengabdian()
    {
    	$pengabdian=new App\Pengabdian;
    	$data=$pengabdian->where('nip_dosen', '=', Session::get('userID'))->orderBy('id', 'DESC')->get();

    	foreach ($data as $pengabdian) {
    		$pengabdian->bukti_kinerja=explode(",", $pengabdian->bukti_kinerja);
    	}
    	$menu=array('menu'=>'Pengabdian','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID'),'jml_data'=>'', 'data'=>$data);
        return View::make('pengabdian/pengabdian')->with('menu',$menu);
    }
	
	public function kegiatan_penunjang()
    {
    	$kegiatan_penunjang=new App\Kegiatan_penunjang;
    	$data=$kegiatan_penunjang->where('nip_dosen', '=', Session::get('userID'))->orderBy('id', 'DESC')->get();
    	foreach ($data as $kegiatan_penunjang) {
    		$kegiatan_penunjang->bukti_kinerja=explode(",", $kegiatan_penunjang->bukti_kinerja);
    	}
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

    			$file_info_surat_penugasan=array(
    					"input_name"=>"surat_penugasan",
    					"required"=>'required|image',
    				);
    			$file_info_bukti_kinerja=array(
    					"input_name"=>"bukti_kinerja",
    					"required"=>'required|image',
    				);

    			$data->nama_kegiatan=Request::get('nama_kegiatan');
    			$data->deskripsi=Request::get('deskripsi_kegiatan');
    			$data->url=Request::get('url_kegiatan');
    			$data->tgl=Request::get('waktu_pelaksanaan');
    			$data->thaka=Request::get('thaka');
    			$data->surat_penugasan=$this->single_upload($kategori, $file_info_surat_penugasan);
    			$data->bukti_kinerja=$this->multiple_upload($kategori, $file_info_bukti_kinerja);
    			$data->created_at=date('Y-m-d H:i:s');
    			$data->updated_at=null;
    			$data->created_by=Session::get('userID');
    			$data->updated_by=null;
    			$data->deleted_at=null;
    			$data->nip_dosen=Session::get('userID');
    			
    			if($data->surat_penugasan==null || $data->bukti_kinerja==null){
    				Session::flash('error', 'File surat penugasan dan bukti kinerja belum diupload');
    				return Redirect::back()->withInput();
    			}

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

    	$menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID'),'jml_data'=>'','kategori'=>$kategori, 'data'=>$model);
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

			if(Request::file('surat_penugasan')!=null){

				$file_info_surat_penugasan=array(
    					"input_name"=>"surat_penugasan",
    					"required"=>'required|image',
    				);
                File::delete(base_path('public/uploads/'.$update->surat_penugasan));
				$update->surat_penugasan=$this->single_upload($kategori, $file_info_surat_penugasan);
			}
			if(Request::file('bukti_kinerja')!=null){
				$file_info_bukti_kinerja=array(
    					"input_name"=>"bukti_kinerja",
    					"required"=>'required|image',
    				);
				$update->bukti_kinerja=$this->tambah_bukti_kinerja($kategori, $id, $file_info_bukti_kinerja);
			}
			// $update->surat_penugasan=$this->single_upload('akademik', $array_file_info);
			// $update->bukti_kinerja=$this->multiple_upload('akademik', $array_file_info);
			// $update->created_at=date('Y-m-d H:i:s');
			$update->updated_at=date('Y-m-d H:i:s');
			// $update->created_by="Admin";
			$update->updated_by=Session::get("userID");
			// $update->deleted_at=null;
			// $update->nip_dosen=Session::get('userID');
    			
    			if($update->save()){
    				Session::flash('success', 'Berhasil memperbarui kegiatan '.$kategori);
    			}
    			else{
    				Session::flash('error', 'Gagal memperbarui kegiatan '.$kategori);
    			}


    		return Redirect::to($kategori);

    }

    public function single_upload($kategori,$array_file_info, $file=null){
            $result=null;

            /*Array File Info
				-input_name
				-required
            */

            if(!Request::hasFile($array_file_info['input_name'])){
                
                return null;
            }

            if($file==null){
            	$file = Request::file($array_file_info['input_name']);
            }

            // $file_count = count($files);
            // $uploadcount = 0;
            // foreach($files as $file) {
                $rules = array($array_file_info['input_name'] => $array_file_info['required']);
                $validator = Validator::make(array($array_file_info['input_name']=> $file), $rules);
                if($validator->passes()){
                    $destinationPath = base_path('public/uploads'); //folder destination
                    $extension = $file->getClientOriginalExtension();
                    $fileName = rand(11111,99999).'.'.$extension; //filename format
                    $upload_success = $file->move($destinationPath, $fileName);

                    if($upload_success){
		                $result=$fileName; //return filename
		            } 
		            else {
		                return redirect($kategori.'/tambah')->withErrors($validator)->withInput();
		            }
                    
                }
            // }
           
            return $result;
    }


    public function multiple_upload($kategori, $array_file_info){
    	// loop single_upload function, then create concat string that will be stored into table
    
    	$files=Request::file($array_file_info['input_name']);

    	if(!Request::hasFile($array_file_info['input_name'])){
                return null;
            }

    	$file_count=count($files);
    	$uploaded_count=0;
    	$file_name="";
    	$last_file=end($files);
    	foreach ($files as $file) {
    		$uploaded_file=$this->single_upload($kategori, $array_file_info, $file);
    		if($uploaded_file!=null){
    			$file_name.=$uploaded_file;
    			if($file!=$last_file){
    				$file_name.=",";
    			}
    			// $uploaded_count++;
    			// 	if($uploaded_count<$file_count){
    			// 		$file_name.=", ";
    			// 	}
    		}
    		
    	}

    	return $file_name;
    }

    public function tambah_bukti_kinerja($kategori, $id, $file_info){
    	$data=$this->get_kategori_model($kategori);

    	$find=$data::find($id);
    	if($find->bukti_kinerja!=null){
    		$find->bukti_kinerja=$find->bukti_kinerja.",".$this->multiple_upload($kategori, $file_info);
    	}else{
    		$find->bukti_kinerja=$this->multiple_upload($kategori, $file_info);
    	}
    	

    	return $find->bukti_kinerja;
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
