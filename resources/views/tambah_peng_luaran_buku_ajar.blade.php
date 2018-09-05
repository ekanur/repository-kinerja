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
          <h3 class="box-title">Tambah luaran {{$menu['menu']}}: <em>"{{$menu['data']->judul}}"</em></h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        @if(App::environment()=='production')
        <form role="form" method="POST" action="{{secure_asset($menu['kategori'].'/tambah_peng_luaran_buku/'.$menu['data']->id)}}" enctype="multipart/form-data">
          @else
          <form role="form" method="POST" action="{{url($menu['kategori'].'/tambah_peng_luaran_buku/'.$menu['data']->id)}}" enctype="multipart/form-data">
            @endif
            {{csrf_field()}}
            <input type="hidden" name='kategori' id="kategori" value="{{$menu['kategori']}}">
            <input type="hidden" name='jenis_pengabdian' id="jenis_pengabdian" value="{{$menu['data']->jenis_pengabdian}}">
            <input type="hidden" name="judul_pengabdian" id="judul_pengabdian" value="{{$menu['data']->judul}}">
              <input type="hidden" name='abstrak' id="abstrak" value="{{$menu['data']->abstrak}}">
            <div class="box-body">
              <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" required="" value="{{old('judul')}}">
              </div>

              <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit" required="" value="{{old('penerbit')}}">
              </div>
              <div class="row">
                <div class="form-group col-md-6" >
                  <label for="isbn">ISBN</label>
                  <input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN" value="{{old('isbn')}}">
                </div>

                <div class="form-group col-md-3" >
                 <label for="jumlah_halaman">Jumlah Halaman</label>
                 <input type="text" class="form-control" id="jumlah_halaman" name="jumlah_halaman" placeholder="Jumlah Halaman" value="{{old('jumlah_halaman')}}">

               </div>
               <div class="form-group col-md-3" >
                 
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
            <div class="row">
             <div class="form-group col-md-3" >
               <label for="sumberdana">Sumber Dana</label>
               <input type="text" class="form-control" id="sumberdana" name="sumberdana" placeholder="Sumber Dana" value="{{old('sumberdana')}}">

             </div>
             <div class="form-group col-md-9" >
              <label for="dana">Biaya Publikasi</label>
              <div class="input-group">
                <div class="input-group-addon">Rp
                </div>
                <input type="number" class="form-control" id="dana" name="dana" placeholder="Biaya Publikasi" value="{{old('dana')}}">
              </div>
            </div>
          </div>
          <div class="form-group">

            <label for="url_kegiatan">URL</label>
            <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="{{$menu['data']->url}}">
          </div>

        </div><!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div><!-- /.box -->
  </div>
</div><!-- /.row -->
</section><!-- /.content -->
@endsection
