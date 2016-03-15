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
         		<h3 class="box-title">Data Akademik</h3>
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
         			@foreach($menu['data'] as $akademik)
                    
                     <tr>
                     <td>{{$i++}}</td>
                     <td><strong data-toggle="tooltip" data-placement="top" title="{{$akademik->deskripsi}}">{{$akademik->nama_kegiatan}}</strong></td>
                     <td><a href="{{url('uploads/')."/".$akademik->surat_penugasan}}">{{$akademik->surat_penugasan}}</a></td>
                     <td><a href="$akademik->bukti_kinerja">{{$akademik->bukti_kinerja}}</a></td>
                     <td><a href="{!! $akademik->url !!}" target="_new">{{$akademik->url}}</a></td>
                     <td>{{$akademik->tgl}}</td>
                     <td><a href="akademik/edit/{{$akademik->id}}" class='btn btn-sm btn-info'>Edit</a></td>
                     <td><a href="akademik/hapus/{{$akademik->id}}" class="btn btn-sm btn-danger">Hapus</a></td>
                  </tr>
                  @endforeach
         		</tbody>
         	</table>
         	</div>
         	<div class="box-footer clearfix">
         		<a href="{{url('akademik/tambah')}}" class="btn btn-md btn-success btn-flat pull-left">Tambah</a>
         	</div>
         </div>
         	
         </div>
          </div><!-- /.row -->
        </section><!-- /.content -->
@endsection
