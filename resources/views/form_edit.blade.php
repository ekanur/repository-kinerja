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
                  <h3 class="box-title">Edit <em>"{{$menu['data']->nama_kegiatan}}"</em></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                @if(App::environment()=='production')
                <form role="form" method="POST" action="{{secure_asset($menu['kategori'].'/update/'.$menu['data']->id)}}" enctype="multipart/form-data">
                @else
                    <form role="form" method="POST" action="{{url($menu['kategori'].'/update/'.$menu['data']->id)}}" enctype="multipart/form-data">
                  @endif
                {{csrf_field()}}
                <input type="hidden" name='kategori' id="kategori" value="{{$menu['kategori']}}">
                <input type="hidden" name="id" id="id" value="{{$menu['data']->id}}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nama_kegiatan">Nama kegiatan</label>
                     
                      <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama kegiatan" required="" value='{{$menu['data']->nama_kegiatan}}'>
                    </div>
                    <div class="form-group">
                      <label for="deskripsi">Deskripsi kegiatan</label>
                      <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi kegiatan" required="">{{$menu['data']->deskripsi}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="url">URL kegiatan</label>
                      <input type="text" class="form-control" id="url" name="url" value="{{$menu['data']->url}}" placeholder="URL kegiatan" >
                    </div>
                    <div class="row-fluid">
                      <div class="container-fluid" style="padding-left: 0px;padding-right: 0px">
                        
                          <div class="form-group col-md-6" style="padding-left:0px;padding-right:10px">
                            <label for="waktu_pelaksanaan">Waktu pelaksanaan</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="waktu_pelaksanaan" name="tgl" value="{{$menu['data']->tgl}}">
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                        
                        
                          <div class="form-group col-md-6" style="padding-right:0px;padding-left:10px">
                            <label for="akhir_pelaksanaan">Hingga</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="akhir_pelaksanaan" name="akhir_pelaksanaan" value="{{$menu['data']->akhir_pelaksanaan}}">
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
                        { 
                          if($i."2"==$menu['data']->thaka){
                            echo "<option selected=\"selected\" value=\"".$tahun."2\">".$i." Semester Genap</option>";
                          }elseif($i."1"==$menu['data']->thaka){
                            echo "<option selected=\"selected\" value=\"".$tahun."1\">".$i." Semester Ganjil</option>";
                          
                          }else{
                          ?>
                        	<option value="{{$i}}2">{{$i}} Semester Genap</option>
                        	<option value="{{$i}}1">{{$i}} Semester Ganjil</option>
                        <?php
                            }
                         }
                        ?>
                      </select>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="surat_penugasan">Ganti Surat penugasan</label>
                      @if($menu['data']->surat_penugasan!='')
                        ( <a href="{{url('uploads/')."/".$menu['data']->surat_penugasan}}" target="_blank">{{$menu['data']->surat_penugasan}}</a> )
                      @endif
                      <br>
                      <div class="btn btn-default btn-file">
                        <i class="fa fa-paperclip"></i> Surat penugasan
                        <input type="file" id="surat_penugasan" name="surat_penugasan">
                      </div>
                      <p class="help-block">Format file jpg, jpeg, bmp, png</p>
                    </div>
                    <div class="form-group">
                      <label for="bukti_kinerja[]">Tambah Bukti kinerja</label>
                      <br>
                      @if($menu['data']->bukti_kinerja!='')

                      <ul class="list-unstyled">
                        @foreach($menu['data']->bukti_kinerja as $bukti_kinerja)
                          <li><a href="{{url('uploads/')."/".$bukti_kinerja}}" target='_blank'>{{$bukti_kinerja}}</a></li>
                        @endforeach
                      </ul>

                      @endif
                      
                      <div class="btn btn-default btn-file">
                        <i class="fa fa-paperclip"></i> Bukti kinerja
                        <input type="file" id="bukti_kinerja[]" name="bukti_kinerja[]" multiple="">
                      </div>
                      <p class="help-block">Format file jpg, jpeg, bmp, png (multiple file upload)</p>
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
