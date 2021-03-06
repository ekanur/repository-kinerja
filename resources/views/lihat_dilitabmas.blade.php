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
                  <h3 class="box-title">Lihat Data {{$menu['menu']}}: <em>"{{$menu['data']->judul}}"</em></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                @if(App::environment()=='production')
                <form role="form" method="POST" action="{{secure_asset($menu['kategori'].'/update_dilitabmas/'.$menu['data']->id)}}" enctype="multipart/form-data">
                @else
                    <form role="form" method="POST" action="{{url($menu['kategori'].'/update_dilitabmas/'.$menu['data']->id)}}" enctype="multipart/form-data">
                  @endif
                {{csrf_field()}}
                <input type="hidden" name='kategori' id="kategori" value="{{$menu['kategori']}}">
                <input type="hidden" name="id" id="id" value="{{$menu['data']->id}}">

          <div class="box-body">
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" required="" value='{{$menu["data"]->judul}}' readonly="">
            </div>

            <div class="form-group">
              <label for="ketua">Ketua</label>
              <input type="text" class="form-control" id="ketua" name="ketua" placeholder="Ketua" required="" readonly="" value='{{$menu['data']->ketua}}'>
            </div>


            <div class="form-group">
              <label for="anggota_1">Anggota 1</label>
              <input type="text" class="form-control" id="anggota_1" name="anggota_1" placeholder="Kosongkan Jika Tidak Ada" readonly="" value='{{$menu['data']->anggota_1}}'>
            </div>


            <div class="form-group">
              <label for="anggota_2">Anggota 2</label>
              <input type="text" class="form-control" id="anggota_2" name="anggota_2" placeholder="Kosongkan Jika Tidak Ada" readonly="" value='{{$menu['data']->anggota_2}}'>
            </div>

            <div class="form-group">
              <label for="anggota_3">Anggota 3</label>
              <input type="text" class="form-control" id="anggota_3" name="anggota_3" placeholder="Kosongkan Jika Tidak Ada" readonly="" value='{{$menu['data']->anggota_3}}'>
            </div>

            <div class="form-group">
              <label for="anggota_4">Anggota 4</label>
              <input type="text" class="form-control" id="anggota_4" name="anggota_4" placeholder="Kosongkan Jika Tidak Ada" readonly="" value='{{$menu['data']->anggota_4}}'>
            </div> 


            <div class="form-group">
              <label for="anggota_5">Anggota 5</label>
              <input type="text" class="form-control" id="anggota_5" name="anggota_5" placeholder="Kosongkan Jika Tidak Ada" readonly="" value='{{$menu['data']->anggota_5}}'>
            </div>
<div class="row">
            <div class="form-group col-md-6" >
             <label for="Hibah">Hibah</label>
              <input type="text" class="form-control" id="hibah" name="hibah" readonly="" value='{{$menu['data']->hibah}}'>
           </div>

           <div class="form-group col-md-6" >
             <label for="skema">Skema</label>
             <input type="text" class="form-control" id="skema" name="skema" readonly="" value='{{$menu['data']->skema}}'>         
          </div>
          </div>
<div class="row">
          <div class="form-group col-md-6" >
           <label for="kategori bidang">Kategori Bidang</label>
           <input type="text" class="form-control" id="kategori_bidang" name="kategori_bidang" readonly="" value='{{$menu['data']->kategori_bidang}}'>
        </div>

        <div class="form-group col-md-6" >
         <label for="bidang">Bidang</label>
        <input type="text" class="form-control" id="bidang" name="bidang" readonly="" value='{{$menu['data']->bidang}}'>
       
       </div>
</div>
<div class="row">
       <div class="form-group col-md-6">
         <label for="kategori tse">Kategori Tujuan Sosial Ekonomi</label>
         <input type="text" class="form-control" id="kategori_tse" name="kategori_tse" readonly="" value='{{$menu['data']->kategori_tse}}'>
      </div>

      <div class="form-group col-md-6" >
       <label for="tse">Tujuan Sosial Ekonomi</label>
      <input type="text" class="form-control" id="tse" name="tse" readonly="" value='{{$menu['data']->tse}}'>
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
     <input type="text" class="form-control" readonly="" id="tahun" name="tahun" placeholder="Tahun" value="{{$menu['data']->tahun}}">
     
   </div>
</div>
   <div class="form-group">
      <label for="url_kegiatan">URL kegiatan</label>
      <input type="text" class="form-control" id="url" readonly="" name="url" placeholder="URL" value="{{$menu['data']->url}}">
    </div>
<!-- <div class="row">
    <div class="form-group col-md-9 " >
      <label for="abstrak">Abstrak</label>
      <textarea  rows="10" cols="30" class="form-control" readonly="" id="abstrak" name="abstrak" placeholder="Inputkan abstrak dari kegiatan">{{$menu['data']->abstrak}}
    </textarea>
    </div>
  </div> -->

                  </div><!-- /.box-body -->

                  
                </form>
              </div><!-- /.box -->
            </div>
          </div><!-- /.row -->
        </section><!-- /.content -->
@endsection
