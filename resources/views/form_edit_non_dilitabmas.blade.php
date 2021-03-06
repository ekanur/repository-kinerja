@extends('layout.master',['menu'=>$menu])
@section('content')
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
   <div class="col-md-10 col-md-offset-1">
    <!-- general form elements -->
    @if(session('success'))
    <div class='alert alert-success'>{{session('success')}}</div>
    @elseif(session('error'))
    <div class='alert alert-danger'>{{session('error')}}</div>   
    @endif
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit {{$menu['menu']}} : <em>"{{$menu['data']->judul}}"</em></h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      @if(App::environment()=='production')
      <form role="form" method="POST" action="{{secure_asset($menu['kategori'].'/update_non_dilitabmas/'.$menu['data']->id)}}" enctype="multipart/form-data">
        @else
        <form role="form" method="POST" action="{{url($menu['kategori'].'/update_non_dilitabmas/'.$menu['data']->id)}}" enctype="multipart/form-data">
          @endif
          {{csrf_field()}}
          <input type="hidden" name='kategori' id="kategori" value="{{$menu['kategori']}}">
          <input type="hidden" name="id" id="id" value="{{$menu['data']->id}}">
          <div class="box-body">
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" required="" value='{{$menu['data']->judul}}'>
            </div>

              <div class="form-group">
              <label for="ketua">Ketua</label>
               <select class="select2 form-control" name="ketua" id="ketua" required="">
                <option value="{{$menu['data']->ketua}}">{{$menu['data']->ketua}}</option>   
                @foreach($menu['data_daftar_dosen'] as $daftar_dosen)
                <option value=" {{$daftar_dosen->dsn_gelar.''.$daftar_dosen->dsn_nm.''.$daftar_dosen->dsn_gelar2}}">  {{$daftar_dosen->dsn_gelar.$daftar_dosen->dsn_nm.$daftar_dosen->dsn_gelar2}}</option>@endforeach
              </select>
            </div>
             <!--   <div class="form-group col-md-6" >
               <label for="dosen">dosen</label>
               <select class="select2 form-control" name="dosen" id="dosen">
                <option value="">-- Pilih Skema Penelitian --</option>   
                @foreach($menu['data_daftar_dosen'] as $daftar_dosen)
                <option value=" {{$daftar_dosen->dsn_nm.''.$daftar_dosen->dsn_gelar2}}">  {{$daftar_dosen->dsn_gelar.$daftar_dosen->dsn_nm.$daftar_dosen->dsn_gelar2}}</option>                           
                @endforeach
              </select>
            </div>
          </div> -->

            <div class="form-group">
              <label for="anggota_1">Anggota 1</label>
               <select class="select2 form-control" name="cari_anggota1" id="cari_anggota1">
                <option value="{{$menu['data']->anggota_1}}">{{$menu['data']->anggota_1}}</option>   
                 <option value="">-- Kosongkan jika tidak ada --</option> 
                @foreach($menu['data_daftar_dosen'] as $daftar_dosen)
                <option value=" {{$daftar_dosen->dsn_gelar.''.$daftar_dosen->dsn_nm.''.$daftar_dosen->dsn_gelar2}}">  {{$daftar_dosen->dsn_gelar.$daftar_dosen->dsn_nm.$daftar_dosen->dsn_gelar2}}</option>@endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="anggota_2">Anggota 2</label>
             <select class="select2 form-control" name="cari_anggota2" id="cari_anggota2">
                <option value="{{$menu['data']->anggota_2}}">{{$menu['data']->anggota_2}}</option>   
                 <option value="">-- Kosongkan jika tidak ada --</option> 
                @foreach($menu['data_daftar_dosen'] as $daftar_dosen)
                <option value=" {{$daftar_dosen->dsn_gelar.''.$daftar_dosen->dsn_nm.''.$daftar_dosen->dsn_gelar2}}">  {{$daftar_dosen->dsn_gelar.$daftar_dosen->dsn_nm.$daftar_dosen->dsn_gelar2}}</option>@endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="anggota_3">Anggota 3</label>
             <select class="select2 form-control" name="cari_anggota3" id="cari_anggota3">
                <option value="{{$menu['data']->anggota_3}}">{{$menu['data']->anggota_3}}</option>   
                 <option value="">-- Kosongkan jika tidak ada --</option> 
                @foreach($menu['data_daftar_dosen'] as $daftar_dosen)
                <option value=" {{$daftar_dosen->dsn_gelar.''.$daftar_dosen->dsn_nm.''.$daftar_dosen->dsn_gelar2}}">  {{$daftar_dosen->dsn_gelar.$daftar_dosen->dsn_nm.$daftar_dosen->dsn_gelar2}}</option>@endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="anggota_4">Anggota 4</label>
             <select class="select2 form-control" name="cari_anggota4" id="cari_anggota4">
                <option value="{{$menu['data']->anggota_4}}">{{$menu['data']->anggota_4}}</option>   
                 <option value="">-- Kosongkan jika tidak ada --</option> 
                @foreach($menu['data_daftar_dosen'] as $daftar_dosen)
                <option value=" {{$daftar_dosen->dsn_gelar.''.$daftar_dosen->dsn_nm.''.$daftar_dosen->dsn_gelar2}}">  {{$daftar_dosen->dsn_gelar.$daftar_dosen->dsn_nm.$daftar_dosen->dsn_gelar2}}</option>@endforeach
              </select>
            </div> 


            <div class="form-group">
              <label for="anggota_5">Anggota 5</label>
             <select class="select2 form-control" name="cari_anggota5" id="cari_anggota5">
                <option value="{{$menu['data']->anggota_5}}">{{$menu['data']->anggota_5}}</option>   
                 <option value="">-- Kosongkan jika tidak ada --</option> 
                @foreach($menu['data_daftar_dosen'] as $daftar_dosen)
                <option value=" {{$daftar_dosen->dsn_gelar.''.$daftar_dosen->dsn_nm.''.$daftar_dosen->dsn_gelar2}}">  {{$daftar_dosen->dsn_gelar.$daftar_dosen->dsn_nm.$daftar_dosen->dsn_gelar2}}</option>@endforeach
              </select>
            </div>


            <div class="row">
              <div class="form-group col-md-6" >
               <label for="jenis_penelitian">Jenis Penelitian</label>
               <select class="select2 form-control" name="jenis_penelitian" id="jenis_penelitian">
                 <option value="{{$menu['data']->isi_jenis_penelitian}}">{{$menu['data']->isi_jenis_penelitian}}</option>   
                 @foreach($menu['data_jenis_penelitian'] as $jenis_penelitian)
                 <option value="{{$jenis_penelitian->jenis_penelitian}}">  {{$jenis_penelitian->jenis_penelitian}}</option>                           
                 @endforeach
               </select>
             </div>

             <div class="form-group col-md-6">
               <label for="skema">Skema</label>
               <select class="select2 form-control" name="skema_penelitian" id="skema_penelitian">
                 <option value="{{$menu['data']->skema}}">{{$menu['data']->skema}}</option>   
                 @foreach($menu['data_skema_penelitian'] as $skema_penelitian)
                 <option value="{{$skema_penelitian->skema_penelitian}}">  {{$skema_penelitian->skema_penelitian}}</option>                           
                 @endforeach
               </select>            
             </div>
           </div>
           <div class="row">

             <div class="form-group col-md-6">
               <label for="kategori bidang">Kategori Bidang</label>
               <select class="select2 form-control" name="kategori_bidang" id="kategori_bidang">
                <option value="{{$menu['data']->kategori_bidang}}">{{$menu['data']->kategori_bidang}}</option>   
                @foreach($menu['data_kategori_bidang'] as $kategori_bidang)
                <option value=" {{$kategori_bidang->kategori_bidang}}">  {{$kategori_bidang->kategori_bidang}}</option>                           
                @endforeach
              </select>
            </div>

            <div class="form-group col-md-6">
             <label for="bidang">Bidang</label>
             <select class="select2 form-control" name="bidang" id="bidang" placeholder="bidang">
               <option value="{{$menu['data']->bidang}}">{{$menu['data']->bidang}}</option>   
               @foreach($menu['data_bidang'] as $bidang)
               <option value=" {{$bidang->bidang}}">  {{$bidang->bidang}}</option>                           
               @endforeach
             </select>
           </div>
         </div>
         <div class="row">
           <div class="form-group col-md-6" >
             <label for="kategori tse">Kategori Tujuan Sosial Ekonomi</label>
             <select class="select2 form-control" name="kategori_tse" id="kategori_tse">
              <option value="{{$menu['data']->kategori_tse}}">{{$menu['data']->kategori_tse}}</option>   
              @foreach($menu['data_kategori_tse'] as $kategori_tse)
              <option value=" {{$kategori_tse->kategori_tse}}">  {{$kategori_tse->kategori_tse}}</option>                           
              @endforeach
            </select>
          </div>

          <div class="form-group col-md-6" >
           <label for="tse">Tujuan Sosial Ekonomi</label>
           <select class="select2 form-control" name="tse" id="tse">
             <option value="{{$menu['data']->tse}}">{{$menu['data']->tse}}</option>   

             @foreach($menu['data_tse'] as $tse)
             <option value=" {{$tse->tse}}">  {{$tse->tse}}</option>                           
             @endforeach
           </select>
         </div>
       </div>
       <div class="row">

         <div class="form-group col-md-4" >
           <label for="Institusi">Institusi</label>
           <select class="select2 form-control" name="institusi" id="institusi">
            <option value="{{$menu['data']->ins_sumber_dana}}">{{$menu['data']->ins_sumber_dana}}</option>   
            @foreach($menu['data_institusi'] as $institusi)
            <option value=" {{$institusi->institusi}}">  {{$institusi->institusi}}</option>                           
            @endforeach
          </select>
        </div>

        <div class="form-group col-md-8" >
          <label for="sumber_dana">Sumber Dana</label>
          <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" placeholder="Dana kegiatan" value="{{$menu['data']->sumber_dana}}">
        </div>

      </div>
      
      <div class="row">
       <div class="form-group col-md-9" >
        <label for="dana">Jumlah Dana</label>
        <div class="input-group">
          <div class="input-group-addon">Rp
          </div>
          <input type="number" class="form-control" id="dana" name="dana" placeholder="Dana kegiatan" value="{{$menu['data']->dana}}">
        </div>
      </div>
      <div class="form-group col-md-3" >
        <label for="tahun">Tahun</label>
        <select class="select2 form-control" name="tahun" id="tahun">
          <option value="{{$menu['data']->tahun}}">{{$menu['data']->tahun}}</option>
          <option value="">Pilih Tahun</option>
          <?php
          $thn_skr = date('Y');
          for ($x = $thn_skr; $x >= 1954; $x--) {
            ?>
            <option value=" {{$x}} ">{{$x}}</option>
            <?php
          }
          ?>
        </select>
      </div>
    </div>



   <div class="form-group">
      <label for="url_kegiatan">URL kegiatan</label>
      <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="{{$menu['data']->url}}">
    </div>
<!-- <div class="row">
    <div class="form-group col-md-9 " >
      <label for="abstrak">Abstrak</label>
      <textarea  rows="10" cols="30" class="form-control" id="abstrak" name="abstrak" placeholder="Inputkan abstrak dari kegiatan">{{$menu['data']->abstrak}}
    </textarea>
    </div>
  </div>
 -->
  </div><!-- /.box-body -->

  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Perbarui</button>
  </div>
</form>
</div><!-- /.box -->
</div>
</div><!-- /.row -->
</section><!-- /.content -->
@endsection
