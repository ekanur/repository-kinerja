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
        <h3 class="box-title">Data Pengabdian Non Dilitabmas</h3>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered table-hover" id="data_repo">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Ketua</th>
              <th>Skema</th>
              <th>Tahun</th>
          <!--     <th>Abstrak</th> -->
              @if(Session::get('userRole')!='Dosen')
              <th></th>
              <th></th>
              <th></th>  
              @endif
            </tr>
          </thead>
          <tbody>
            <?php $i=1; ?>
            @foreach($menu['data'] as $pengabdian_non_dilitabmas)
            
            <tr>
             <td>{{$i++}}</td>
             
             <td><a href="pengabdian_non_dilitabmas/lihat_peng_non_dilitabmas/{{$pengabdian_non_dilitabmas->id}}">
              {{$pengabdian_non_dilitabmas->judul}}</a></td>
              <td>    {{$pengabdian_non_dilitabmas->ketua}}</td>         
              <td>    {{$pengabdian_non_dilitabmas->skema}}</td>
              <td>    {{$pengabdian_non_dilitabmas->tahun}}</td>
              
     <!--          <td>
               <a class="btn btn-sm  glyphicon glyphicon-bookmark" data-toggle="modal" data-target="#abstrak-{{$pengabdian_non_dilitabmas->id}}"></a>

               <div class="modal fade" id="abstrak-{{$pengabdian_non_dilitabmas->id}}" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <strong><h3 class="modal-title" id="Title">Abstrak</h3></strong>
                    </button>
                  </div>
                  <div class="modal-body">
                   {{$pengabdian_non_dilitabmas->abstrak}}
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
            @if(Session::get('userID_login')==null)
          <button onclick="ulogin_null()" class="btn btn-sm btn-warning fa fa-plus-square" title="Tambah Luaran"></button>
          @else
          <div class="dropdown">
            <a class="btn btn-sm btn-warning fa fa-plus-square" id="dropdownMenu1" data-toggle="dropdown" title="Tambahkan Luaran">
              
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li ><a href="pengabdian_non_dilitabmas/luaran_buku_ajar_peng/{{$pengabdian_non_dilitabmas->id}}">Buku Ajar</a></li>
              <li class="divider"></li>
              <li ><a href="pengabdian_non_dilitabmas/luaran_jurnal_peng/{{$pengabdian_non_dilitabmas->id}}">Jurnal</a></li>
              
              <li class="divider"></li>
              <li ><a href="pengabdian_non_dilitabmas/luaran_pemakalah_peng/{{$pengabdian_non_dilitabmas->id}}">Pemakalah Forum Ilmiah</a></li>
              <li class="divider"></li>
              <li ><a href="pengabdian_non_dilitabmas/luaran_hki_peng/{{$pengabdian_non_dilitabmas->id}}">HKI</a></li>
              <li class="divider"></li>
              <li ><a href="pengabdian_non_dilitabmas/luaran_lain_peng/{{$pengabdian_non_dilitabmas->id}}">Lain-Lain</a></li>
            </ul>
          </div>
        @endif  
        </td>

        <td>
          @if(Session::get('userID_login')==null)
          <button onclick="ulogin_null()" class='btn btn-sm btn-info  fa fa-edit' title="Edit Pengabdian"></button>
          @else
          <a href = "pengabdian_non_dilitabmas/edit_peng_non_dilitabmas/{{$pengabdian_non_dilitabmas->id}}" class='btn btn-sm btn-info  fa fa-edit' title="Edit Pengabdian"></a>
          @endif
        </td>

        <td>
          @if(Session::get('userID_login')==null)
          <button onclick="ulogin_null()" class="btn btn-sm btn-danger fa fa-trash" title="Hapus Pengabdian"></button>
          @else
          <button onclick="hapus('{{$pengabdian_non_dilitabmas->id}}')" class="btn btn-sm btn-danger fa fa-trash" title="Hapus Pengabdian"></button>
          @endif            
        </td>

        @endif

      </tr>
      <!-- plugin swall alert -->

      <script>
        function ulogin_null(){
          swal("Kesalahan", "Data dosen belum dipilih", "warning");
        }


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
              window.location.href="pengabdian_non_dilitabmas/hapus_peng_non_dilitabmas/"+id;
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
</div>
<div class="box-footer clearfix">
  @if(Session::get('userRole')!='Dosen')
  <a href="{{url('pengabdian_non_dilitabmas/tambah_peng_non_dilitabmas')}}" class="btn btn-md btn-success btn-flat pull-left"  style="margin-right:10px">Tambah</a>

  

  @endif
</div>
</div>

</div>
</div><!-- /.row -->
</section><!-- /.content -->
@endsection
