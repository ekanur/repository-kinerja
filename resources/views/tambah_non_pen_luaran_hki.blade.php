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
        <h3 class="box-title">Tambah Luaran HKI -Non Penelitian </h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      @if(App::environment()=='production')
      <form role="form" method="POST" action="#" enctype="multipart/form-data">
        @else
        <form role="form" method="POST" action="#" enctype="multipart/form-data">
          @endif
          {{csrf_field()}}
          
          <input type="hidden" id="jenis_penelitian" name="jenis_penelitian" value="Tanpa Penelitian">
          <input type="hidden" id="judul_penelitian" name="judul_penelitian" value="Tanpa Penelitian">
         <div class="box-body">
            <div class="row">
             <div class="form-group col-md-4" >
               <label for="jenis_hki">Jenis</label>
               <select class="form-control" name="jenis" id="jenis">
                 <option value="">-- Pilih Jenis HKI --</option>   
                 @foreach($menu['data_jenis_hki'] as $jenis_hki)
                 <option value="{{$jenis_hki->jenis_hki}}">  {{$jenis_hki->jenis_hki}}</option>                          @endforeach
               </select>

             </div>
             <div class="form-group col-md-4" >
               <label for="status">Status</label>
               <select class="form-control" name="status" id="status">
                 <option value="">-- Pilih Status HKI --</option>   
                 @foreach($menu['data_status_hki'] as $status_hki)
                 <option value="{{$status_hki->status_hki}}">  {{$status_hki->status_hki}}</option>                           
                 @endforeach
               </select>
             </div>

             <div class="form-group col-md-4" >

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
            <div class="form-group col-md-12">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" required="" value="">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6" >
            <label for="nomor_pendaftaran">Nomor Pendaftaran</label>
            <input type="text" class="form-control" id="nomor_pendaftaran" name="nomor_pendaftaran" placeholder="Nomor Pendaftaran" required="" value="">
          </div>
          <div class="form-group col-md-6" >
            <label for="nomor_pencatatan">Nomor Pencatatan</label>
            <input type="text" class="form-control" id="nomor_pencatatan" name="nomor_pencatatan" placeholder="Nomor Pencatatan" required="" value="">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-3">
           <label for="sumber_dana">Sumber Dana</label>
           <input type="text" class="form-control" id="sumberdana" name="sumber_dana" placeholder="Sumber Dana" value="">
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

          <label for="url_kegiatan">URL</label>
          <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="{{old('url')}}">
        </div>

      </div><!-- /.box-body -->


      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div><!-- /.box -->
</div>
</div><!-- /.row -->
</section><!-- /.content -->
@endsection

