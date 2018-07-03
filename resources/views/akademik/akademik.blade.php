@extends('layout.master',['menu'=>$menu])
@section('content')
    <!-- Main content -->
        <section class="content">
              <!-- Small boxes (Stat box) -->
          <div class="row">
         <div class="col-md-12">
         @if(session('success'))
              
                <div class='alert alert-success'>{{session('success')}}</div>
         @elseif(session('error'))
                <div class='alert alert-danger'>{{session('error')}}</div>   
         @endif


         <div class="box">
         	<div class="box-header">
         		<h3 class="box-title">Data Pendidikan</h3>
         	</div>
         	<div class="box-body">
         		<table  id="data_repo" class="table table-striped table-bordered table-hover">
         		<thead>
                    
         			<tr>
         				<th>No</th>
         				<th>Nama Kegiatan</th>
         				<th>Surat Penugasan</th>
         				<th>Bukti Kinerja</th>
         				<th>Thaka</th>
         				<th>Waktu Pelaksanaan</th>
                        <th></th>
                        <th></th>
         			</tr>
         		</thead>
         		<tbody>
         			<?php $i=1; ?>
         			@foreach($menu['data'] as $akademik)
                    
                     <tr>
                     <td>{{$i++}}</td>
                     <td><strong data-toggle="tooltip" data-placement="top" title="{{$akademik->deskripsi}}">{{$akademik->nama_kegiatan}}</strong></td>
                     <td><a href="{{url('uploads/')."/".$akademik->surat_penugasan}}">{{$akademik->surat_penugasan}}</a></td>
                     <td> @foreach($akademik->bukti_kinerja as $bukti_kinerja)
                                <a href="{{url('uploads/')."/".$bukti_kinerja}}">{{$bukti_kinerja}}</a><br/>
                        @endforeach</td>
                     <td>{{$akademik->thaka}}</td>
                     <td>
                        @if($akademik->tgl!=null&&$akademik->akhir_pelaksanaan!=null)
                        {{$akademik->tgl}} - {{$akademik->akhir_pelaksanaan}}
                        @endif
                     </td>
                     <td>
                        @if(Session::get('userRole')!='Dosen')
                            <a href="akademik/edit/{{$akademik->id}}" class='btn btn-sm btn-info'>Edit</a>
                        @endif
                    </td>
                     <td>
                        @if(Session::get('userRole')!='Dosen')
                        <a href="akademik/hapus/{{$akademik->id}}" class="btn btn-sm btn-danger">Hapus</a>
                        @endif
                    </td>
                  </tr>
                  @endforeach
         		</tbody>
         	</table>

         	</div>
         	<div class="box-footer clearfix">
            @if(Session::get('userRole')!='Dosen')
                    <a href="{{url('akademik/tambah')}}" class="btn btn-md btn-success btn-flat pull-left" style="margin-right:10px">Tambah Data</a>

                    <a href="{{url('akademik/import')}}" class="btn btn-md btn-primary btn-flat pull-left">Ambil Data SIAKAD</a>

            @endif

						
         	</div>
         </div>
         	
         </div>
          </div><!-- /.row -->
        </section><!-- /.content -->
@endsection
