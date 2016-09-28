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
            <form action="{{ url('/akademik/import') }}" method="get" class="form-inline">
                <div class="form-group">
                    <label class="box-title">Data Pendidikan : </label>
                    <select name="thaka" id="pilih_thaka" class="form-control" style="border:none; background-color:#efefef;font-weight: bolder;width:120px">
                        {{$selected1=""}}
                        {{$selected2=""}}
                        {{var_dump($menu['thaka'])}}
                        @for($i=date('Y');$i>=2009; $i--)
                            <option {{($menu['thaka']==$i."2")?"selected":""}} value="{{$i}}2">{{$i}}-Genap</option> 
                            <option {{($menu['thaka']==$i."1")?"selected":""}} value="{{$i}}1">{{$i}}-Ganjil</option> 
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
                        <th>Mata Kuliah</th>
                        <th>Kode</th>
         				<th>SKS</th>

         			</tr>
         		</thead>
         		<tbody>

                    @if($menu['data_kdgen']->isEmpty())
                        <tr><td colspan='4'><h4 class="text-center text-muted">Data Tidak Tersedia</h4></td></tr>
                    @else
                   <?php $i=1;?>
                        @foreach($menu['data_kdgen'] as $kdgen)
                    
                         <tr>
                         <td>{{$i++}}</td>
                         <td><strong>{{$kdgen->mt_nm}}</strong></td>
                         <td><strong>{{$kdgen->mt_kd}}</strong></td>
                         <td><strong>{{$kdgen->mt_sks}}</strong></td>
                         
                         
                      </tr>
                      @endforeach
                    @endif
         		</tbody>
         	</table>

         	</div>
         	<div class="box-footer clearfix">
                     @if(!$menu['data_kdgen']->isEmpty())
                        <a href="#" class="btn btn-md btn-success btn-flat pull-left" id="dari_siakad">Simpan ke Repository</a>
                     @endif
						

         	</div>
         </div>
         	
         </div>
          </div><!-- /.row -->
        </section><!-- /.content -->
@endsection
