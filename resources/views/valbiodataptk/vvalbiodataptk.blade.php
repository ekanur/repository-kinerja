@extends('layout.master',['menu'=>$menu])
@section('content')
        <!-- Main content -->
        <section class="content">
             @if(session()->has('statusmessage'))
          <div class="callout callout-info">
            <h4>Info!</h4>
            <p>{{{ session('statusmessage') }}}</p>

          </div>
           @endif
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Biodata PTK</h3>
                  <a href="/valbiodataptk/validasi/{{{ $data['0']->id_ptk }}}" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Validasi</a>  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6"></div>
                    </div>
                    <div class="row">
                    <div class="col-sm-12"><table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
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
                        <td width="25%">Tempat dan Tanggal Lahir</td>
                        <td width="3%">:</td>
                        <td>{{{ $data['0']->tmpt_lahir }}}, {{ \App\lib\Common::format_date_abb($data['0']->tgl_lahir,'ina') }} </td>
                      </tr>
                      <tr role="row" class="odd">
                        <td width="5%">5.</td>
                        <td width="25%">Jenis Kelamin</td>
                        <td width="3%">:</td>
                        <td>{{{ ($data['0']->jk=='L')?"Laki-laki":"Perempuan" }}} </td>
                      </tr>
                      <tr role="row" class="odd">
                        <td width="5%">6.</td>
                        <td width="25%">Email</td>
                        <td width="3%">:</td>
                        <td>{{{ $data['0']->email }}} </td>
                      </tr>
                      <tr role="row" class="odd">
                        <td width="5%">7.</td>
                        <td width="25%">Jenis</td>
                        <td width="3%">:</td>
                        <td>{{{ $data['0']->nm_jns_ptk }}} </td>
                      </tr>
                      <tr role="row" class="odd">
                        <td width="5%">8.</td>
                        <td width="25%">Agama</td>
                        <td width="3%">:</td>
                        <td>{{{ $data['0']->nm_agama }}}</td>
                      </tr>
                      </tbody>
                  </table>
                  </div>
                  </div>
                  @if(count($datalog)>0)
                  <br>
                  <div class="row">
                    <div class="col-sm-12">
                  <div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Riwayat Validasi</h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="collapse" type="button">
<i class="fa fa-minus"></i>
</button>
<button class="btn btn-box-tool" data-widget="remove" type="button">
<i class="fa fa-times"></i>
</button>
</div>
</div>
<div class="box-body">
<div class="table-responsive">
<table class="table no-margin">
<thead>
<tr>
<th>No</th>
<th>Tipe Kesalahan</th>
<th>Keterangan</th>
<th>Status</th>
<th>Wkt Kirim</th>
<th>Wkt Update</th>
<th>Dikirim Oleh</th>
</tr>
</thead>
<tbody>
{{-- */$i=1;$k=0;/* --}}
@foreach($datalog as $datalog)
                    <tr role="row" class="odd">
                        <td>{{{ $i++ }}}</a></td>
                        <td>{{{ $datalog->ket }}}</a></td>
                        <td>{{{ $datalog->ket_data }}}</td>
                        <td><?php echo \App\lib\Common::status_validasi($datalog->stat_validasi) ?></td>
                        <td>{{ \App\lib\Common::format_datetime_abb($datalog->create_date,'ina') }}</td>
                        <td>{{ \App\lib\Common::format_datetime_abb($datalog->last_update,'ina') }} </td>
                        <td>{{{ $datalog->app_username }}}</td>
                      </tr>
                    {{-- */$k++;/* --}}
                    @endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
                  @endif
<!--                  <div class="row">
                    <div class="col-sm-12">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 21 to 30 of 57 entries</div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination">
                                <li class="paginate_button previous" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li>
                                <li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li>
                                <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li>
                                <li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li>
                            </ul>
                        </div>
                    </div>
                  </div>-->
                  </div>
                </div><!-- /.box-body -->
              </div>














        </section><!-- /.content -->
@endsection
