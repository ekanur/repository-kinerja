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
       <form role="form" method="POST" action="{{secure_asset('tampil_peng_luaran_buku/update_peng_luaran_buku')}}" enctype="multipart/form-data">
        @else
        <form role="form" method="POST" action="{{url('tampil_peng_luaran_buku/update_peng_luaran_buku/')}}" enctype="multipart/form-data">
          @endif
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{$menu['data']->id}}">
          <div class="box-body">
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" required="" value="{{$menu['data']->judul}}">
            </div>

            <div class="form-group">
              <label for="penerbit">Penerbit</label>
              <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit" required="" value="{{$menu['data']->penerbit}}">
            </div>
            <div class="row">
              <div class="form-group col-md-6" >
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN" value="{{$menu['data']->isbn}}">
              </div>

              <div class="form-group col-md-3" >
               <label for="jumlah_halaman">Jumlah Halaman</label>
               <input type="text" class="form-control" id="jumlah_halaman" name="jumlah_halaman" placeholder="Jumlah Halaman" value="{{$menu['data']->jumlah_halaman}}">

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

          <div class="row">
           <div class="form-group col-md-3" >
             <label for="sumberdana">Sumber Dana</label>
             <input type="text" class="form-control" id="sumberdana" name="sumberdana" placeholder="Sumber Dana" value="{{$menu['data']->sumberdana}}">

           </div>

           <div class="form-group col-md-9" >
            <label for="dana">Jumlah Dana</label>
            <div class="input-group">
              <div class="input-group-addon">Rp
              </div>
              <input type="number" class="form-control" id="dana" name="dana" placeholder="Dana kegiatan" value="{{$menu['data']->dana}}">
            </div>
          </div>
          
        </div>
      <div class="form-group">
      <label for="url_kegiatan">URL</label>
      <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="{{$menu['data']->url}}">
    </div><!-- 
<div class="row">
    <div class="form-group col-md-9 " >
      <label for="abstrak">Abstrak</label>
      <textarea  rows="10" cols="30" class="form-control" id="abstrak" name="abstrak" placeholder="Inputkan abstrak dari kegiatan">{{old('abstrak')}}
    </textarea>
    </div>
  </div>
 -->
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
