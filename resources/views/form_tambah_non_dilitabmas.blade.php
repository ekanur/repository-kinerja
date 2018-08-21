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
      <form role="form" method="POST" action="{{secure_asset($menu['kategori'].'/tambah_non_dilitabmas')}}" enctype="multipart/form-data">
        @else
        <form role="form" method="POST" action="{{url($menu['kategori'].'/tambah_non_dilitabmas')}}" enctype="multipart/form-data">
          @endif
          {{csrf_field()}}
          <input type="hidden" id="kategori" value="{{$menu['kategori']}}">
          <input type="hidden" id="jenis_penelitian" name="jenis_penelitian" value="non dilitabmas">
          <div class="box-body">
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" required="" value="{{old('judul')}}">
            </div>

            <div class="form-group">
              <label for="ketua">Ketua</label>
              <input type="text" class="form-control" id="ketua" name="ketua" placeholder="Ketua" required="" value='{{Session::get("ketDosen_nama")}}'>
            </div>


            <div class="form-group">
              <label for="anggota_1">Anggota 1</label>
              <input type="text" class="form-control" id="anggota_1" name="anggota_1" placeholder="Kosongkan Jika Tidak Ada" value="{{old('anggota_1')}}">
            </div>


            <div class="form-group">
              <label for="anggota_2">Anggota 2</label>
              <input type="text" class="form-control" id="anggota_2" name="anggota_2" placeholder="Kosongkan Jika Tidak Ada" value="{{old('anggota_2')}}">
            </div>

            <div class="form-group">
              <label for="anggota_3">Anggota 3</label>
              <input type="text" class="form-control" id="anggota_3" name="anggota_3" placeholder="Kosongkan Jika Tidak Ada" value="{{old('anggota_3')}}">
            </div>

            <div class="form-group">
              <label for="anggota_4">Anggota 4</label>
              <input type="text" class="form-control" id="anggota_4" name="anggota_4" placeholder="Kosongkan Jika Tidak Ada" value="{{old('anggota_4')}}">
            </div> 


            <div class="form-group">
              <label for="anggota_5">Anggota 5</label>
              <input type="text" class="form-control" id="anggota_5" name="anggota_5" placeholder="Kosongkan Jika Tidak Ada" value="{{old('anggota_5')}}">
            </div>

            <div class="row">
              <div class="form-group col-md-6" >
               <label for="jenis_penelitian">Jenis Penelitian</label>
               <select class="form-control" name="isi_jenis_penelitian" id="isi_jenis_penelitian">
                 <option value="">-- Pilih Jenis Penelitian --</option>   
                 @foreach($menu['data_jenis_penelitian'] as $isi_jenis_penelitian)
                 <option value="{{$isi_jenis_penelitian->jenis_penelitian}}">  {{$isi_jenis_penelitian->jenis_penelitian}}</option>                           
                 @endforeach
               </select>
             </div>

             <div class="form-group col-md-6" >
               <label for="skema">Skema</label>
               <select class="form-control" name="skema_penelitian" id="skema_penelitian">
                <option value="">-- Pilih Skema Penelitian --</option>   
                @foreach($menu['data_skema_penelitian'] as $skema_penelitian)
                <option value=" {{$skema_penelitian->skema_penelitian}}">  {{$skema_penelitian->skema_penelitian}}</option>                           
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6" >
             <label for="kategori bidang">Kategori Bidang</label>
             <select class="form-control" name="kategori_bidang" id="kategori_bidang">
              <option value="">-- Pilih Kategori Bidang Penelitian --</option>   
              @foreach($menu['data_kategori_bidang'] as $kategori_bidang)
              <option value=" {{$kategori_bidang->kategori_bidang}}">  {{$kategori_bidang->kategori_bidang}}</option>                           
              @endforeach
            </select>
          </div>

          <div class="form-group col-md-6" >
           <label for="bidang">Bidang</label>
           <select class="form-control" name="bidang" id="bidang" placeholder="bidang">
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
         <select class="form-control" name="kategori_tse" id="kategori_tse">
          <option value="">-- Pilih Kategori Tujuan Sosial Ekonomi Penelitian --</option>   
          @foreach($menu['data_kategori_tse'] as $kategori_tse)
          <option value=" {{$kategori_tse->kategori_tse}}">  {{$kategori_tse->kategori_tse}}</option>                           
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-6" >
       <label for="tse">Tujuan Sosial Ekonomi</label>
       <select class="form-control" name="tse" id="tse">
        <option value="">-- Pilih Tujuan Sosial Ekonomi Penelitian --</option>   
        @foreach($menu['data_tse'] as $tse)
        <option value=" {{$tse->tse}}">  {{$tse->tse}}</option>                           
        @endforeach
      </select>
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4" >
     <label for="Institusi">Institusi</label>
     <select class="form-control" name="institusi" id="institusi">
      <option value="">-- Pilih Institusi --</option>   
      @foreach($menu['data_institusi'] as $institusi)
      <option value=" {{$institusi->institusi}}">  {{$institusi->institusi}}</option>                           
      @endforeach
    </select>
  </div>

  <div class="form-group col-md-8" >
    <label for="sumber_dana">Sumber Dana</label>
    <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" placeholder="Dana kegiatan" value="{{old('sumber_dana')}}">
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

<div class="form-group col-md-3"> 
 <label for="tahun">Tahun</label>
 <select class="form-control" name="tahun" id="tahun">
  <option value="">Pilih Tahun</option>
  <?php
  $thn_skr = date('Y');
  for ($x = $thn_skr; $x >= 2005; $x--) {
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
  <input type="text" class="form-control" id="url" name="url" placeholder="URL kegiatan" value="{{old('url')}}">
</div>
</div><!-- /.box-body -->

<div class="box-footer">
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div><!-- /.box -->
</div>
</div><!-- /.row -->
</section><!-- /.content -->
@endsection
