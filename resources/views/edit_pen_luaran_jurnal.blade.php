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
        <h3 class="box-title">Edit {{$menu['menu']}}: <em>"{{$menu['data']->judul}}"</em></h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      @if(App::environment()=='production')
       <form role="form" method="POST" action="{{secure_asset('tampil_pen_luaran_jurnal/update_pen_luaran_jurnal')}}" enctype="multipart/form-data">
        @else
        <form role="form" method="POST" action="{{url('tampil_pen_luaran_jurnal/update_pen_luaran_jurnal/')}}" enctype="multipart/form-data">
          @endif
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{$menu['data']->id}}">
            <div class="box-body">
              <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" required="" value="{{$menu['data']->judul}}">
              </div>

              <div class="form-group">
                <label for="penulis_publikasi">Penulis Publikasi</label>
                <input type="text" class="form-control" id="penulis_publikasi" name="penulis_publikasi" placeholder="Penulis Publikasi" required="" value="{{$menu['data']->penulis_publikasi}}" readonly="">
              </div>
              <div class="form-group">
                <label for="nama_jurnal">Nama Jurnal</label>
                <input type="text" class="form-control" id="nama_jurnal" name="nama_jurnal" placeholder="Nama Jurnal" required="" value="{{$menu['data']->nama_jurnal}}">
              </div>
              <div class="row">
                <div class="form-group col-md-4" >
                 <label for="publikasi">Publikasi</label>
                 <select class="select2 form-control" name="jenis_publikasi" id="jenis_publikasi">
                   <option value="{{$menu['data']->jenis_publikasi}}">{{$menu['data']->jenis_publikasi}}</option>   
                   @foreach($menu['data_jenis_publikasi'] as $jenis_publikasi)
                   <option value="{{$jenis_publikasi->jenis_publikasi}}">  {{$jenis_publikasi->jenis_publikasi}}</option>                           
                   @endforeach
                 </select>
               </div>

                <div class="form-group col-md-4">
                <label for="p_issn">P-ISSN</label>
                <input type="text" class="form-control" id="p_issn" name="p_issn" placeholder="P-ISSN" value="{{$menu['data']->p_issn}}">
              </div>

              <div class="form-group col-md-4" >
                <label for="e_issn">E-ISSN</label>
                <input type="text" class="form-control" id="e_issn" name="e_issn" placeholder="E-ISSN" value="{{$menu['data']->e_issn}}">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-3" >
               <label for="volume">Volume</label>
               <input type="text" class="form-control" id="volume" name="volume" placeholder="Volume" value="{{$menu['data']->volume}}">
             </div>

             <div class="form-group col-md-3" >
              <label for="nomor">Nomor</label>
              <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor" value="{{$menu['data']->nomor}}">
            </div>

            <div class="form-group col-md-2" >
             <label for="halaman_awal">Halaman</label>
             <input type="text" class="form-control" id="halaman_awal" name="halaman_awal" placeholder="Halaman Awal" value="{{$menu['data']->halaman_awal}}">
           </div>

           <div class="form-group col-md-2" >
             <label for="halaman_akhir">s/d</label>
             <input type="text" class="form-control" id="halaman_akhir" name="halaman_akhir" placeholder="Halaman Akhir" value="{{$menu['data']->halaman_akhir}}">
           </div>

           <div class="form-group col-md-2" >
             <label for="tahun">Tahun</label>
             
             <select class="select2 form-control" name="tahun" id="tahun">
              <option value="{{$menu['data']->tahun}}">{{$menu['data']->tahun}}</option>
              <?php
              $thn_skr = date('Y');
              for ($x = $thn_skr; $x >= 1954; $x--) {
                ?>
                <option value="{{$x}}">{{$x}}</option>
                <?php
              }
              ?>
            </select>    
          </div>
        </div>
        <div class="row">
         <div class="form-group col-md-3" >
           <label for="sumber_dana">Sumber Dana</label>
           <input type="text" class="form-control" id="sumberdana" name="sumberdana" placeholder="Sumber Dana" value="{{$menu['data']->sumberdana}}">
         </div>
         <div class="form-group col-md-9" >
          <label for="dana">Biaya Publikasi</label>
          <div class="input-group">
            <div class="input-group-addon">Rp
            </div>
            <input type="number" class="form-control" id="dana" name="dana" placeholder="Biaya Publikasi" value="{{$menu['data']->dana}}">
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
