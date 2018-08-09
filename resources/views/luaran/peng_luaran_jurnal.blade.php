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
              <th>ID Luaran</th>
              <th>Jenis Pengabdian</th>
              <th>ID Pen</th>
              <th>Judul</th>
              <th>Publikasi</th>
              <th>Tahun</th>
              @if(Session::get('userRole')!='Dosen')
              <th></th>
              <th></th>
              <th></th>
              @endif
            </tr>
          </thead>
          <tbody>
            <?php $i=1; ?>
            @foreach($menu['data'] as $tampil)
            
            <tr>
             <td>{{$i++}}</td>
             <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->id}}</strong></td>

             <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->jenis_pengabdian}}</strong></td>
           </td>
           <td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->id_pengabdian}}</strong></td>
           </td><td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->judul}}</strong></td>
           </td><td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->jenis_publikasi}}</strong></td><td><strong data-toggle="tooltip" data-placement="top" >{{$tampil->tahun}}</strong></td>
           </td>
           </td>
       
          @if(Session::get('userRole')!='Dosen')
                    <td>
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
          
          @endif

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
 
</div>

</div>
</div><!-- /.row -->
</section><!-- /.content -->
@endsection
