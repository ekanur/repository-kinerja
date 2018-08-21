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
        <h3 class="box-title">Lihat {{$menu['menu']}}: <em>"{{$menu['data']->judul}}"</em></h3>
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
              <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" required="" value="{{$menu['data']->judul}}" readonly="">
            </div>

            <div class="form-group">
              <label for="ketua">Ketua</label>
              <input type="text" class="form-control" id="ketua" name="ketua" placeholder="Ketua" required="" value="{{$menu['data']->ketua}}" readonly="">
            </div>


            <div class="form-group">
              <label for="anggota_1">Anggota 1</label>
              <input type="text" class="form-control" id="anggota_1" name="anggota_1" placeholder="Kosongkan Jika Tidak Ada" value="{{$menu['data']->anggota_1}}"readonly="" >
            </div>


            <div class="form-group">
              <label for="anggota_2">Anggota 2</label>
              <input type="text" class="form-control" id="anggota_2" name="anggota_2" placeholder="Kosongkan Jika Tidak Ada" value="{{$menu['data']->anggota_2}}"readonly="" >
            </div>

            <div class="form-group">
              <label for="anggota_3">Anggota 3</label>
              <input type="text" class="form-control" id="anggota_3" readonly="" name="anggota_3" placeholder="Kosongkan Jika Tidak Ada" value="{{$menu['data']->anggota_3}}">
            </div>

            <div class="form-group">
              <label for="anggota_4">Anggota 4</label>
              <input type="text" class="form-control" id="anggota_4" name="anggota_4" readonly="" placeholder="Kosongkan Jika Tidak Ada" value="{{$menu['data']->anggota_4}}">
            </div> 


            <div class="form-group">
              <label for="anggota_5">Anggota 5</label>
              <input type="text" class="form-control" id="anggota_5" name="anggota_5"readonly="" placeholder="Kosongkan Jika Tidak Ada" value="{{$menu['data']->anggota_5}}">
            </div>
            <div class="row">
             <div class="form-group col-md-6"  >
               <label for="skema_peng">Skema</label>
               <input type="text" class="form-control" id="Skema" name="Skema" readonly="" value="{{$menu['data']->skema}}">
             </div>
             <div class="form-group col-md-6"  >
               <label for="sumberdaya">Sumberdaya IPTEK</label>
               <input type="text" class="form-control" id="sumberdaya_iptek" name="sumberdaya_iptek" value="{{$menu['data']->sumberdaya_iptek}}" readonly="">
             </div>
           </div>

           <div class="row">
             <div class="form-group col-md-4"  >
              <label for="jumlah_mahasiswa">Jumlah Mahasiswa</label>
              <input type="text" class="form-control" id="jumlah_mahasiswa" name="jumlah_mahasiswa" placeholder="Jumlah Mahasiswa" value="{{$menu['data']->jumlah_mahasiswa}}"readonly="" >
            </div>
            <div class="form-group col-md-4" >
              <label for="jumlah_alumni">Jumlah Alumni</label>
              <input type="text" class="form-control" id="jumlah_alumni" name="jumlah_alumni" placeholder="jumlah_alumni" value="{{$menu['data']->jumlah_alumni}}"readonly="">
            </div>
            <div class="form-group col-md-4" >
              <label for="jumlah_staf">Jumlah Staf Pendukung</label>
              <input type="text" class="form-control" id="jumlah_staf" name="jumlah_staf" readonly="" placeholder="Jumlah Staf" value="{{$menu['data']->jumlah_staf}}">
            </div>
          </div>

          <div class="row">
           <div class="form-group col-md-4" >
            <label for="lama_kegiatan">Lama Kegiatan</label>
            <input type="text" class="form-control" id="lama_kegiatan" name="lama_kegiatan" readonly="" placeholder="Lama kegiatan" value="{{$menu['data']->lama_kegiatan}}">
          </div>

          <div class="form-group col-md-8" >
            <label for="sumber_dana">Sumber Dana</label>
            <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" readonly="" placeholder="Sumber Dana kegiatan" value="{{$menu['data']->sumber_dana}}">
          </div>
        </div>

        <div class="row">
         <div class="form-group col-md-9" >
          <label for="dana">Jumlah Dana</label>
          <div class="input-group">
            <div class="input-group-addon">Rp
            </div>
            <input type="text" class="form-control" id="dana" name="dana" readonly="" placeholder="Dana kegiatan" value="{{$menu['data']->dana}}">
          </div>
        </div>


        <div class="form-group col-md-3" >
         <label for="tahun">Tahun</label>
         <input type="text" class="form-control" id="tahun" name="tahun" readonly="" placeholder="Tahun" value="{{$menu['data']->tahun}}">
         
       </div>
     </div>

     <div class="form-group">

      <label for="url_kegiatan">URL kegiatan</label>
      <input type="text" class="form-control" id="url" name="url" readonly="" placeholder="URL" value="{{$menu['data']->url}}">
    </div>



  </div><!-- /.box-body -->

  
</form>
</div><!-- /.box -->
</div>
</div><!-- /.row -->
</section><!-- /.content -->
@endsection
