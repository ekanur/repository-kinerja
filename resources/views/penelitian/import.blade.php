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
            <form action="{{ url('/penelitian/import') }}" method="get" class="form-inline">
                <div class="form-group">
                    <label class="box-title">Data Penelitian : </label>
                    <select name="tahun" id="tahun" class="form-control" style="border:none; background-color:#efefef;font-weight: bolder;width:120px">
                        {{$selected1=""}}
                        {{$selected2=""}}
                        {{-- {{var_dump($menu['thaka'])}} --}}
                        @for($i=date('Y');$i>=2009; $i--)
                            <option {{($menu['tahun']==$i)?"selected":""}} value="{{$i}}">{{$i}}</option> 
                        @endfor
                    </select>
                </div>
                    
                </form>
         		
         	</div>
         	<div class="box-body">

                
         		<table  class="table table-striped table-bordered table-hover">

         		<thead>
                    
         			<tr>
         				<th>No</th>
                        <th>Judul Penelitian</th>
                        <th>Status</th>
                        <th>Lama Kegiatan</th>
         				<th>Total Pendanaan</th>

         			</tr>
         		</thead>
         		<tbody>

                    @if($menu['data_litabmas']->isEmpty())
                        <tr><td colspan='5'><h4 class="text-center text-muted">Data Tidak Tersedia</h4></td></tr>
                    @else
                   <?php $i=1;?>
                        @foreach($menu['data_litabmas'] as $litabmas)
                         <tr>
                         <td>{{$i++}}</td>
                         <td><strong>{{$litabmas->judul_litabmas}}</strong></td>
                         <td>{{$litabmas->status}}</td>
                         <td>{{$litabmas->lama_kegiatan}} Tahun</td>
                         <td><strong>Rp.{{number_format($litabmas->total_dana)}}</strong></td>
                         
                         
                      </tr>
                      @endforeach
                    @endif
         		</tbody>
         	</table>

         	</div>
         	<div class="box-footer clearfix">
                     @if(!$menu['data_litabmas']->isEmpty())
                        <a href="#" class="btn btn-md btn-success btn-flat pull-left" id="dari_litabmas">Simpan ke Repository</a>
                     @endif
						

         	</div>
         </div>
         	
         </div>
          </div><!-- /.row -->
        </section><!-- /.content -->
@endsection
