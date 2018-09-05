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
        <h3 class="box-title">Data Penelitian - Luaran Buku Ajar </h3>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered table-hover" id="data_repo">
          <thead>
            <tr><th>No</th>
              <th>Jenis Penelitian</th>
              <th>Judul Penelitian</th>
              <th>Judul</th>
              <th>Penerbit</th>
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
             <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->jenis_penelitian}}</strong></td>
             
             <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->judul_penelitian}}</strong></td>
             <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->judul}}</strong></td>
             <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->penerbit}}</strong></td>
             <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->tahun}}</strong></td>
             
             
             <td>

               <a class="btn btn-sm  glyphicon glyphicon-bookmark" data-toggle="modal" data-target="#abstrak-{{$tampil->id}}"></a>

               <div class="modal fade bs-example-modal-lg" id="abstrak-{{$tampil->id}}" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document" style="min-width: 1000px; overflow-y: auto;">
                <!-- <div class="modal-dialog modal-lg" role="document" style="overflow-y: scroll;"> -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <strong><h3 class="modal-title" id="Title">Abstrak</h3></strong>
                    </div>
                    <div class="modal-body">
                     <table id="classTable" class="table table-bordered table-responsive">
                      <thead>  
                        <tr>
                          <th>Jenis Penelitian</th>
                          <th>Judul Penelitian</th>
                          <th>Judul</th>
                          <th>Penerbit</th>
                          <th>Tahun</th>
                          <th>Jenis Penelitian</th>
                          <th>Judul Penelitian</th>
                          <th>Judul</th>
                          <th>Penerbit</th>
                          <th>Tahun</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                         <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->jenis_penelitian}}</strong></td>

                         <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->judul_penelitian}}</strong></td>
                         <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->judul}}</strong></td>
                         <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->penerbit}}</strong></td>
                         <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->tahun}}</strong></td>
                         <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->jenis_penelitian}}</strong></td>

                         <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->judul_penelitian}}</strong></td>
                         <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->judul}}</strong></td>
                         <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->penerbit}}</strong></td>
                         <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->tahun}}</strong></td>
                       </tr>
                     </tbody>
                   </table>

                   <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </td>         
        @if(Session::get('userRole')!='Dosen')
  <!--  <td>
    <a class="btn btn-sm btn-default  fa fa-eye" href="#" title="Lihat Luaran"></a>
  </td>     
  <td>
   
    <a class="btn btn-sm btn-info  fa fa-edit" href="#" title="Edit Penelitian"></a>
    
  </td>
  <td>
    <div>
      <a class="btn btn-sm btn-danger fa fa-trash" href="tampil_pen_luaran_buku/hapus_buku/{{$tampil->id}}" title="Hapus Penelitian"></a>
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
  <a href="{{url('tampil_pen_luaran_buku/tambah_non_pen_luaran_buku')}}" class="btn btn-md btn-success btn-flat pull-left glyphicon glyphicon-new-window"  style="margin-right:10px" title="Tambahkan Luaran Tanpa Penelitian"></a>
  @endif
</div>
</div>

</div>

</div>
</div><!-- /.row -->
</section><!-- /.content -->
@endsection
