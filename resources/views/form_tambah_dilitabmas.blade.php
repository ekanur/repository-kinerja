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
        <h3 class="box-title">Tambah  {{$menu['menu']}}
        </h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      @if(App::environment()=='production')
      <form role="form" method="POST" action="{{secure_asset($menu['kategori'].'/tambah_dilitabmas')}}" enctype="multipart/form-data">
        @else
        <form role="form" method="POST" action="{{url($menu['kategori'].'/tambah_dilitabmas')}}" enctype="multipart/form-data">
          @endif
          {{csrf_field()}}
          <input type="hidden" id="kategori" value="{{$menu['kategori']}}">
          <input type="hidden" id="jenis_penelitian" name="jenis_penelitian" value="dilitabmas">
          <div class="box-body">
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required="" value="{{old('judul')}}">
            </div>

           <div class="form-group">
              <label for="ketua">Ketua</label>
               <select class="select2 form-control" name="ketua" id="ketua" required="">
                <option value="">-- Pilih Ketua --</option>   
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
                <option value="">-- Kosongkan jika tidak ada --</option>   
                @foreach($menu['data_daftar_dosen'] as $daftar_dosen)
                <option value=" {{$daftar_dosen->dsn_gelar.''.$daftar_dosen->dsn_nm.''.$daftar_dosen->dsn_gelar2}}">  {{$daftar_dosen->dsn_gelar.$daftar_dosen->dsn_nm.$daftar_dosen->dsn_gelar2}}</option>@endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="anggota_2">Anggota 2</label>
             <select class="select2 form-control" name="cari_anggota2" id="cari_anggota2">
                <option value="">-- Kosongkan jika tidak ada --</option>   
                @foreach($menu['data_daftar_dosen'] as $daftar_dosen)
                <option value=" {{$daftar_dosen->dsn_gelar.''.$daftar_dosen->dsn_nm.''.$daftar_dosen->dsn_gelar2}}">  {{$daftar_dosen->dsn_gelar.$daftar_dosen->dsn_nm.$daftar_dosen->dsn_gelar2}}</option>@endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="anggota_3">Anggota 3</label>
             <select class="select2 form-control" name="cari_anggota3" id="cari_anggota3">
                <option value="">-- Kosongkan jika tidak ada --</option>   
                @foreach($menu['data_daftar_dosen'] as $daftar_dosen)
                <option value=" {{$daftar_dosen->dsn_gelar.''.$daftar_dosen->dsn_nm.''.$daftar_dosen->dsn_gelar2}}">  {{$daftar_dosen->dsn_gelar.$daftar_dosen->dsn_nm.$daftar_dosen->dsn_gelar2}}</option>@endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="anggota_4">Anggota 4</label>
             <select class="select2 form-control" name="cari_anggota4" id="cari_anggota4">
                <option value="">-- Kosongkan jika tidak ada --</option>   
                @foreach($menu['data_daftar_dosen'] as $daftar_dosen)
                <option value=" {{$daftar_dosen->dsn_gelar.''.$daftar_dosen->dsn_nm.''.$daftar_dosen->dsn_gelar2}}">  {{$daftar_dosen->dsn_gelar.$daftar_dosen->dsn_nm.$daftar_dosen->dsn_gelar2}}</option>@endforeach
              </select>
            </div> 


            <div class="form-group">
              <label for="anggota_5">Anggota 5</label>
             <select class="select2 form-control" name="cari_anggota5" id="cari_anggota5">
                <option value="">-- Kosongkan jika tidak ada --</option>   
                @foreach($menu['data_daftar_dosen'] as $daftar_dosen)
                <option value=" {{$daftar_dosen->dsn_gelar.''.$daftar_dosen->dsn_nm.''.$daftar_dosen->dsn_gelar2}}">  {{$daftar_dosen->dsn_gelar.$daftar_dosen->dsn_nm.$daftar_dosen->dsn_gelar2}}</option>@endforeach
              </select>
            </div>

            <div class="row">
              <div class="form-group col-md-6" >
               <label for="Hibah">Hibah</label>
               <select class="select2 form-control" name="hibah" id="hibah">
                 <option value="">-- Pilih Hibah Penelitian --</option>   
                 @foreach($menu['data_hibah'] as $hibah)
                 <option value=" {{$hibah->hibah}}">  {{$hibah->hibah}}</option>                           
                 @endforeach
               </select>
             </div>

             <div class="form-group col-md-6" >
               <label for="skema">Skema</label>
               <select class="select2 form-control" name="skema_penelitian" id="skema_penelitian">
                <option value="">-- Pilih Skema Penelitian --</option>   
                @foreach($menu['data_skema_penelitian'] as $skema_penelitian)
                <option value="{{$skema_penelitian->skema_penelitian}}">  {{$skema_penelitian->skema_penelitian}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6" >
             <label for="kategori bidang">Kategori Bidang</label>
             <select class="select2 form-control" name="kategori_bidang" id="kategori_bidang">
              <option value="">-- Pilih Kategori Bidang Penelitian --</option>   
              @foreach($menu['data_kategori_bidang'] as $kategori_bidang)
              <option value=" {{$kategori_bidang->kategori_bidang}}">{{$kategori_bidang->kategori_bidang}}</option>                           
              @endforeach
            </select>
          </div>

          <div class="form-group col-md-6">
           <label for="bidang">Bidang</label>
           <select class="select2 form-control" name="bidang" id="bidang" placeholder="bidang">
             <option value="">-- Pilih Bidang Penelitian --</option>   
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
            <option value="">-- Pilih Kategori Tujuan Sosial Ekonomi Penelitian --</option>   
            @foreach($menu['data_kategori_tse'] as $kategori_tse)
            <option value=" {{$kategori_tse->kategori_tse}}">  {{$kategori_tse->kategori_tse}}</option>                           
            @endforeach
          </select>
        </div>

        <div class="form-group col-md-6" >
         <label for="tse">Tujuan Sosial Ekonomi</label>
         <select class="select2 form-control" name="tse" id="tse">
           <option value="">-- Pilih Tujuan Sosial Ekonomi Penelitian --</option>   
           @foreach($menu['data_tse'] as $tse)
           <option value=" {{$tse->tse}}">  {{$tse->tse}}</option>                           
           @endforeach
         </select>
       </div>
     </div>

     <div class="row">
       <div class="form-group col-md-9" >
        <label for="dana">Jumlah Dana</label>
        <div class="input-group">
          <div class="input-group-addon">Rp
          </div>
          <input type="number" class="form-control" id="dana" name="dana" placeholder="Dana kegiatan" value="{{old('dana')}}">
        </div>
      </div>


          <div class="form-group col-md-3" >
        <label for="tahun">Tahun</label>
        <select class="select2 form-control" name="tahun" id="tahun" required="">
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
      <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="{{old('url')}}">
    </div>
<!-- <div class="row">
    <div class="form-group col-md-9 " >
      <label for="abstrak">Abstrak</label>
      <textarea  rows="10" cols="30" class="form-control" id="abstrak" name="abstrak" placeholder="Inputkan abstrak dari kegiatan" >{{old('abstrak')}}</textarea>
    </div>
  </div> -->
  </div><!-- /.box-body -->

  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>
</div><!-- /.box -->
</div>
</div><!-- /.row -->
</section><!-- /.content -->
@endsection
