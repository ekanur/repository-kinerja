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
        <h3 class="box-title">Data Pengabdian - Luaran Jurnal </h3>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered table-hover" id="data_repo">
          <thead>
            <tr><th>No</th>
              <th>Jenis Pengabdian</th>
              <th>Judul Pengabdian</th>
              <th>Judul</th>
              <th>Publikasi</th>
              <th>Tahun</th>
              <th>Abstrak</th>
              @if(Session::get('userRole')!='Dosen')
           <!--    <th></th>
              <th></th>
              <th></th> -->
              @endif
            </tr>
          </thead>
          <tbody>
            <?php $i=1; ?>
            @foreach($menu['data'] as $tampil)
            
            <tr>
             <td>{{$i++}}</td>
             <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->jenis_pengabdian}}</strong></td>
             
             <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->judul_pengabdian}}</strong></td>
             <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->judul}}</strong></td>
             <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->jenis_publikasi}}</strong></td>
             <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->tahun}}</strong></td>
             
             <td>

               <a class="btn btn-sm  glyphicon glyphicon-bookmark" data-toggle="modal" data-target="#abstrak-{{$tampil->id}}"></a>

               <div class="modal fade" id="abstrak-{{$tampil->id}}" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <strong><h3 class="modal-title" id="Title">Abstrak</h3></strong>
                    </button>
                  </div>
                  <div class="modal-body">
                   {{$tampil->abstrak}}
                 </div>
                 <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        </td>         
        @if(Session::get('userRole')!='Dosen')
<!--    <td>
    <a class="btn btn-sm btn-default  fa fa-eye" href="#" title="Lihat Luaran"></a>
  </td>   
  <td>
   
    <a class="btn btn-sm btn-info  fa fa-edit" href="#" title="Edit Penelitian"></a>
    
  </td>
  <td>
    <div>
      <a class="btn btn-sm btn-danger fa fa-trash" href="#" title="Hapus Penelitian"></a>
    </div>              
  </td>
-->
@endif

</tr>
@endforeach
</tbody>
</table>
<div class="box-footer clearfix">
  @if(Session::get('userRole')!='Dosen')
  <a href="{{url('tampil_peng_luaran_jurnal/tambah_non_peng_luaran_jurnal')}}" class="btn btn-md btn-success btn-flat pull-left glyphicon glyphicon-new-window"  style="margin-right:10px" title="Tambahkan Luaran Tanpa Pengabdian"></a>
  @endif
</div>
</div>

</div>

</div>
</div><!-- /.row -->
</section><!-- /.content -->
@endsection