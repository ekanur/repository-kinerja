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
                  <h3 class="box-title">Daftar Validasi Biodata PTK</h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6"></div>
                    </div>
                    <div class="row">
                    <div class="col-sm-12"><table class="table table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
                    <tbody>
                        @foreach($data as $data)
                        <tr style="cursor: pointer;" onclick="window.location.href = '/valbiodataptk/validasi/admin/{{{ $data->logid }}}';">
                            <td width='20%'>@if($data->stat_validasi==1)<strong>{{{ $data->nm_ptk }}}</strong>@else{{{ $data->nm_ptk }}}@endif</td>
<td width='15%'>@if($data->stat_validasi==1)<strong>{{{ $data->ket }}}</strong>@else{{{ $data->ket }}}@endif</td>
<td>{{{ $data->ket_data }}}</td>
<td width='10%'>
<?php echo \App\lib\Common::status_validasi($data->stat_validasi) ?>
</td>
<td width='15%'>
{{ \App\lib\Common::format_datetime_abb($data->last_update,'ina') }}
</td>
                            </tr>
@endforeach
                      </tbody>
                  </table>
                  </div>
                  </div>
                  
                  </div>
                </div><!-- /.box-body -->
            </div>
    </section><!-- /.content -->
@endsection
