@extends('layout.master',['menu'=>$menu])
@section('content')
    <!-- Main content -->
        <section class="content">
              <!-- Small boxes (Stat box) -->
          <div class="row">
         <div class="col-md-12">
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
         			<tr>
         				<td>1.</td>
         				<td><strong data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...">Kegiatan Pertama</strong></td>
         				<td><a href="#">Judul Surat</a></td>
         				<td><a href="#">Bukti Kerja</a></td>
         				<td><a href="" target="_new">www.google.com</a></td>
         				<td>{{date('Y-m-d')}}</td>
         				<td><a href="#" class='btn btn-sm btn-info'>Edit</a></td>
         				<td><a href="#" class="btn btn-sm btn-danger">Hapus</a></td>
         			</tr>
         			<tr>
         				<td>2.</td>
         				<td><strong>Kegiatan Pertama</strong></td>
         				<td><a href="#">Judul Surat</a></td>
         				<td><a href="#">Bukti Kerja</a></td>
         				<td><a href="" target="_new">www.google.com</a></td>
         				<td>{{date('Y-m-d')}}</td>
         				<td><a href="#" class='btn btn-sm btn-info'>Edit</a></td>
         				<td><a href="#" class="btn btn-sm btn-danger">Hapus</a></td>
         			</tr>
         			<tr>
         				<td>3.</td>
         				<td><strong>Kegiatan Pertama</strong></td>
         				<td><a href="#">Judul Surat</a></td>
         				<td><a href="#">Bukti Kerja</a></td>
         				<td><a href="" target="_new">www.google.com</a></td>
         				<td>{{date('Y-m-d')}}</td>
         				<td><a href="#" class='btn btn-sm btn-info'>Edit</a></td>
         				<td><a href="#" class="btn btn-sm btn-danger">Hapus</a></td>
         			</tr>
         			<tr>
         				<td>4.</td>
         				<td><strong>Kegiatan Pertama</strong></td>
         				<td><a href="#">Judul Surat</a></td>
         				<td><a href="#">Bukti Kerja</a></td>
         				<td><a href="" target="_new">www.google.com</a></td>
         				<td>{{date('Y-m-d')}}</td>
         				<td><a href="#" class='btn btn-sm btn-info'>Edit</a></td>
         				<td><a href="#" class="btn btn-sm btn-danger">Hapus</a></td>
         			</tr>
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
