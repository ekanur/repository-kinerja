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
         		<h3 class="box-title">Data Pengabdian</h3>
         	</div>
         	<div class="box-body">
         		<table class="table table-striped table-bordered table-hover">
         		<thead>
         			<tr>
         				<th>No</th>
         				<th>Nama Kegiatan</th>
         				<th>Surat Penugasan</th>
         				<th>Bukti Kinerja</th>
         				<th>URL</th>
         				<th>Waktu Pelaksanaan</th>
         				<th colspan="2">Opsi</th>
         			</tr>
         		</thead>
         		<tbody>
         			<?php $i=1; ?>
         			@foreach($menu['data'] as $pengabdian)
                        
                     <tr>
                     <td>{{$i++}}</td>
                     <td><strong data-toggle="tooltip" data-placement="top" title="{{$pengabdian->deskripsi}}">{{$pengabdian->nama_kegiatan}}</strong></td>
                     <td><a href="{{url('uploads/')."/".$pengabdian->surat_penugasan}}">{{$pengabdian->surat_penugasan}}</a></td>
                     <td>
                        @foreach($pengabdian->bukti_kinerja as $bukti_kinerja)
                                <a href="{{url('uploads/')."/".$bukti_kinerja}}">{{$bukti_kinerja}}</a><br/>
                        @endforeach
                     </td>
                     <td><a href="http://{!! $pengabdian->url !!}" target="_new">{{$pengabdian->url}}</a></td>
                     <td>{{$pengabdian->tgl}}</td>
                     <td><a href="pengabdian/edit/{{$pengabdian->id}}" class='btn btn-sm btn-info'>Edit</a></td>
                     <td><a href="pengabdian/hapus/{{$pengabdian->id}}" class="btn btn-sm btn-danger">Hapus</a></td>
                  </tr>
                  @endforeach
         		</tbody>
         	</table>
         	</div>
         	<div class="box-footer clearfix">
         		<a href="{{url('pengabdian/tambah')}}" class="btn btn-md btn-success btn-flat pull-left">Tambah</a>
         	</div>
         </div>
         	
         </div>
          </div><!-- /.row -->
        </section><!-- /.content -->
@endsection
