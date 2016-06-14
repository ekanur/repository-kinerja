@extends('layout.master',['menu'=>$menu])
@section('content')
        <!-- Main content -->
<section class="content">
          <div class="callout callout-info">
            <h4>Informasi</h4>
            <p>Pastikan anda memeriksa secara seksama data anda</p>
          </div>
          <!-- Default box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Form Validasi Biodata PTK</h3>
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
                  <div class="form-group">
                    <label>Tipe Kesalahan</label>
                    <select class="form-control select2" style="width: 100%;" name="errtype">
                      <option selected="">--Pilih--</option>
                      {{-- */$i=1;/* --}}
                      @foreach ($errortype as $errortype)
                      <option value="{{{ $errortype->id_err_type }}}">{{{ $errortype->ket }}}</option>
                      @endforeach
                    </select>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" rows="3" placeholder="Masukkan keterangan jika ada..." name="ket"></textarea>
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
                    <button class="btn btn-info" type="submit">Simpan</button>
                  </div><!-- /.box-footer -->
               {!! Form::close() !!}
          </div><!-- /.box -->
   </section><!-- /.content -->@endsection
