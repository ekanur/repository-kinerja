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
      <form role="form" method="POST" action="{{secure_asset($menu['kategori'].'/update_peng_dilitabmas/'.$menu['data']->id)}}" enctype="multipart/form-data">
        @else
        <form role="form" method="POST" action="{{url($menu['kategori'].'/update_peng_dilitabmas/'.$menu['data']->id)}}" enctype="multipart/form-data">
          @endif
          {{csrf_field()}}
          <input type="hidden" name="id" id="id" value="{{$menu['data']->id}}">
          <input type="hidden" id="kategori" value="{{$menu['kategori']}}">
          <div class="box-body">
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" required="" value="{{$menu['data']->judul}}">
            </div>

            <div class="form-group">
              <label for="ketua">Ketua</label>
              <input type="text" class="form-control" id="ketua" name="ketua" placeholder="Ketua" required="" value="{{$menu['data']->ketua}}">
            </div>


            <div class="form-group">
              <label for="anggota_1">Anggota 1</label>
              <input type="text" class="form-control" id="anggota_1" name="anggota_1" placeholder="Kosongkan Jika Tidak Ada" value="{{$menu['data']->anggota_1}}">
            </div>


            <div class="form-group">
              <label for="anggota_2">Anggota 2</label>
              <input type="text" class="form-control" id="anggota_2" name="anggota_2" placeholder="Kosongkan Jika Tidak Ada" value="{{$menu['data']->anggota_2}}">
            </div>

            <div class="form-group">
              <label for="anggota_3">Anggota 3</label>
              <input type="text" class="form-control" id="anggota_3" name="anggota_3" placeholder="Kosongkan Jika Tidak Ada" value="{{$menu['data']->anggota_3}}">
            </div>

            <div class="form-group">
              <label for="anggota_4">Anggota 4</label>
              <input type="text" class="form-control" id="anggota_4" name="anggota_4" placeholder="Kosongkan Jika Tidak Ada" value="{{$menu['data']->anggota_4}}">
            </div> 


            <div class="form-group">
              <label for="anggota_5">Anggota 5</label>
              <input type="text" class="form-control" id="anggota_5" name="anggota_5" placeholder="Kosongkan Jika Tidak Ada" value="{{$menu['data']->anggota_5}}">
            </div>

            <div class="row">
             <div class="form-group col-md-6">
               <label for="skema_peng">Skema</label>
               <select class="select2 form-control" name="skema_peng" id="skema_peng">
                 <option value="{{$menu['data']->skema}}">{{$menu['data']->skema}}</option>   
                 @foreach($menu['data_skema_peng'] as $skema_pengabdian)
                 <option value="{{$skema_pengabdian->skema_peng}}">  {{$skema_pengabdian->skema_peng}}</option>                           
                 @endforeach
               </select>
             </div>
             <div class="form-group col-md-6">
               <label for="sumberdaya">Sumberdaya IPTEK</label>
               <select class="select2 form-control" name="sumberdaya" id="sumberdaya">
                 <option value="{{$menu['data']->sumberdaya_iptek}}">{{$menu['data']->sumberdaya_iptek}}</option>   
                 @foreach($menu['data_sumberdaya'] as $sumberdaya)
                 <option value="{{$sumberdaya->sumberdaya}}">  {{$sumberdaya->sumberdaya}}</option>                           
                 @endforeach
               </select>
             </div>
           </div>
           <div class="row">
             <div class="form-group col-md-4" >
              <label for="jumlah_mahasiswa">Jumlah Mahasiswa</label>
              <input type="text" class="form-control" id="jumlah_mahasiswa" name="jumlah_mahasiswa" placeholder="Jumlah Mahasiswa" value="{{$menu['data']->jumlah_mahasiswa}}">
            </div>
            <div class="form-group col-md-4" >
              <label for="jumlah_alumni">Jumlah Alumni</label>
              <input type="text" class="form-control" id="jumlah_alumni" name="jumlah_alumni" placeholder="jumlah_alumni" value="{{$menu['data']->jumlah_alumni}}">
            </div>
          </div>
          <div class="row">
           <div class="form-group col-md-4">
            <label for="jumlah_staf">Jumlah Staf Pendukung</label>
            <input type="text" class="form-control" id="jumlah_staf" name="jumlah_staf" placeholder="Jumlah Staf" value="{{$menu['data']->jumlah_staf}}">
          </div>

          <div class="form-group col-md-4">
            <label for="lama_kegiatan">Lama Kegiatan</label>
            <input type="text" class="form-control" id="lama_kegiatan" name="lama_kegiatan" placeholder="Lama kegiatan" value="{{$menu['data']->lama_kegiatan}}">
          </div>

          <div class="form-group col-md-8">
            <label for="sumber_dana">Sumber Dana</label>
            <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" placeholder="Sumber Dana kegiatan" value="{{$menu['data']->sumber_dana}}">
          </div>
        </div>
        <div class="row">
         <div class="form-group col-md-9">
           <label for="dana">Jumlah Dana</label>
           <div class="input-group">
            <div class="input-group-addon">Rp
            </div>
            <input type="number" class="form-control" id="dana" name="dana" placeholder="Dana kegiatan" value="{{$menu['data']->dana}}">
          </div>
        </div>

        <div class="form-group col-md-3">
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
      <textarea  rows="10" cols="30" class="form-control" id="abstrak" name="abstrak" placeholder="Inputkan abstrak dari kegiatan" >{{$menu['data']->abstrak}}
    </textarea>
    </div>
  </div> -->

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
