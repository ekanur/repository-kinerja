@extends('layout.master',['menu'=>$menu])
@section('content')
        <!-- Main content -->
<section class="content">
          <div class="callout callout-info">
            <h4>Informasi Penting!</h4>
            <p>Pastikan data yang anda akan ajukan klaim adalah data yang benar</p>
          </div>
          <!-- Default box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Form Pendaftaran Klaim</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

                <!-- form start -->
                {!! Form::open(array('route' => 'createPengajuan', 'class' => 'form_horizontal')) !!}
                    <div class="box-body">
                      <div class="row">
                          <div class="col-md-12">
                              <table class="table table-bordered">
<tbody>
<tr>
<th style="width: 5%">#</th>
<th style="width:25%">Data Yang Diklaim`</th>
<th style="width:35%">Sebelum</th>
<th style="width:35%">Sesudah</th>
</tr>
{{-- */$i=1;/* --}}
@foreach ($aplikasi as $app)
    <tr>
<td>{{ $i++ }}.</td>
<td>{{ $app->klaim_item }}</td>
<td>
{{ $user->{$app->pk_tabel} }}
</div>
</td>
<td>
<input type="text" placeholder="Masukkan {{ $app->klaim_item }}  anda" id="input{{$app->pk_tabel}}" class="form-control" name="input[]">
<input type="hidden" name="tipe_input[]" value="{{ $app->id_klaim_referensi }}">
<input type="hidden" name="data_sebelum[]" value="{{ $user->{$app->pk_tabel} }}">
</td>
</tr>
@endforeach
</tbody>
</table>
                          </div>
                      </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                      <input type="hidden" name="idapp" value="{{ $idapp }}">
                    <button class="btn btn-default" type="submit">Cancel</button>
                    <button class="btn btn-info" type="submit">Simpan</button>
                  </div><!-- /.box-footer -->
               {!! Form::close() !!}
          </div><!-- /.box -->
   </section><!-- /.content -->@endsection
