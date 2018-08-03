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


class PengabdianController extends Controller {

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



// definisi $kategori (model)

    public function get_kategori_model($kategori){
     $data=null;
     switch ($kategori) {
      case 'pengabdian_dilitabmas':
      $data=new App\pengabdian_dilitabmas;
      break;
      case 'pengabdian_non_dilitabmas':
      $data=new App\pengabdian_non_dilitabmas;
      break;
      default:
      Session::flash('error', 'Terjadi kesalahan');
      return redirect("/");
      break;
    }

    return $data;
  }



// --------------------------------------------------------------
// --------------------------------------------------------------
// -----------------------Penelitian-----------------------------
// --------------------------------------------------------------
// --------------------------------------------------------------

// tampil data

  public function pengabdian_dilitabmas()
  {
   $pengabdian_dilitabmas=new App\pengabdian_dilitabmas;
   $data=$pengabdian_dilitabmas->where('nip_dosen', '=', Session::get('userID_login'))->orderBy('id', 'DESC')->get();

   $menu=array('menu'=>'pengabdian_dilitabmas','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'', 'data'=>$data,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'));
   return View::make('pengabdian\pengabdian_dilitabmas')->with('menu',$menu);
 }


 public function pengabdian_non_dilitabmas()
 {

  $pengabdian_non_dilitabmas=new App\pengabdian_non_dilitabmas;
  $data=$pengabdian_non_dilitabmas->where('nip_dosen', '=', Session::get('userID_login'))->orderBy('id', 'DESC')->get();

  $menu=array('menu'=>'pengabdian_non_dilitabmas','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'', 'data'=>$data,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'));
  foreach ($data as $pengabdian_non_dilitabmas) {
    $pengabdian_non_dilitabmas->bukti_kinerja=explode(",", $pengabdian_non_dilitabmas->bukti_kinerja);
  }
  return View::make('pengabdian\pengabdian_non_dilitabmas')->with('menu',$menu);
}


// tambah data
public function tambah_peng_dilitabmas($kategori)
{   


  $skema_pengabdian=App\skema_pengabdian::all();
  $sumberdaya=App\sumberdaya::all();
  
  if(Session::get('userRole')=='Dosen'){
    abort(404);
  }

  if(Request::isMethod('post'))
  {
    if (Session::get('userID_login')==null) {
      session()->flash('error', 'Belum memilih data dosen');
      return Redirect::to($kategori);
    }


    $request=new \Illuminate\Http\Request;
    $this->validate($request,[
      'created_at'=>'date_format:Y-m-d H:i:s',
    ]);
    $data=$this->get_kategori_model($kategori);

    $data->judul=Request::get('judul');
    $data->ketua=Request::get('ketua');
    $data->anggota_1=Request::get('anggota_1');
    $data->anggota_2=Request::get('anggota_2');
    $data->anggota_3=Request::get('anggota_3');
    $data->anggota_4=Request::get('anggota_4');
    $data->anggota_5=Request::get('anggota_5');
    $data->skema=Request::get('skema_peng');
    $data->sumberdaya_iptek=Request::get('sumberdaya');
    $data->lama_kegiatan=Request::get('lama_kegiatan');
    $data->jumlah_mahasiswa=Request::get('jumlah_mahasiswa');
    $data->jumlah_alumni=Request::get('jumlah_alumni');
    $data->jumlah_staf=Request::get('jumlah_staf');
    $data->sumber_dana=Request::get('sumber_dana');
    $data->dana=Request::get('dana');
    $data->url=Request::get('url');
    $data->tahun=Request::get('tahun');
    
    $data->created_at=date('Y-m-d H:i:s');
    $data->updated_at=null;
    $data->created_by=Session::get('userID');
    $data->updated_by=null;
    $data->deleted_at=null;
    $data->nip_dosen=Session::get('userID_login');

    if($data->save()){
      $update=$data::find($data->id);
      $update->save();
      session()->flash('success', 'Berhasil menambahkan kegiatan '.$kategori.' baru');
    }
    else{
      session()->flash('error', 'Gagal menambahkan kegiatan '.$kategori.' ');
    }


    return Redirect::to('pengabdian_dilitabmas');
  }
  else
  {

    switch ($kategori) {
      case 'pengabdian_dilitabmas':
      $title = 'Pengabdian Dilitabmas';
      break;
      case 'pengabdian_non_dilitabmas':
      $title = 'Pengabdian Non Dilitabmas';
      break;            
    }
    $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>$kategori,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'),'data_sumberdaya'=>$sumberdaya,'data_skema_peng'=>$skema_pengabdian);
    return View::make('form_tambah_peng_dilitabmas')->with('menu',$menu);
  }       

}



public function tambah_peng_non_dilitabmas($kategori)
{   


  $skema_pengabdian=App\skema_pengabdian::all();
  $sumberdaya=App\sumberdaya::all();
  $jenis_penelitian=App\jenis_penelitian::all();
  
  if(Session::get('userRole')=='Dosen'){
    abort(404);
  }

  if(Request::isMethod('post'))
  {
    if (Session::get('userID_login')==null) {
      session()->flash('error', 'Belum memilih data dosen');
      return Redirect::to($kategori);
    }


    $request=new \Illuminate\Http\Request;
    $this->validate($request,[
      'created_at'=>'date_format:Y-m-d H:i:s',
    ]);
    $data=$this->get_kategori_model($kategori);

    $data->judul=Request::get('judul');
    $data->ketua=Request::get('ketua');
    $data->anggota_1=Request::get('anggota_1');
    $data->anggota_2=Request::get('anggota_2');
    $data->anggota_3=Request::get('anggota_3');
    $data->anggota_4=Request::get('anggota_4');
    $data->anggota_5=Request::get('anggota_5');
    $data->skema=Request::get('skema_peng');
    $data->jenis_pengabdian=Request::get('jenis_pengabdian');
    $data->sumberdaya_iptek=Request::get('sumberdaya');
    $data->tahun_mulai=Request::get('tahun_mulai');
    $data->tahun_selesai=Request::get('tahun_selesai');
    $data->tahun_ke=Request::get('tahun_ke');
    $data->jumlah_mahasiswa=Request::get('jumlah_mahasiswa');
    $data->jumlah_alumni=Request::get('jumlah_alumni');
    $data->jumlah_staf=Request::get('jumlah_staf');
    $data->sumber_dana=Request::get('sumber_dana');
    $data->dana=Request::get('dana');
    $data->url=Request::get('url');
    $data->tahun=Request::get('tahun');

    
    $data->created_at=date('Y-m-d H:i:s');
    $data->updated_at=null;
    $data->created_by=Session::get('userID');
    $data->updated_by=null;
    $data->deleted_at=null;
    $data->nip_dosen=Session::get('userID_login');

    if($data->save()){
      $update=$data::find($data->id);
      $update->save();
      session()->flash('success', 'Berhasil menambahkan kegiatan '.$kategori.' baru');
    }
    else{
      session()->flash('error', 'Gagal menambahkan kegiatan '.$kategori.' ');
    }


    return Redirect::to('pengabdian_non_dilitabmas');
  }
  else
  {

    switch ($kategori) {
      case 'pengabdian_dilitabmas':
      $title = 'Pengabdian Dilitabmas';
      break;
      case 'pengabdian_non_dilitabmas':
      $title = 'Pengabdian Non Dilitabmas';
      break;            
    }
    $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>$kategori,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'),'data_sumberdaya'=>$sumberdaya,'data_skema_peng'=>$skema_pengabdian,'data_jenis_penelitian'=>$jenis_penelitian);
    return View::make('form_tambah_peng_non_dilitabmas')->with('menu',$menu);
  }       

}





// edit dilitabmas
public function edit_peng_dilitabmas($kategori, $id){
  $skema_pengabdian=App\skema_pengabdian::all();
  $sumberdaya=App\sumberdaya::all();

  if(Session::get('userRole')=='Dosen' || Session::get("userID_login")==null){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }

  $data=$this->get_kategori_model($kategori);

  $model=$data->find($id);

  switch ($kategori) {
    case 'pengabdian_dilitabmas':
    $title = 'Pengabdian Dilitabmas';
    break;
    case 'pengabdian_non_dilitabmas':
    $title = 'Pengabdian Non Dilitabmas';
    break;            
  }

  $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>$kategori, 'data'=>$model,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'),'data_sumberdaya'=>$sumberdaya,'data_skema_peng'=>$skema_pengabdian);
  return View::make('form_edit_peng_dilitabmas')->with('menu', $menu);
}


public function edit_peng_non_dilitabmas($kategori, $id){
 $skema_pengabdian=App\skema_pengabdian::all();
 $sumberdaya=App\sumberdaya::all();
 $jenis_penelitian=App\jenis_penelitian::all();

 if(Session::get('userRole')=='Dosen' || Session::get("userID_login")==null){
  abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
}

$data=$this->get_kategori_model($kategori);

$model=$data->find($id);

switch ($kategori) {
  case 'pengabdian_dilitabmas':
  $title = 'Pengabdian Dilitabmas';
  break;
  case 'pengabdian_non_dilitabmas':
  $title = 'Pengabdian Non Dilitabmas';
  break;            
}

$menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>$kategori, 'data'=>$model,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'),'data_sumberdaya'=>$sumberdaya,'data_skema_peng'=>$skema_pengabdian,'data_jenis_penelitian'=>$jenis_penelitian);
return View::make('form_edit_peng_non_dilitabmas')->with('menu', $menu);
}


public function format_tgl($tgl){

 $tahun=substr($tgl, 0,4);
 $bulan=substr($tgl, 5,2);
 $hari=substr($tgl, 8,2);

 return $bulan."/".$hari."/".$tahun;
}


// update data dilitabmas
public function update_peng_dilitabmas($kategori, $id){
  if(Session::get('userRole')=='Dosen'){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }

  $data=$this->get_kategori_model($kategori);

  $update=$data::find($id);



  $update->judul=Request::get('judul');
  $update->ketua=Request::get('ketua');
  $update->anggota_1=Request::get('anggota_1');
  $update->anggota_2=Request::get('anggota_2');
  $update->anggota_3=Request::get('anggota_3');
  $update->anggota_4=Request::get('anggota_4');
  $update->anggota_5=Request::get('anggota_5');
  $update->skema=Request::get('skema_peng');
  $update->sumberdaya_iptek=Request::get('sumberdaya');
  $update->lama_kegiatan=Request::get('lama_kegiatan');
  $update->jumlah_mahasiswa=Request::get('jumlah_mahasiswa');
  $update->jumlah_alumni=Request::get('jumlah_alumni');
  $update->jumlah_staf=Request::get('jumlah_staf');
  $update->sumber_dana=Request::get('sumber_dana');
  $update->dana=Request::get('dana');
  $update->url=Request::get('url');
  $update->tahun=Request::get('tahun');

  $update->updated_at=date('Y-m-d H:i:s');
  $update->updated_by=Session::get("userID");

  if($update->save()){
    session()->flash('success', 'Berhasil memperbarui kegiatan '.$kategori);
  }
  else{
    session()->flash('error', 'Gagal memperbarui kegiatan '.$kategori);
  }


  return Redirect::to($kategori);

}



public function update_peng_non_dilitabmas($kategori, $id){
  if(Session::get('userRole')=='Dosen'){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }

  $data=$this->get_kategori_model($kategori);

  $update=$data::find($id);



  $update->judul=Request::get('judul');
  $update->ketua=Request::get('ketua');
  $update->anggota_1=Request::get('anggota_1');
  $update->anggota_2=Request::get('anggota_2');
  $update->anggota_3=Request::get('anggota_3');
  $update->anggota_4=Request::get('anggota_4');
  $update->anggota_5=Request::get('anggota_5');
  $update->jenis_pengabdian=Request::get('jenis_pengabdian');
  $update->skema=Request::get('skema_peng');
  $update->sumberdaya_iptek=Request::get('sumberdaya');
  $update->tahun_mulai=Request::get('tahun_mulai');
  $update->tahun_selesai=Request::get('tahun_selesai');
  $update->tahun_ke=Request::get('tahun_ke');
  $update->jumlah_mahasiswa=Request::get('jumlah_mahasiswa');
  $update->jumlah_alumni=Request::get('jumlah_alumni');
  $update->jumlah_staf=Request::get('jumlah_staf');
  $update->sumber_dana=Request::get('sumber_dana');
  $update->dana=Request::get('dana');
  $update->url=Request::get('url');
  $update->tahun=Request::get('tahun');

  $update->updated_at=date('Y-m-d H:i:s');
  $update->updated_by=Session::get("userID");

  if($update->save()){
    session()->flash('success', 'Berhasil memperbarui kegiatan '.$kategori);
  }
  else{
    session()->flash('error', 'Gagal memperbarui kegiatan '.$kategori);
  }


  return Redirect::to($kategori);

}




public function hapus_peng_dilitabmas($kategori, $id){
  if(Session::get('userRole')=='Dosen'){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }

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


    // hapus non dilitabmas
public function hapus_peng_non_dilitabmas($kategori, $id){
  if(Session::get('userRole')=='Dosen'){
    abort(404);
  }

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


// -------------------------------------------------------
// -------------------------------------------------------
// -----------------luaran jurnal-------------------------
// ------------------------------------------------------- 
// -------------------------------------------------------


public function luaran_jurnal_peng($kategori, $id){
  $jenis_publikasi=App\jenis_publikasi::all();

  if(Session::get('userRole')=='Dosen' || Session::get("userID_login")==null){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }

  $data=$this->get_kategori_model($kategori);

  $model=$data->find($id);

  switch ($kategori) {
    case 'pengabdian_dilitabmas':
    $title = 'Pengabdian Dilitabmas';
    break;
    case 'pengabdian_non_dilitabmas':
    $title = 'Pengabdian Non Dilitabmas';
    break;            
  }
  $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>$kategori, 'data'=>$model,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'),'data_jenis_publikasi'=>$jenis_publikasi);
  return View::make('luaran_jurnal_peng')->with('menu', $menu);
}



public function luaran_buku_ajar_peng($kategori, $id){
  $tse=App\tse::all();

  if(Session::get('userRole')=='Dosen' || Session::get("userID_login")==null){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }

  $data=$this->get_kategori_model($kategori);

  $model=$data->find($id);

  switch ($kategori) {
    case 'pengabdian_dilitabmas':
    $title = 'Pengabdian Dilitabmas';
    break;
    case 'pengabdian_non_dilitabmas':
    $title = 'Pengabdian Non Dilitabmas';
    break;            
  }
  $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>$kategori, 'data'=>$model,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'),'data_tse'=>$tse);
  return View::make('luaran_buku_ajar_peng')->with('menu', $menu);
}


public function luaran_pemakalah_peng($kategori, $id){
  $forum_ilmiah=App\forum_ilmiah::all();
  $status_pemakalah=App\status_pemakalah::all();

  if(Session::get('userRole')=='Dosen' || Session::get("userID_login")==null){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }

  $data=$this->get_kategori_model($kategori);

  $model=$data->find($id);

  switch ($kategori) {
    case 'pengabdian_dilitabmas':
    $title = 'Pengabdian Dilitabmas';
    break;
    case 'pengabdian_non_dilitabmas':
    $title = 'Pengabdian Non Dilitabmas';
    break;            
  }

  $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>$kategori, 'data'=>$model,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'),'data_forum_ilmiah'=>$forum_ilmiah,'data_status_pemakalah'=>$status_pemakalah);
  return View::make('luaran_pemakalah_peng')->with('menu', $menu);
}

public function luaran_hki_peng($kategori, $id){

  $jenis_hki=App\jenis_hki::all();
  $status_hki=App\status_hki::all();
  if(Session::get('userRole')=='Dosen' || Session::get("userID_login")==null){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }

  $data=$this->get_kategori_model($kategori);

  $model=$data->find($id);

  switch ($kategori) {
    case 'pengabdian_dilitabmas':
    $title = 'Pengabdian Dilitabmas';
    break;
    case 'pengabdian_non_dilitabmas':
    $title = 'Pengabdian Non Dilitabmas';
    break;            
  }

  $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>$kategori, 'data'=>$model,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'),'data_jenis_hki'=>$jenis_hki,'data_status_hki'=>$status_hki);
  return View::make('luaran_hki_peng')->with('menu', $menu);
}


public function luaran_lain_peng($kategori, $id){

  $jenis_luaran_lain=App\jenis_luaran_lain::all();

  if(Session::get('userRole')=='Dosen' || Session::get("userID_login")==null){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }

  $data=$this->get_kategori_model($kategori);

  $model=$data->find($id);

  switch ($kategori) {
    case 'pengabdian_dilitabmas':
    $title = 'Pengabdian Dilitabmas';
    break;
    case 'pengabdian_non_dilitabmas':
    $title = 'Pengabdian Non Dilitabmas';
    break;            
  }
  $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>$kategori, 'data'=>$model,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'),'data_jenis_luaran_lain'=>$jenis_luaran_lain);
  return View::make('luaran_lain_peng')->with('menu', $menu);
}


// akhir controller
}


