@extends('layout.master',['menu'=>$menu])
@section('content')
        <!-- Main content -->
<section class="content">
          <!-- Default box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pengajuan Validasi Biodata PTK</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                <!-- form start -->
                {!! Form::open(array('route' => 'create','class' => 'form_horizontal')) !!}
<div class="box-body">
              <div class="row">
              <div class="col-md-7">
                    <table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
                    <tbody>
                    <tr role="row" class="odd">
                        <td width="5%">1.</td>
                        <td width="25%">Nama</td>
                        <td width="3%">:</td>
                        <td>{{{ $data['0']->nm_ptk }}} </td>
                      </tr>
                      <tr role="row" class="odd">
                        <td width="5%">2.</td>
                        <td width="25%">NIDN</td>
                        <td width="3%">:</td>
                        <td>{{{ $data['0']->nidn }}} </td>
                      </tr>
                      <tr role="row" class="odd">
                        <td width="5%">3.</td>
                        <td width="25%">NIP</td>
                        <td width="3%">:</td>
                        <td>{{{ $data['0']->nip }}} </td>
                      </tr>
                      <tr role="row" class="odd">
                        <td width="5%">4.</td>
                        <td width="25%">Jenis Kelamin</td>
                        <td width="3%">:</td>
                        <td>{{{ ($data['0']->jk=='L')?"Laki-laki":"Perempuan" }}} </td>
                      </tr>
                      <tr role="row" class="odd">
                        <td width="5%">5.</td>
                        <td width="25%">Email</td>
                        <td width="3%">:</td>
                        <td>{{{ $data['0']->email }}} </td>
                      </tr>
                      <tr role="row" class="odd">
                        <td width="5%">6.</td>
                        <td width="25%">Jenis</td>
                        <td width="3%">:</td>
                        <td>{{{ $data['0']->nm_jns_ptk }}} </td>
                      </tr>
                      <tr role="row" class="odd">
                        <td width="5%">7.</td>
                        <td width="25%">Agama</td>
                        <td width="3%">:</td>
                        <td>{{{ $data['0']->nm_agama }}}</td>
                      </tr>
                      </tbody>
                  </table>  
               </div>
                <div class="col-md-5">
                  <div class="box-header with-border">   
                    <h3 class="box-title">Informasi Validasi</h3>
                  </div>
                  <div class="form-group">
                    <label>Tipe Kesalahan</label>
                    <br>
                    <span>{{{ $data[0]->ket_error }}}</span>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                      <label>Keterangan</label>
                      <br>
                    <span>{{{ $data[0]->ket }}}</span>
                    </div>
                  <div class="form-group">
                      <label>Status Validasi</label>
                      <br>
                    <span><?php echo \App\lib\Common::status_validasi($data[0]->stat_validasi) ?></span>
                    </div>
                  <div class="form-group">
                      <label>Waktu Kirim</label>
                      <br>
                    <span>{{ \App\lib\Common::format_datetime_abb($data[0]->last_update,'ina') }}</span>
                    </div>
                  <div class="form-group">
                      <label>Dikirim Oleh</label>
                      <br>
                    <span>{{{ $data[0]->app_username }}}</span>
                    </div>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div>
          </div><!-- /.box -->
                  <div class="box-footer">
                      <input type="hidden" name="id" value="{{{ $data['0']->id_ptk }}}">
                      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                      <a class="btn btn-default" href="/valbiodataptk">Cancel</a>
                    <button class="btn btn-info" type="submit">Klaim Perbaikan</button>
                    <button class="btn btn-success" type="submit">Data Valid</button>
                  </div><!-- /.box-footer -->
               {!! Form::close() !!}
          </div><!-- /.box -->
   </section><!-- /.content -->@endsection
