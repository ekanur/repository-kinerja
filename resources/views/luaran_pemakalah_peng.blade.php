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
        <form role="form" method="POST" action="#">
          @else
          <form role="form" method="POST" action="#" enctype="multipart/form-data">
            @endif
            {{csrf_field()}}
            <input type="hidden" name='kategori' id="kategori" value="{{$menu['kategori']}}">
            <input type="hidden" name="id" id="id" value="{{$menu['data']->id}}">

            <div class="box-body">
<div class="row">

              <div class="form-group col-md-4" >
               <label for="forum_ilmiah">Forum Ilmiah</label>
               <select class="form-control" name="forum_ilmiah" id="forum_ilmiah">
                 <option value="">-- Pilih Forum Ilmiah --</option>   
                 @foreach($menu['data_forum_ilmiah'] as $forum_ilmiah)
                 <option value="{{$forum_ilmiah->forum_ilmiah}}">  {{$forum_ilmiah->forum_ilmiah}}</option>                           
                 @endforeach
               </select>

             </div>
             <div class="form-group col-md-4" style="padding-left: 5px;padding-right: 0px">
               <label for="status">Status</label>
               <select class="form-control" name="status_pemakalah" id="status_pemakalah">
                 <option value="">-- Pilih Status --</option>   
                 @foreach($menu['data_status_pemakalah'] as $status_pemakalah)
                 <option value="{{$status_pemakalah->status_pemakalah}}">  {{$status_pemakalah->status_pemakalah}}</option>                           
                 @endforeach
               </select>
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


             <div class="form-group">
              <label for="judul_makalah">Judul Makalah</label>
              <input type="text" class="form-control" id="judul_makalah" name="judul_makalah" placeholder="Judul Makalah" required="" value="">
            </div>

            <div class="form-group">
              <label for="nama_forum">Nama Forum</label>
              <input type="text" class="form-control" id="nama_forum" name="nama_forum" placeholder="Nama Forum" required="" value="">
            </div>
            <div class="form-group">
              <label for="institusi_penyelenggara">Institusi Penyelenggara</label>
              <input type="text" class="form-control" id="institusi_penyelenggara" name="institusi_penyelenggara" placeholder="Institusi Penyelenggara" required="" value="">
            </div>
<div class="row">
            <div class="form-group col-md-6" >
              <label for="tempat_pelaksanaan">Tempat Pelaksanaan</label>
              <input type="text" class="form-control" id="tempat_pelaksanaan" name="tempat_pelaksanaan" placeholder="Temppat Pelaksanaan" value="">
            </div>

            <div class="form-group col-md-3" >
              <label for="waktu_mulai">Waktu Pelaksanaan</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="waktu_mulai" name="waktu_mulai" value="">
              </div>
            </div>

            <div class="form-group col-md-3" >
              <label for="waktu_selesai">s/d</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="waktu_selesai" name="waktu_selesai" value="">
              </div>
            </div>
          </div>
<div class="row">
            <div class="form-group col-md-3" >
             <label for="sumber_dana">Sumber Dana</label>
             <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" placeholder="Sumber Dana" value="">
             
           </div>
         <div class="form-group col-md-9">
               
              <label for="dana">Biaya Publikasi</label>
              <div class="input-group">
                <div class="input-group-addon">Rp
                </div>

                <input type="number" class="form-control" id="dana" name="dana" placeholder="Biaya Publikasi" value="{{old('dana')}}">
              </div>
            </div>
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
