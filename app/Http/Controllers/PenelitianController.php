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


class PenelitianController extends Controller {

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
  case 'penelitian_dilitabmas':
  $data=new App\penelitian_dilitabmas;
  break;
  case 'penelitian_non_dilitabmas':
  $data=new App\penelitian_non_dilitabmas;
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
public function penelitian_non_dilitabmas()
{

  $penelitian_non_dilitabmas=new App\penelitian_non_dilitabmas;
  $data=$penelitian_non_dilitabmas->where('nip_dosen', '=', Session::get('userID_login'))->orderBy('id', 'DESC')->get();

  $menu=array('menu'=>'penelitian_non_dilitabmas','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'', 'data'=>$data,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'));
  foreach ($data as $penelitian_non_dilitabmas) {
    $penelitian_non_dilitabmas->bukti_kinerja=explode(",", $penelitian_non_dilitabmas->bukti_kinerja);
  }
  return View::make('penelitian/penelitian_non_dilitabmas')->with('menu',$menu);
}


public function penelitian_dilitabmas()
{
 $penelitian_dilitabmas=new App\penelitian_dilitabmas;
 $data=$penelitian_dilitabmas->where('nip_dosen', '=', Session::get('userID_login'))->orderBy('id', 'DESC')->get();

 $menu=array('menu'=>'penelitian_dilitabmas','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'', 'data'=>$data,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'));
 foreach ($data as $penelitian_dilitabmas) {
  $penelitian_dilitabmas->bukti_kinerja=explode(",", $penelitian_dilitabmas->bukti_kinerja);
}
return View::make('penelitian/penelitian_dilitabmas')->with('menu',$menu);
}

// tambah data

public function tambah_non_dilitabmas()
{
 $isi_jenis_penelitian=App\jenis_penelitian::all();
 $skema_penelitian=App\skema_penelitian::all();
 $kategori_bidang=App\kategori_bidang::all();
 $kategori_tse=App\kategori_tse::all();
 $bidang=App\bidang::all();
 $tse=App\tse::all();
 $institusi=App\institusi::all();

 if(Session::get('userRole')=='Dosen'){
  abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
}

if(Request::isMethod('post'))
{
  if (Session::get('userID_login')==null) {
    session()->flash('error', 'Belum memilih data dosen');
    return Redirect::to('penelitian_non_dilitabmas');
  }

  $request=new \Illuminate\Http\Request;
  $this->validate($request,[
    'created_at'=>'date_format:Y-m-d H:i:s',
  ]);        
  $data=new App\penelitian_non_dilitabmas;

  $data->judul=Request::get('judul');
  $data->ketua=Request::get('ketua');
  $data->anggota_1=Request::get('anggota_1');
  $data->anggota_2=Request::get('anggota_2');
  $data->anggota_3=Request::get('anggota_3');
  $data->anggota_4=Request::get('anggota_4');
  $data->anggota_5=Request::get('anggota_5');
  $data->isi_jenis_penelitian=Request::get('isi_jenis_penelitian');
  $data->skema=Request::get('skema_penelitian');
  $data->kategori_bidang=Request::get('kategori_bidang');
  $data->bidang=Request::get('bidang');
  $data->kategori_tse=Request::get('kategori_tse');
  $data->tse=Request::get('tse');
  $data->ins_sumber_dana=Request::get('institusi');
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
$data->jenis_penelitian=Request::get('jenis_penelitian');

  if($data->save()){
    $update=$data::find($data->id);
    $update->save();
    session()->flash('success', 'Berhasil menambahkan kegiatan baru');
  }
  else{
    session()->flash('error', 'Gagal menambahkan kegiatan');
  }

  return Redirect::to('penelitian_non_dilitabmas');
}
else
{

    $title = 'Penelitian Non Dilitabmas';
 


  $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>'penelitian_non_dilitabmas','userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'), 'data_jenis_penelitian'=>$isi_jenis_penelitian,'data_skema_penelitian'=>$skema_penelitian,'data_kategori_bidang'=>$kategori_bidang,'data_kategori_tse'=>$kategori_tse,'data_bidang'=>$bidang,'data_tse'=>$tse,'data_institusi'=>$institusi);
  return View::make('form_tambah_non_dilitabmas')->with('menu',$menu);
}      
}


public function tambah_dilitabmas()
{   

  $hibah=App\hibah::all();
  $skema_penelitian=App\skema_penelitian::all();
  $kategori_bidang=App\kategori_bidang::all();
  $kategori_tse=App\kategori_tse::all();
  $bidang=App\bidang::all();
  $tse=App\tse::all();



  if(Session::get('userRole')=='Dosen'){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
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
    $data=new App\penelitian_dilitabmas;

    $data->judul=Request::get('judul');
    $data->ketua=Request::get('ketua');
    $data->anggota_1=Request::get('anggota_1');
    $data->anggota_2=Request::get('anggota_2');
    $data->anggota_3=Request::get('anggota_3');
    $data->anggota_4=Request::get('anggota_4');
    $data->anggota_5=Request::get('anggota_5');
    $data->hibah=Request::get('hibah');
    $data->skema=Request::get('skema_penelitian');
    $data->kategori_bidang=Request::get('kategori_bidang');
    $data->bidang=Request::get('bidang');
    
    $data->kategori_tse=Request::get('kategori_tse');
    $data->tse=Request::get('tse');
    $data->dana=Request::get('dana');
    $data->url=Request::get('url');
    $data->tahun=Request::get('tahun');
    
    $data->created_at=date('Y-m-d H:i:s');
    $data->updated_at=null;
    $data->created_by=Session::get('userID');
    $data->updated_by=null;
    $data->deleted_at=null;
    $data->nip_dosen=Session::get('userID_login');
    $data->jenis_penelitian=Request::get('jenis_penelitian');

    if($data->save()){
      $update=$data::find($data->id);
      $update->save();
      session()->flash('success', 'Berhasil menambahkan kegiatan baru');
    }
    else{
      session()->flash('error', 'Gagal menambahkan kegiatan ');
    }


    return Redirect::to('penelitian_dilitabmas');
  }
  else
  {
 
    $title = 'Penelitian Dilitabmas';
  
    $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>'penelitian_dilitabmas','userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'), 'data_hibah'=>$hibah,'data_skema_penelitian'=>$skema_penelitian,'data_kategori_bidang'=>$kategori_bidang,'data_kategori_tse'=>$kategori_tse,'data_bidang'=>$bidang,'data_tse'=>$tse);
    return View::make('form_tambah_dilitabmas')->with('menu',$menu);
  }       

}


// edit dilitabmas
public function edit_dilitabmas($id){

  $hibah=App\hibah::all();
  $skema_penelitian=App\skema_penelitian::all();
  $kategori_bidang=App\kategori_bidang::all();
  $kategori_tse=App\kategori_tse::all();
  $bidang=App\bidang::all();
  $tse=App\tse::all();

  if(Session::get('userRole')=='Dosen' || Session::get("userID_login")==null){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }

  $data=new App\penelitian_dilitabmas;

  $model=$data->find($id);


    $title = 'Penelitian Dilitabmas';
    

  $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>'penelitian_dilitabmas', 'data'=>$model,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'),'data_hibah'=>$hibah,'data_skema_penelitian'=>$skema_penelitian,'data_kategori_bidang'=>$kategori_bidang,'data_kategori_tse'=>$kategori_tse,'data_bidang'=>$bidang,'data_tse'=>$tse);
  return View::make('form_edit_dilitabmas')->with('menu', $menu);
}


public function edit_non_dilitabmas($id)
{
 $jenis_penelitian=App\jenis_penelitian::all();
 $skema_penelitian=App\skema_penelitian::all();
 $kategori_bidang=App\kategori_bidang::all();
 $kategori_tse=App\kategori_tse::all();
 $bidang=App\bidang::all();
 $tse=App\tse::all();
 $institusi=App\institusi::all();


 if(Session::get('userRole')=='Dosen' || Session::get("userID_login")==null){
  abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
}

$data=new App\penelitian_non_dilitabmas;

$model=$data->find($id);

 
    $title = 'Penelitian Non Dilitabmas';
  
$menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>'penelitian_non_dilitabmas', 'data'=>$model,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'), 'data_jenis_penelitian'=>$jenis_penelitian,'data_skema_penelitian'=>$skema_penelitian,'data_kategori_bidang'=>$kategori_bidang,'data_kategori_tse'=>$kategori_tse,'data_bidang'=>$bidang,'data_tse'=>$tse,'data_institusi'=>$institusi);
return View::make('form_edit_non_dilitabmas')->with('menu', $menu);
}


public function lihat_dilitabmas($id){

  $hibah=App\hibah::all();
  $skema_penelitian=App\skema_penelitian::all();
  $kategori_bidang=App\kategori_bidang::all();
  $kategori_tse=App\kategori_tse::all();
  $bidang=App\bidang::all();
  $tse=App\tse::all();

  if(Session::get('userRole')=='Dosen' || Session::get("userID_login")==null){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }

  $data=new App\penelitian_dilitabmas;

  $model=$data->find($id);


    $title = 'Penelitian Dilitabmas';
    

  $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>'penelitian_dilitabmas', 'data'=>$model,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'),'data_hibah'=>$hibah,'data_skema_penelitian'=>$skema_penelitian,'data_kategori_bidang'=>$kategori_bidang,'data_kategori_tse'=>$kategori_tse,'data_bidang'=>$bidang,'data_tse'=>$tse);
  return View::make('lihat_dilitabmas')->with('menu', $menu);
}


public function lihat_non_dilitabmas($id)
{
 $jenis_penelitian=App\jenis_penelitian::all();
 $skema_penelitian=App\skema_penelitian::all();
 $kategori_bidang=App\kategori_bidang::all();
 $kategori_tse=App\kategori_tse::all();
 $bidang=App\bidang::all();
 $tse=App\tse::all();
 $institusi=App\institusi::all();


 if(Session::get('userRole')=='Dosen' || Session::get("userID_login")==null){
  abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
}

$data=new App\penelitian_non_dilitabmas;

$model=$data->find($id);

 
    $title = 'Penelitian Non Dilitabmas';
  
$menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>'penelitian_non_dilitabmas', 'data'=>$model,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'), 'data_jenis_penelitian'=>$jenis_penelitian,'data_skema_penelitian'=>$skema_penelitian,'data_kategori_bidang'=>$kategori_bidang,'data_kategori_tse'=>$kategori_tse,'data_bidang'=>$bidang,'data_tse'=>$tse,'data_institusi'=>$institusi);
return View::make('lihat_non_dilitabmas')->with('menu', $menu);
}


public function format_tgl($tgl){

 $tahun=substr($tgl, 0,4);
 $bulan=substr($tgl, 5,2);
 $hari=substr($tgl, 8,2);

 return $bulan."/".$hari."/".$tahun;
}


// update data dilitabmas
public function update_dilitabmas($kategori, $id){
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
  $update->hibah=Request::get('hibah');
  $update->skema=Request::get('skema_penelitian');
  $update->kategori_bidang=Request::get('kategori_bidang');
  $update->bidang=Request::get('bidang');
  $update->kategori_tse=Request::get('kategori_tse');
  $update->tse=Request::get('tse');
  $update->dana=Request::get('dana');
  $update->url=Request::get('url');
  $update->tahun=Request::get('tahun');
  $update->updated_at=date('Y-m-d H:i:s');
  $update->updated_by=Session::get("userID");

  if($update->save()){
    session()->flash('success', 'Berhasil memperbarui kegiatan ' );
 }
 else{
  session()->flash('error', 'Gagal memperbarui kegiatan ' );
}


return Redirect::to($kategori);

}



public function update_non_dilitabmas($kategori, $id){
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
  $update->jenis_penelitian=Request::get('jenis_penelitian');
  $update->skema=Request::get('skema_penelitian');
  $update->kategori_bidang=Request::get('kategori_bidang');
  $update->bidang=Request::get('bidang');
  $update->kategori_tse=Request::get('kategori_tse');
  $update->tse=Request::get('tse');
  $update->ins_sumber_dana=Request::get('institusi');
  $update->sumber_dana=Request::get('sumber_dana');
  $update->dana=Request::get('dana');
  $update->url=Request::get('url');
  $update->tahun=Request::get('tahun');
  $update->updated_at=date('Y-m-d H:i:s');
  $update->updated_by=Session::get("userID");
  
  
  if($update->save()){
    Session::flash('success', 'Berhasil memperbarui kegiatan '.$kategori);
  }
  else{
    Session::flash('error', 'Gagal memperbarui kegiatan '.$kategori);
  }


  return Redirect::to($kategori);

}




public function hapus_dilitabmas($kategori, $id){
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
  // dd(session("success"));

  return redirect($kategori);
}


    // hapus non dilitabmas
public function hapus_non_dilitabmas($kategori, $id){
  if(Session::get('userRole')=='Dosen'){
    abort(404);
  }

  exit();

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

public function tampil_pen_luaran_buku()
{

  $tampil=new App\pen_luaran_buku_ajar;
  $data=$tampil->where('nip_dosen', '=', Session::get('userID_login'))->orderBy('id', 'DESC')->get();

  $menu=array('menu'=>'tampil_pen_luaran_buku','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'', 'data'=>$data,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'));
  foreach ($data as $tampil) {
    $tampil->bukti_kinerja=explode(",", $tampil->bukti_kinerja);
  }
  return View::make('luaran/pen_luaran_buku')->with('menu',$menu);
}

public function luaran_buku_ajar($kategori, $id){


  if(Session::get('userRole')=='Dosen' || Session::get("userID_login")==null){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }
$luaran=new App\pen_luaran_buku_ajar;
  $data=$this->get_kategori_model($kategori);

  $model=$data->find($id);

  switch ($kategori) {
    case 'penelitian_dilitabmas':
    $title = 'Penelitian Dilitabmas';
    break;
    case 'penelitian_non_dilitabmas':
    $title = 'Penelitian Non Dilitabmas';
    break;            
  }

  $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>$kategori, 'data'=>$model,'luaran'=>$luaran,'userfak'=>Session::get('userFak'),'id_penelitian'=>Session::get('id'),'ketdosen'=>Session::get('ketDosen'));
  return View::make('tambah_pen_luaran_buku_ajar')->with('menu', $menu);
}



public function tambah_pen_luaran_buku($kategori, $id){
  if(Session::get('userRole')=='Dosen'){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }

  $data=$this->get_kategori_model($kategori);
$luaran=new App\pen_luaran_buku_ajar;

    $luaran->judul=Request::get('judul');
    $luaran->penerbit=Request::get('penerbit');
    $luaran->isbn=Request::get('isbn');
    $luaran->jumlah_halaman=Request::get('jumlah_halaman');
    $luaran->tahun=Request::get('tahun');
    $luaran->sumberdana=Request::get('sumberdana');
    $luaran->dana=Request::get('dana');
    $luaran->url=Request::get('url');
    $luaran->created_at=date('Y-m-d H:i:s');
    $luaran->updated_at=null;
    $luaran->created_by=Session::get('userID');
    $luaran->updated_by=null;
    $luaran->deleted_at=null;
    $luaran->nip_dosen=Session::get('userID_login');
    $luaran->id_penelitian=Request::get('id');
    $luaran->jenis_penelitian=Request::get('jenis_penelitian');
  
  if($luaran->save()){
    Session::flash('success', 'Berhasil memperbarui kegiatan ');
  }
  else{
    Session::flash('error', 'Gagal memperbarui kegiatan ');
  }


  return Redirect::to($kategori);

}

public function hapus_buku($id){
  if(Session::get('userRole')=='Dosen'){
    abort(404);
  }

  exit();

  $data=new App\pen_luaran_buku;

  $model=$data::findOrfail($id);

  if($model->delete())
  {
    Session::flash('success', 'Data kegiatan berhasil dihapus');
  }
  else{
    Session::flash('error', 'Data kegiatan gagal dihapus');
  }
  return redirect('tampil_pen_luaran_buku');
}


public function tampil_pen_luaran_jurnal()
{

  $tampil=new App\pen_luaran_jurnal;
  $data=$tampil->where('nip_dosen', '=', Session::get('userID_login'))->orderBy('id', 'DESC')->get();

  $menu=array('menu'=>'tampil_luaran_jurnal','submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'', 'data'=>$data,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'));
  foreach ($data as $tampil) {
    $tampil->bukti_kinerja=explode(",", $tampil->bukti_kinerja);
  }
  return View::make('luaran/pen_luaran_jurnal')->with('menu',$menu);
}


public function luaran_jurnal($kategori, $id){


  if(Session::get('userRole')=='Dosen' || Session::get("userID_login")==null){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }
$jenis_publikasi=App\jenis_publikasi::all();
$luaran=new App\pen_luaran_jurnal;
  $data=$this->get_kategori_model($kategori);

  $model=$data->find($id);

  switch ($kategori) {
    case 'penelitian_dilitabmas':
    $title = 'Penelitian Dilitabmas';
    break;
    case 'penelitian_non_dilitabmas':
    $title = 'Penelitian Non Dilitabmas';
    break;            
  }

  $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>$kategori, 'data'=>$model,'luaran'=>$luaran,'userfak'=>Session::get('userFak'),'id_penelitian'=>Session::get('id'),'ketdosen'=>Session::get('ketDosen'),'data_jenis_publikasi'=>$jenis_publikasi);
  return View::make('tambah_pen_luaran_jurnal')->with('menu', $menu);
}



public function tambah_pen_luaran_jurnal($kategori, $id){
  if(Session::get('userRole')=='Dosen'){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }
$jenis_publikasi=App\jenis_publikasi::all();
  $data=$this->get_kategori_model($kategori);
$luaran=new App\pen_luaran_jurnal;
    $luaran->judul=Request::get('judul');
    $luaran->penulis_publikasi=Request::get('penulis_publikasi');
    $luaran->nama_jurnal=Request::get('nama_jurnal');
    $luaran->jenis_publikasi=Request::get('jenis_publikasi');
    $luaran->issn=Request::get('issn');
    $luaran->volume=Request::get('volume');
    $luaran->nomor=Request::get('nomor');
    $luaran->halaman_awal=Request::get('halaman_awal');
    $luaran->halaman_akhir=Request::get('halaman_akhir');
    $luaran->tahun=Request::get('tahun');
    $luaran->sumberdana=Request::get('sumberdana');
    $luaran->dana=Request::get('dana');
    $luaran->url=Request::get('url');
    $luaran->created_at=date('Y-m-d H:i:s');
    $luaran->updated_at=null;
    $luaran->created_by=Session::get('userID');
    $luaran->updated_by=null;
    $luaran->deleted_at=null;
    $luaran->nip_dosen=Session::get('userID_login');
    $luaran->id_penelitian=Request::get('id');
    $luaran->jenis_penelitian=Request::get('jenis_penelitian');
  
  if($luaran->save()){
    Session::flash('success', 'Berhasil memperbarui kegiatan ');
  }
  else{
    Session::flash('error', 'Gagal memperbarui kegiatan ');
  }


  return Redirect::to($kategori);

}





















public function luaran_pemakalah($kategori, $id){
$forum_ilmiah=App\forum_ilmiah::all();
$status_pemakalah=App\status_pemakalah::all();

  if(Session::get('userRole')=='Dosen' || Session::get("userID_login")==null){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }

  $data=$this->get_kategori_model($kategori);

  $model=$data->find($id);

  switch ($kategori) {
    case 'penelitian_dilitabmas':
    $title = 'Penelitian Dilitabmas';
    break;
    case 'penelitian_non_dilitabmas':
    $title = 'Penelitian Non Dilitabmas';
    break;            
  }

  $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>$kategori, 'data'=>$model,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'),'data_forum_ilmiah'=>$forum_ilmiah,'data_status_pemakalah'=>$status_pemakalah);
  return View::make('luaran_pemakalah')->with('menu', $menu);
}

public function luaran_hki($kategori, $id){

$jenis_hki=App\jenis_hki::all();
$status_hki=App\status_hki::all();
  if(Session::get('userRole')=='Dosen' || Session::get("userID_login")==null){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }

  $data=$this->get_kategori_model($kategori);

  $model=$data->find($id);

  switch ($kategori) {
    case 'penelitian_dilitabmas':
    $title = 'Penelitian Dilitabmas';
    break;
    case 'penelitian_non_dilitabmas':
    $title = 'Penelitian Non Dilitabmas';
    break;            
  }

  $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>$kategori, 'data'=>$model,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'),'data_jenis_hki'=>$jenis_hki,'data_status_hki'=>$status_hki);
  return View::make('luaran_hki')->with('menu', $menu);
}


public function luaran_lain($kategori, $id){

$jenis_luaran_lain=App\jenis_luaran_lain::all();

  if(Session::get('userRole')=='Dosen' || Session::get("userID_login")==null){
    abort(404);
            // return back()->with("gagal", "Anda tidak memiliki hak akses untuk menambah");
  }

  $data=$this->get_kategori_model($kategori);

  $model=$data->find($id);

  switch ($kategori) {
    case 'penelitian_dilitabmas':
    $title = 'Penelitian Dilitabmas';
    break;
    case 'penelitian_non_dilitabmas':
    $title = 'Penelitian Non Dilitabmas';
    break;            
  }

  $menu=array('menu'=>$title,'submenu'=>'','hakAkses'=>Session::get('userRole'),'userId'=>Session::get('userID_login'),'jml_data'=>'','kategori'=>$kategori, 'data'=>$model,'userfak'=>Session::get('userFak'),'ketdosen'=>Session::get('ketDosen'),'data_jenis_luaran_lain'=>$jenis_luaran_lain);
  return View::make('luaran_lain')->with('menu', $menu);
}


// akhir controller
}


