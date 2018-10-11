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
        <h3 class="box-title">Data Penelitian - Luaran Jurnal </h3>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered table-hover" id="data_repo">
          <thead>
            <tr>
              <th>No</th>
              <th>Jenis Penelitian</th>
              <th>Judul Penelitian</th>
              <th>Judul</th>
              <th>Publikasi</th>
              <th>Tahun</th>
               <th></th>
              <th></th>
           </tr>
</thead>
<tbody>
  <?php $i=1; ?>
  @foreach($menu['data'] as $tampil)

  <tr>
   <td>{{$i++}}</td>
   <td>{{$tampil->jenis_penelitian}}</td>

   <td>{{$tampil->judul_penelitian}}</td>

   <td><a href= "" data-toggle="modal" data-target="#abstrak-{{$tampil->id}}" title="Detail">{{$tampil->judul}}</a>

    <!-- modal awal -->
    <div class="modal fade bs-example-modal-lg" id="abstrak-{{$tampil->id}}" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document" style="min-width: 1000px; overflow-y: auto;">
        <!-- <div class="modal-dialog modal-lg" role="document" style="overflow-y: scroll;"> -->
          <div class="modal-content">
            <div class="modal-header">
              <strong><h4 class="modal-title" id="Title">Detail : {{$tampil->judul}} </h4></strong>
            </div>
            <div class="modal-body">
             <table id="classTable" class="table table-bordered table-responsive">
              <thead>  
               <tr>
                 <th>Penulis</th>
                 <th>Nama Jurnal</th>
                 <th>Volume</th>
                 <th>Nomor</th>
                 <th>Sumberdana</th>
                 <th>Biaya</th>
                 <th>Tahun</th>
                 <th>URL</th>
               </tr>

             </thead>

             <tbody>
              <tr>
                <td>{{$tampil->penulis_publikasi}}</td>
                <td>{{$tampil->nama_jurnal}}</td>
                <td>{{$tampil->volume}}</td>
                <td>{{$tampil->nomor}}</td>
                <td>{{$tampil->sumberdana}}</td>
                <td>{{$tampil->biaya}}</td>
                <td>{{$tampil->tahun}}</td>
                <td>{{$tampil->url}}</td>
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
  <!-- modal akhir -->

</td>
<td>{{$tampil->jenis_publikasi}}</td>

<td>{{$tampil->tahun}}</td>

 <td>
    <a class="btn btn-sm btn-info  fa fa-edit" href="tampil_pen_luaran_jurnal/edit_pen_luaran_jurnal/{{$tampil->id}}" title="Edit Luaran"></a>
  </td>
    <td>
         <button onclick="hapus('{{$tampil->id}}')" class="btn btn-sm btn-danger fa fa-trash" title="Hapus"></button>
         </td>
          </tr>

 <!-- plugin swall alert -->

      <script>
       
        function hapus(id){
          swal({
            title: "Anda Yakin ?",
            text: "Ketika dihapus, Data anda akan hilang ",
            icon: "error",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

              swal("Data Berhasil Dihapus", {
                icon: "success",
              });
              window.location.href="tampil_pen_luaran_jurnal/hapus_jurnal/"+id;
            } else {
              swal({
                title: "Batal",
                text: "Data tersimpan",
                icon: "info",
              });

            }
          });
        }


      </script>
      <!-- akhir -->
@endforeach
</tbody>
</table>
<div class="box-footer clearfix">
   <a href="{{url('tampil_pen_luaran_jurnal/tambah_non_pen_luaran_jurnal')}}" class="btn btn-md btn-success btn-flat pull-left glyphicon glyphicon-new-window"  style="margin-right:10px" title="Tambahkan Luaran Tanpa Penelitian"></a>
</div>
</div>

</div>

</div>
</div><!-- /.row -->
</section><!-- /.content -->
@endsection
