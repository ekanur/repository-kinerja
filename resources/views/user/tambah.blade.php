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
                  <h3 class="box-title">Tambah {{$menu['menu']}}</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                @if(App::environment()=='production')
                <form role="form" method="POST" action="{{secure_asset('/tambah')}}" enctype="multipart/form-data">
                  @else
                    <form role="form" method="POST" action="{{url('/tambah')}}" enctype="multipart/form-data">
                    @endif
                {{csrf_field()}}
                
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nama_kegiatan">User ID</label>
                      <input type="text" class="form-control" id="nama_kegiatan" name="user_id" placeholder="User ID" required="" value="{{old('user_id')}}">
                    </div>
                   
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div>
          </div><!-- /.row -->
        </section><!-- /.content -->
@endsection
