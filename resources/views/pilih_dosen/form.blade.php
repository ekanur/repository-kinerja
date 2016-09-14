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
					<h3 class="box-title">Pilih Dosen</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form role="form" method="POST" action="{{url('pilih_dosen/create')}}" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="box-body">
						<div class="form-group">
							<label for="nama_kegiatan">NIP/Nama Dosen</label>
							<input type="text" class="form-control" id="dosen" name="dosen" placeholder="Masukkan NIP/Nama dosen" required="" value="{{old('dosen')}}">
						</div>
					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div><!-- /.box -->
		</div>
	</div><!-- /.row -->
</section><!-- /.content -->
@endsection
