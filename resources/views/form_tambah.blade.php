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
                  <h3 class="box-title">Tambah {{$menu['menu']}}</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                @if(App::environment()=='production')
                <form role="form" method="POST" action="{{secure_asset($menu['kategori'].'/tambah')}}" enctype="multipart/form-data">
                  @else
                    <form role="form" method="POST" action="{{url($menu['kategori'].'/tambah')}}" enctype="multipart/form-data">
                    @endif
                {{csrf_field()}}
                <input type="hidden" id="kategori" value="{{$menu['kategori']}}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nama_kegiatan">Nama kegiatan</label>
                      <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama kegiatan" required="" value="{{old('nama_kegiatan')}}">
                    </div>
                    <div class="form-group">
                      <label for="deskripsi_kegiatan">Deskripsi kegiatan</label>
                      <textarea class="form-control" id="deskripsi_kegiatan" name="deskripsi_kegiatan" placeholder="Deskripsi kegiatan" required="">{{old('deskripsi_kegiatan')}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="url_kegiatan">URL kegiatan</label>
                      <input type="text" class="form-control" id="url_kegiatan" name="url_kegiatan" placeholder="URL kegiatan" value="{{old('url_kegiatan')}}">
                    </div>
                    <div class="row-fluid">
                      <div class="container-fluid" style="padding-left: 0px;padding-right: 0px">
                        
                          <div class="form-group col-md-6" style="padding-left:0px;padding-right:10px">
                            <label for="waktu_pelaksanaan">Waktu pelaksanaan</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="waktu_pelaksanaan" name="waktu_pelaksanaan" value="{{old('waktu_pelaksanaan')}}">
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                        
                        
                          <div class="form-group col-md-6" style="padding-right:0px;padding-left:10px">
                            <label for="akhir_pelaksanaan">Hingga</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="akhir_pelaksanaan" name="akhir_pelaksanaan" value="{{old('akhir_pelaksanaan')}}">
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                        
                      </div>
                    </div>
                    
                    
                    <div class="form-group">
                      <label>Tahun akademik</label>
                      <select class="form-control select2 col-md-4" id="thaka" name="thaka">
                      	<?php 
                      	if(date('n')<7)
                      	{
                      		$tahun=date('Y')-1;
                      		echo "<option selected=\"selected\" value=\"".$tahun."2\">".$tahun." Semester Genap</option>";
                      		echo "<option value=\"".$tahun."1\">".$tahun." Semester Ganjil</option>";
                      	}
                      	else
                      	{
                      		$tahun=date('Y');
                      		echo "<option selected=\"selected\" value=\"".$tahun."1\">".$tahun." Semester Ganjil</option>";
                      	}
                      	 ?>
                        
                        <?php
                        for($i=($tahun-1);$i>1998;$i--)
                        { ?>
                        	<option value="{{$i}}2">{{$i}} Semester Genap</option>
                        	<option value="{{$i}}1">{{$i}} Semester Ganjil</option>
                        <?php }
                        ?>
                      </select>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="surat_penugasan">Surat penugasan</label><br>
                      <div class="btn btn-default btn-file">
                        <i class="fa fa-paperclip"></i> Surat penugasan
                        <input type="file" id="surat_penugasan" name="surat_penugasan">
                      </div>
                      <p class="help-block">Format file pdf, jpg, jpeg, png</p>
                    </div>
                    <div class="form-group">
                      <label for="bukti_kinerja[]">Bukti kinerja</label><br>
                      <div class="btn btn-default btn-file">
                        <i class="fa fa-paperclip"></i> Bukti kinerja
                        <input type="file" id="bukti_kinerja[]" name="bukti_kinerja[]" multiple="">
                      </div>
                      <p class="help-block">Format file pdf, jpg, jpeg, png (multiple file upload)</p>
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
