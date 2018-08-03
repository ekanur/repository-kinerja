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
        <h3 class="box-title">Data Pengabdian Dilitabmas</h3>
      </div>
      <div class="box-body">
        <table class="table table-striped table-bordered table-hover" id="data_repo">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Ketua</th>
              <th>Skema</th><th>Tahun</th>
              <th>Luaran</th>
              @if(Session::get('userRole')!='Dosen')
              <th></th>
              <th></th>
              <th></th>
              @endif
            </tr>
          </thead>
          <tbody>
            <?php $i=1; ?>
            @foreach($menu['data'] as $pengabdian_dilitabmas)
            
            <tr>
             <td>{{$i++}}</td>
             <td><strong data-toggle="tooltip" data-placement="top" >
                {{$pengabdian_dilitabmas->judul}}</strong></td>

             <td><strong data-toggle="tooltip" data-placement="top" >
                {{$pengabdian_dilitabmas->ketua}}</strong></td>
           </td>
          <td><strong data-toggle="tooltip" data-placement="top">
            {{$pengabdian_dilitabmas->skema}}</strong></td>
          </td><td><strong data-toggle="tooltip" data-placement="top">
            {{$pengabdian_dilitabmas->tahun}}</strong></td>
          </td>                
          <td></td>
          @if(Session::get('userRole')!='Dosen')
          <td>
            
            <div class="dropdown">
              <a class="btn btn-sm btn-warning fa fa-plus-square" id="dropdownMenu1" data-toggle="dropdown" title="Tambahkan Luaran">
              
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li ><a href="pengabdian_dilitabmas/luaran_jurnal_peng/{{$pengabdian_dilitabmas->id}}">Jurnal</a></li>
                <li class="divider"></li>
                <li ><a href="pengabdian_dilitabmas/luaran_buku_ajar_peng/{{$pengabdian_dilitabmas->id}}">Buku Ajar</a></li>
                <li class="divider"></li>
                <li ><a href="pengabdian_dilitabmas/luaran_pemakalah_peng/{{$pengabdian_dilitabmas->id}}">Pemakalah Forum Ilmiah</a></li>
                <li class="divider"></li>
                <li ><a href="pengabdian_dilitabmas/luaran_hki_peng/{{$pengabdian_dilitabmas->id}}">HKI</a></li>
                <li class="divider"></li>
                <li ><a href="pengabdian_dilitabmas/luaran_lain_peng/{{$pengabdian_dilitabmas->id}}">Lain-Lain</a></li>
              </ul>
            </div>

          </td>

          <td>
           
            <a class=" btn btn-sm btn-info  fa fa-edit" href="pengabdian_dilitabmas/edit_peng_dilitabmas/{{$pengabdian_dilitabmas->id}}" title="Edit Penelitian"></a>
            
          </td>
          <td>
            <div>
              <a class="btn btn-sm btn-danger fa fa-trash" href="pengabdian_dilitabmas/hapus_peng_dilitabmas/{{$pengabdian_dilitabmas->id}}" title="Hapus Penelitian"></a>
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
    <a href="{{url('pengabdian_dilitabmas/tambah_peng_dilitabmas')}}" class="btn btn-md btn-success btn-flat pull-left"  style="margin-right:10px">Tambah</a>

    <a href="{{url('penelitian/import')}}" class="btn btn-md btn-primary btn-flat pull-left">Ambil Data LITABMAS</a>

    @endif
  </div>
</div>

</div>
</div><!-- /.row -->
</section><!-- /.content -->
@endsection
