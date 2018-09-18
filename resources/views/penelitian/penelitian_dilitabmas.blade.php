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
        <h3 class="box-title">Data Penelitian Dilitabmas</h3>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered table-hover" id="data_repo">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Ketua</th>
              <th>Kategori Bid</th>
              <th>Kategori TSE</th>
              <th>Tahun</th>
            <!--   <th>Abstrak</th> -->
              
              @if(Session::get('userRole')!='Dosen')
              <th></th>
              <th></th>
              <th></th>
              
              @endif
            </tr>
          </thead>
          <tbody>
            <?php $i=1; ?>
            @foreach($menu['data'] as $penelitian_dilitabmas)
            
            <tr>
             <td>{{$i++}}</td>
              <td><a href="penelitian_dilitabmas/lihat_dilitabmas/{{$penelitian_dilitabmas->id}}">{{$penelitian_dilitabmas->judul}}</a></td>
                <td>{{$penelitian_dilitabmas->ketua}}</td>
              <td>{{$penelitian_dilitabmas->kategori_bidang}}</td>
              <td>{{$penelitian_dilitabmas->kategori_tse}}</td>
              <td>{{$penelitian_dilitabmas->tahun}}</td>
            <!--   <td>
               <a class="btn btn-sm  glyphicon glyphicon-bookmark" data-toggle="modal" data-target="#abstrak-{{$penelitian_dilitabmas->id}}"></a>
               <div class="modal fade" id="abstrak-{{$penelitian_dilitabmas->id}}" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <strong><h3 class="modal-title" id="Title">Abstrak</h3></strong>
                    </button>
                  </div>
                  <div class="modal-body">
                   {{$penelitian_dilitabmas->abstrak}}
                 </div>
                 <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        </td>     -->
              
              @if(Session::get('userRole')!='Dosen')
              
              
              <td>
                
                <div class="dropdown">
                  <a class="btn btn-sm btn-warning fa fa-plus-square" id="dropdownMenu1" data-toggle="dropdown" title="Tambahkan Luaran"> </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    
                    <li ><a href="penelitian_dilitabmas/luaran_buku_ajar/{{$penelitian_dilitabmas->id}}">Buku Ajar</a></li>
                    <li class="divider"></li>
                    <li ><a href="penelitian_dilitabmas/luaran_jurnal/{{$penelitian_dilitabmas->id}}">Jurnal</a></li>
                    <li class="divider"></li>
                    <li ><a href="penelitian_dilitabmas/luaran_pemakalah/{{$penelitian_dilitabmas->id}}">Pemakalah Forum Ilmiah</a></li>
                    <li class="divider"></li>
                    <li ><a href="penelitian_dilitabmas/luaran_hki/{{$penelitian_dilitabmas->id}}">HKI</a></li>
                    <li class="divider"></li>
                    <li ><a href="penelitian_dilitabmas/luaran_lain/{{$penelitian_dilitabmas->id}}">Lain-Lain</a></li>
                  </ul>
                </div>

              </td>

              <td>
               
                <a class="btn btn-sm btn-info  fa fa-edit" href="penelitian_dilitabmas/edit_dilitabmas/{{$penelitian_dilitabmas->id}}" title="Edit Penelitian"></a>
                
              </td>
              <td>
                <div>
                  <a class="btn btn-sm btn-danger fa fa-trash" onclick="return confirm('Anda Yakin Ingin Menghapus Data ?')" href="penelitian_dilitabmas/hapus_dilitabmas/{{$penelitian_dilitabmas->id}}" title="Hapus Penelitian"></a>
                </div>   

             </td>
              
              @endif

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="box-footer clearfix">
  @if(Session::get('userRole')!='Dosen')
        <a href="{{url('penelitian_dilitabmas/tambah_dilitabmas')}}" class="btn btn-md btn-success btn-flat pull-left"  style="margin-right:10px">Tambah</a>
      
        @endif
      </div>
    </div>

  </div>
</div><!-- /.row -->
</section><!-- /.content -->
@endsection
