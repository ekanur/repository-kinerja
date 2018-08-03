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
        <form role="form" method="POST" action="{{secure_asset($menu['kategori'].'/pen_luaran_buku_ajar')}}" enctype="multipart/form-data">
          @else
          <form role="form" method="POST" action="{{url($menu['kategori'].'/pen_luaran_buku_ajar')}}" enctype="multipart/form-data">
           @endif
           {{csrf_field()}}
           <input type="hidden" name='kategori' id="kategori" value="{{$menu['kategori']}}">
           <input type="hidden" name="id" id="id" value="{{$menu['data']->id}}">
  <input type="hidden" name="nama_luaran" id="nama_luaran" value="Buku Ajar">
           <div class="box-body">
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" required="" value="{{old('judul')}}">
            </div>

            <div class="form-group">
              <label for="penerbit">Penerbit</label>
              <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit" required="" value="{{old('penerbit')}}">
            </div>

            <div class="form-group col-md-6" style="padding-left: 0px;padding-right: 10px">
              <label for="isbn">ISBN</label>
              <input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN" value="{{old('isbn')}}">
            </div>

            <div class="form-group col-md-3" style="padding-left: 10px;padding-right: 10px">
             <label for="jumlah_halaman">Jumlah Halaman</label>
             <input type="text" class="form-control" id="jumlah_halaman" name="jumlah_halaman" placeholder="Jumlah Halaman" value="{{old('jumlah_halaman')}}">

           </div>
           <div class="form-group col-md-3" style="padding-right: 0px;padding-left: 0px">
             <label for="tahun">Tahun</label>
             <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" value="{{$menu['data']->tahun}}">

           </div>

           <div class="form-group col-md-3" style="padding-left: 0px;padding-right: 10px">
             <label for="sumber_dana">Sumber Dana</label>
             <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" placeholder="Sumber Dana" value="{{old('sumber_dana')}}">

           </div>
           <div class="form-group col-md-9" style="padding-right: 0px;padding-left: 10px">
            <label for="dana">Dana</label>
            <input type="text" class="form-control" id="dana" name="dana" placeholder="Dana kegiatan" value="{{$menu['data']->dana}}">
          </div>


          <div class="form-group">

            <label for="url_kegiatan">URL kegiatan</label>
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
