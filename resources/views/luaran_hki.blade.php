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


              <div class="form-group col-md-4" style="padding-left: 0px;padding-right: 5px">
               <label for="jenis_hki">Jenis</label>
               <select class="form-control" name="jenis_hki" id="jenis_hki">
                 <option value="">-- Pilih Jenis HKI --</option>   
                 @foreach($menu['data_jenis_hki'] as $jenis_hki)
                 <option value="{{$jenis_hki->jenis_hki}}">  {{$jenis_hki->jenis_hki}}</option>                          @endforeach
               </select>

             </div>
             <div class="form-group col-md-4" style="padding-left: 5px;padding-right: 0px">
               <label for="status">Status</label>
               <select class="form-control" name="status_hki" id="status_hki">
                 <option value="">-- Pilih Status HKI --</option>   
                 @foreach($menu['data_status_hki'] as $status_hki)
                 <option value="{{$status_hki->status_hki}}">  {{$status_hki->status_hki}}</option>                           
                 @endforeach
               </select>
             </div>

             <div class="form-group col-md-4" style="padding-right: 0px;padding-left: 10px">
               <label for="tahun">Tahun</label>
               <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" value="{{$menu['data']->tahun}}">

             </div>

             <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" required="" value="">
            </div>

            <div class="form-group col-md-6" style="padding-left: 0px;padding-right: 10px">
              <label for="nomor_pendaftaran">Nomor Pendaftaran</label>
              <input type="text" class="form-control" id="nomor_pendaftaran" name="nomor_pendaftaran" placeholder="Nomor Pendaftaran" required="" value="">
            </div>
            <div class="form-group col-md-6" style="padding-right: 0px;padding-left: 10px">
              <label for="nomor_pencatatan">Nomor Pencatatan</label>
              <input type="text" class="form-control" id="nomor_pencatatan" name="nomor_pencatatan" placeholder="Nomor Pencatatan" required="" value="">
            </div>
            
            <div class="form-group col-md-3" style="padding-left: 0px;padding-right: 10px">
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
