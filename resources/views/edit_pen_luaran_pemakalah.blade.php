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
      <form role="form" method="POST" action="{{secure_asset('tampil_pen_luaran_pemakalah/update_pen_luaran_pemakalah')}}" enctype="multipart/form-data">
        @else
        <form role="form" method="POST" action="{{url('tampil_pen_luaran_pemakalah/update_pen_luaran_pemakalah/')}}" enctype="multipart/form-data">
          @endif
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{$menu['data']->id}}">
          <div class="box-body">

            <div class="row">
              <div class="form-group col-md-4" >
               <label for="forum_ilmiah">Forum Ilmiah</label>
               <select class="form-control" name="forum_ilmiah" id="forum_ilmiah">
                 <option value="{{$menu['data']->forum_ilmiah}}">{{$menu['data']->forum_ilmiah}}</option>   
                 @foreach($menu['data_forum_ilmiah'] as $forum_ilmiah)
                 <option value="{{$forum_ilmiah->forum_ilmiah}}">  {{$forum_ilmiah->forum_ilmiah}}</option>                           
                 @endforeach
               </select>
             </div>

             <div class="form-group col-md-4" >
               <label for="status">Status</label>
               <select class="form-control" name="status_pemakalah" id="status_pemakalah">
                 <option value="{{$menu['data']->status}}">{{$menu['data']->status}}</option>   
                 @foreach($menu['data_status_pemakalah'] as $status_pemakalah)
                 <option value="{{$status_pemakalah->status_pemakalah}}">  {{$status_pemakalah->status_pemakalah}}</option>                           
                 @endforeach
               </select>
             </div>

             <div class="form-group col-md-3" >

               <label for="tahun">Tahun</label>
               
               <select class="form-control" name="tahun" id="tahun">
                <option value="{{$menu['data']->tahun}}">{{$menu['data']->tahun}}</option>
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
            <input type="text" class="form-control" id="judul_makalah" name="judul_makalah" placeholder="Judul Makalah" required="" value="{{$menu['data']->judul}}">
          </div>

          <div class="form-group">
            <label for="nama_forum">Nama Forum</label>
            <input type="text" class="form-control" id="nama_forum" name="nama_forum" placeholder="Nama Forum" required="" value="{{$menu['data']->nama_forum}}">
          </div>
          <div class="form-group">
            <label for="institusi_penyelenggara">Institusi Penyelenggara</label>
            <input type="text" class="form-control" id="ins_penyelenggara" name="ins_penyelenggara" placeholder="Institusi Penyelenggara" required="" value="{{$menu['data']->ins_penyelenggara}}">
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="tempat_pelaksanaan">Tempat Pelaksanaan</label>
              <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat Pelaksanaan" value="{{$menu['data']->tempat}}">
            </div>

            <div class="form-group col-md-3" >
              <label for="Waktu_mulai">Waktu Pelaksanaan</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="waktu_mulai" name="waktu_mulai" value="{{$menu['data']->waktu_mulai}}" required="">
              </div>
            </div>

            <div class="form-group col-md-3" >
              <label for="waktu_selesai">s/d</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="waktu_selesai" name="waktu_selesai" value="{{$menu['data']->waktu_selesai}}" required="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-3" >
             <label for="sumber_dana">Sumber Dana</label>
             <input type="text" class="form-control" id="sumberdana" name="sumberdana" placeholder="Sumber Dana" value="{{$menu['data']->sumberdana}}">

           </div>
           <div class="form-group col-md-9">

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
