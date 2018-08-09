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
              <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" required="" value='{{$menu['data']->judul}}'>
            </div>

            <div class="form-group">
              <label for="ketua">Ketua</label>
              <input type="text" class="form-control" id="ketua" name="ketua" placeholder="Ketua" required="" value='{{$menu['data']->ketua}}'>
            </div>


            <div class="form-group">
              <label for="anggota_1">Anggota 1</label>
              <input type="text" class="form-control" id="anggota_1" name="anggota_1" placeholder="Kosongkan Jika Tidak Ada" value='{{$menu['data']->anggota_1}}'>
            </div>


            <div class="form-group">
              <label for="anggota_2">Anggota 2</label>
              <input type="text" class="form-control" id="anggota_2" name="anggota_2" placeholder="Kosongkan Jika Tidak Ada" value='{{$menu['data']->anggota_2}}'>
            </div>

            <div class="form-group">
              <label for="anggota_3">Anggota 3</label>
              <input type="text" class="form-control" id="anggota_3" name="anggota_3" placeholder="Kosongkan Jika Tidak Ada" value='{{$menu['data']->anggota_3}}'>
            </div>

            <div class="form-group">
              <label for="anggota_4">Anggota 4</label>
              <input type="text" class="form-control" id="anggota_4" name="anggota_4" placeholder="Kosongkan Jika Tidak Ada" value='{{$menu['data']->anggota_4}}'>
            </div> 


            <div class="form-group">
              <label for="anggota_5">Anggota 5</label>
              <input type="text" class="form-control" id="anggota_5" name="anggota_5" placeholder="Kosongkan Jika Tidak Ada" value='{{$menu['data']->anggota_5}}'>
            </div>

            <div class="form-group col-md-6" style="padding-left: 0px;padding-right: 10px">
             <label for="Hibah">Hibah</label>
             <select class="form-control" name="hibah" id="hibah">
               <option value="{{$menu['data']->hibah}}">{{$menu['data']->hibah}}</option>   
               @foreach($menu['data_hibah'] as $hibah)
               <option value="{{$hibah->hibah}}">  {{$hibah->hibah}}</option>                           
               @endforeach
             </select>
           </div>

           <div class="form-group col-md-6" style="padding-right:0px;padding-left: 10px">
             <label for="skema">Skema</label>
             <select class="form-control" name="skema_penelitian" id="skema_penelitian">
               <option value="{{$menu['data']->skema}}">{{$menu['data']->skema}}</option>   
               @foreach($menu['data_skema_penelitian'] as $skema_penelitian)
               <option value="{{$skema_penelitian->skema_penelitian}}">  {{$skema_penelitian->skema_penelitian}}</option>                           
               @endforeach
             </select>            
          </div>

          <div class="form-group col-md-6" style="padding-left: 0px;padding-right: 10px">
           <label for="kategori bidang">Kategori Bidang</label>
           <select class="form-control" name="kategori_bidang" id="kategori_bidang">
            <option value="{{$menu['data']->kategori_bidang}}">{{$menu['data']->kategori_bidang}}</option>   
            @foreach($menu['data_kategori_bidang'] as $kategori_bidang)
            <option value=" {{$kategori_bidang->kategori_bidang}}">  {{$kategori_bidang->kategori_bidang}}</option>                           
            @endforeach
          </select>
        </div>

        <div class="form-group col-md-6" style="padding-right: 0px;padding-left: 10px">
         <label for="bidang">Bidang</label>
         <select class="form-control" name="bidang" id="bidang" placeholder="bidang">
           <option value="{{$menu['data']->bidang}}">{{$menu['data']->bidang}}</option>   
            @foreach($menu['data_bidang'] as $bidang)
           <option value=" {{$bidang->bidang}}">  {{$bidang->bidang}}</option>                           
           @endforeach
         </select>
       </div>


       <div class="form-group col-md-6" style="padding-left: 0px;padding-right: 10px">
         <label for="kategori tse">Kategori TSE</label>
         <select class="form-control" name="kategori_tse" id="kategori_tse">
          <option value="{{$menu['data']->kategori_tse}}">{{$menu['data']->kategori_tse}}</option>   
             @foreach($menu['data_kategori_tse'] as $kategori_tse)
          <option value=" {{$kategori_tse->kategori_tse}}">  {{$kategori_tse->kategori_tse}}</option>                           
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-6" style="padding-right: 0px;padding-left: 10px">
       <label for="tse">TSE</label>
       <select class="form-control" name="tse" id="tse">
 <option value="{{$menu['data']->tse}}">{{$menu['data']->tse}}</option>   
            
         @foreach($menu['data_tse'] as $tse)
         <option value=" {{$tse->tse}}">  {{$tse->tse}}</option>                           
         @endforeach
       </select>
     </div>

     <div class="form-group col-md-9" style="padding-left: 0px;padding-right: 10px">
      <label for="dana">Dana</label>
      <input type="text" class="form-control" id="dana" name="dana" placeholder="Dana kegiatan" value="Rp. {{$menu['data']->dana}}">
    </div>

    <div class="form-group col-md-3" style="padding-right: 0px;padding-left: 10px">
     <label for="tahun">Tahun</label>
     <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" value="{{$menu['data']->tahun}}">
     
   </div>

   <div class="form-group">

    <label for="url_kegiatan">URL kegiatan</label>
    <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="{{$menu['data']->url}}">
  </div>

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