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


         <div class="box  box-primary">
         	<div class="box-header">
         		<h3 class="box-title">Manajemen User</h3>
         	</div>
         	<div class="box-body">
         		<table class="table table-striped table-bordered table-hover" id="data_repo">
         		<thead>
         			<tr>
         				<th>No</th>
         				<th>User ID</th>
         				<th>Status</th>
         				<th>Hapus</th>
         			</tr>
         		</thead>
         		<tbody>
                <?php $i=1;?>
                <?php $on="";  ?>
         			@foreach($menu['data'] as $user)
                    {{-- {{var_dump($user["user_id"])}} --}}
                    @if($user->status==1)
                        <?php $on="checked";?>
                    @endif
                    <tr>
                        <td><strong>{{$i++}}</strong></td>
                        <td><strong>{{$user->user_id}}</strong></td>
                        <td><input type="checkbox" name="status" value="{{$user->user_id}}" {{$on}} id="user_status"></td>
                        <td><a class='btn btn-flat btn-danger' href="{{ url('/user/hapus') }}/{{$user->user_id}}"><i class="fa fa-close"></i></a></td>
                    </tr>
                    @endforeach
         		</tbody>
         	</table>
         	</div>
         	<div class="box-footer clearfix">
            
         	</div>
         </div>
         
         <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah {{$menu['menu']}}</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                @if(App::environment()=='production')
                <form role="form" method="POST" action="{{secure_asset('/user/save')}}">
                  @else
                    <form role="form" method="POST" action="{{url('/user/save')}}">
                    @endif
                {{csrf_field()}}
                
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nama_kegiatan">User ID</label>
                      <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User ID" required="" >
                    </div>
                   
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
         </div>
          </div><!-- /.row -->
        </section><!-- /.content -->
@endsection
