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
                <form role="form" method="POST" action="#" enctype="multipart/form-data">
                @else
                    <form role="form" method="POST" action="#" enctype="multipart/form-data">
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
              <label for="penulis_publikasi">Penulis Publikasi</label>
              <input type="text" class="form-control" id="penulis_publikasi" name="penulis_publikasi" placeholder="Penulis Publikasi" required="" value="">
            </div>
             <div class="form-group">
              <label for="nama_jurnal">Nama Jurnal</label>
              <input type="text" class="form-control" id="nama_jurnal" name="nama_jurnal" placeholder="Nama Jurnal" required="" value="">
            </div>

            <div class="form-group col-md-6" style="padding-left: 0px;padding-right: 10px">
             <label for="publikasi">Publikasi</label>
             <select class="form-control" name="jenis_publikasi" id="jenis_publikasi">
               <option value="">-- Pilih Jenis Publikasi --</option>   
               @foreach($menu['data_jenis_publikasi'] as $jenis_publikasi)
               <option value="{{$jenis_publikasi->jenis_publikasi}}">  {{$jenis_publikasi->jenis_publikasi}}</option>                           
               @endforeach
             </select>
           </div>

     <div class="form-group col-md-6" style="padding-right: 0px;padding-left: 10px">
      <label for="issn">ISSN</label>
      <input type="text" class="form-control" id="issn" name="issn" placeholder="ISSN" value="">
    </div>

    <div class="form-group col-md-3" style="padding-left: 0px;padding-right: 5px">
     <label for="volume">Volume</label>
     <input type="text" class="form-control" id="volume" name="volume" placeholder="Volume" value="">
        </div>

     <div class="form-group col-md-3" style="padding-left: 0px;padding-right: 5px">
      <label for="nomor">Nomor</label>
      <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor" value="">
    </div>

    <div class="form-group col-md-2" style="padding-left: 0px;padding-right: 5px">
     <label for="halaman_awal">Halaman</label>
     <input type="text" class="form-control" id="halaman_awal" name="halaman_awal" placeholder="Halaman Awal" value="">
        </div>

   <div class="form-group col-md-2" style="padding-left: 0px;padding-right: 5px">
     <label for="halaman_akhir">s/d</label>
     <input type="text" class="form-control" id="halaman_akhir" name="halaman_akhir" placeholder="Halaman Akhir" value="">
        </div>

    <div class="form-group col-md-2" style="padding-right: 0px;padding-left: 5px">
     <label for="tahun">Tahun</label>
     <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" value="{{$menu['data']->tahun}}">
        </div>

 <div class="form-group col-md-3" style="padding-left: 0px;padding-right: 10px">
     <label for="sumber_dana">Sumber Dana</label>
     <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" placeholder="Sumber Dana" value="">
        </div>
     <div class="form-group col-md-9" style="padding-right: 0px;padding-left: 10px">
      <label for="dana">Dana</label>
      <input type="text" class="form-control" id="dana" name="dana" placeholder="Dana kegiatan" value="Rp. {{$menu['data']->dana}}">
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
