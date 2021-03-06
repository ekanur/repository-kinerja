<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf_token" content="{{csrf_token()}}">
  <title>Aplikasi Repository Kinerja | Universitas Negeri Malang</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="style/img/logo_um.png">
  @if(App::environment()=='production')
  <link rel="stylesheet" href="{{secure_asset('style/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{secure_asset('style/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{secure_asset('style/dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{secure_asset('style/plugins/datepicker/datepicker3.css') }}">
{{--   <link rel="stylesheet" href="{{secure_asset('style/plugins/select2/select2.min.css') }}"> --}}
  <link rel="stylesheet" href="{{secure_asset('style/plugins/easyautocomplete/easy-autocomplete.css') }}">
  <link rel="stylesheet" href="{{secure_asset('style/plugins/bootstrap-notify/animate.css') }}">
  <link rel="stylesheet" href="{{secure_asset('style/plugins/datatables/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 {{-- Select 2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    {{-- Custom css untuk patching style dari plugin --}}
    <link href="{{ asset('style/dist/css/custom.css') }}" rel="stylesheet" />

  @else
  <link rel="stylesheet" href="{{asset('style/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('style/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{asset('style/dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{asset('style/plugins/datepicker/datepicker3.css') }}">
  <link rel="stylesheet" href="{{asset('style/plugins/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{asset('style/plugins/easyautocomplete/easy-autocomplete.css') }}">
  <link rel="stylesheet" href="{{asset('style/plugins/bootstrap-notify/animate.css') }}">
  <link rel="stylesheet" href="{{asset('style/plugins/datatables/dataTables.bootstrap.css') }}">

    {{-- Select 2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    {{-- Custom css untuk patching style dari plugin --}}
    <link href="{{ asset('style/dist/css/custom.css') }}" rel="stylesheet" />

  @endif
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body class="skin-blue-light sidebar-mini sidebar-collapse">
      <div style="padding: 15px 0;" aria-expanded="true">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-9">
              Aplikasi Lainnya :&nbsp;
              <a class="btn-sm btn-primary" href="#">DASHBOARD</a>
              <a href="https://profil.um.ac.id" class="btn-sm btn-secondary">PROFIL</a>
              <a href="https://siakad.um.ac.id" class="btn-sm btn-secondary">SIAKAD</a>
              <a href="http://sipadu.um.ac.id/sirkulasi" class="btn-sm btn-secondary">SIPADU</a>
              <a href="https://email.um.ac.id" class="btn-sm btn-secondary">E-MAIL</a>
            </div>
            <div class="col-md-3 text-right">
              <span class="hidden-xs">&nbsp;</span>
              <a style="color: #FFF;" class="btn-sm btn-default btn-danger btn-flat" href="{{ url('/servicelogout') }}">Logout</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Site wrapper -->

      <div class="wrapper">

        <header class="main-header">
          <!-- Logo -->
          <a href="{{url('/')}}" class="logo" >
            <span class="logo-mini">
              <i class="fa fa-institution"></i>
            </span>
            <span class="logo-lg">
            <strong>Repository Kinerja</strong>
            </span>
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <!-- <span class="logo-mini"><img src="{{asset('style/img/logo-small.png') }}" alt="" /></span> -->
            <!-- logo for regular state and mobile devices -->
           <!--  <span class="logo-lg"><img src="{{asset('style/img/repo.jpg') }}" alt="" /></span> -->
          </a>
          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->

            <div class="navbar-header">
             <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            
          </div>
          <div class="navbar-collapse collapse" id="searchbar">

           <ul class="nav navbar-nav navbar-right">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu" style="text-align:right; margin-right: 15px;">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs">{{{ Session::get('userID') }}} [Hak Akses: {{ Session::get('userRole')}} {{Session::get('userFakNm')}}]</span>
              </a>
            </li>
          </ul>
          
          
          @if($menu['userfak'])
          @if($menu['ketdosen'])

          <ul class="nav navbar-nav" style="margin:auto">
            <li style="padding:15px;"><span style="color:yellow">Anda Sedang mengakses Dosen : {{Session::get("ketDosen_nama")}} ({{Session::get("userID_login")}})</span></li>
            <li><a href='{{url("/pilih_dosen/remove")}}' style="padding-top:16px;"><i class="fa fa-close"></i> Ganti Dosen</a></li>
          </ul>
          @else
          @if(App::environment()=='production')
          <form class="navbar-form" action="{{secure_url('/pilih_dosen/create')}}" method="post">
            @else
            <form class="navbar-form" action="{{url('/pilih_dosen/create')}}" method="post">
              @endif
              {{csrf_field()}}
              <div class="form-group col-md-7">
                <div class="input-group pencarian-dosen">
                  <input type="hidden" name="dsn_nip" id="dsn_nip">
                  <input class="form-control" name="cari_dosen" placeholder="Cari NIP atau nama dosen..." autofocus="autofocus" type="text" id="cari_dosen" style="width: 99%;">
                  <span class="input-group-btn" style="width:1%">
                    <button type='submit' class='btn btn-success'><i class="fa fa-arrow-circle-right"></i></button> {{-- pilih dosen --}}
                  </span>
                </div>
              </div>
            </form>
            @endif
            
            @endif
          </div><!--/.nav-collapse -->

        </nav>
      </header>

      <!-- =============================================== -->

      <aside class="main-sidebar">
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <!-- <li class='treeview <?php if($menu["menu"]=="Dashboard") echo "active"; ?>  '>
              <a href="{{url('/')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
              
            </li>
            <li class='treeview <?php if($menu["menu"]=="Pendidikan") echo "active"; ?>  '>
              <a href="{{url('akademik')}}"><i class="fa fa-graduation-cap"></i> <span>Pendidikan</span></a>
            </li>
 -->
            <li class='treeview <?php if($menu["menu"]=="Penelitian") echo "active"; ?>  '>
              <a href="{{url('/')}}">
                <i class="fa fa-line-chart"></i> <span>Penelitian</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

               <li><a href="{{url('penelitian_dilitabmas')}}">
                <span class="fa fa-genderless">&nbsp;</span>Ditlitabmas
              </a></li>
              <li><a href="{{url('penelitian_non_dilitabmas')}}">
                <span class="fa fa-genderless">&nbsp;</span>Non-Ditlitabmas
              </a></li>
            </ul>
          </li>

          <li class="treeview <?php if($menu['menu']=='Pengabdian') echo "active"; ?>">
           <a href="{{url('/')}}">
            <i class="fa fa-users"></i> <span>Pengabdian</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">

            <li><a class="" href="{{url('pengabdian_dilitabmas')}}">
              <span class="fa fa-genderless">&nbsp;</span>Ditlitabmas
            </a></li>
            <li><a class="" href="{{url('pengabdian_non_dilitabmas')}}">
              <span class="fa fa-genderless">&nbsp;</span>Non-Ditlitabmas
            </a></li>

          </ul>
        </li>

   <li class="header">LUARAN</li>

        <li class="treeview <?php if($menu['menu']=='Luaran') echo "active"; ?>">
         <a href="{{url('/')}}">
          <i class="fa fa-retweet"></i> <span>Luaran Penelitian</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">

          <li><a class="" href="{{url('tampil_pen_luaran_buku')}}">
            <span class="fa fa-genderless">&nbsp;</span>Buku Ajar
          </a></li>
          <li><a class="" href="{{url('tampil_pen_luaran_jurnal')}}">
            <span class="fa fa-genderless">&nbsp;</span>Jurnal
          </a></li>
           <li><a class="" href="{{url('tampil_pen_luaran_hki')}}">
            <span class="fa fa-genderless">&nbsp;</span>HKI
          </a></li>

 <li><a class="" href="{{url('tampil_pen_luaran_pemakalah')}}">
            <span class="fa fa-genderless">&nbsp;</span>Pemakalah
          </a></li>

 <li><a class="" href="{{url('tampil_pen_luaran_lain')}}">
            <span class="fa fa-genderless">&nbsp;</span>Luaran Lain
          </a></li>


         
        </ul>
      </li>



       <li class="treeview <?php if($menu['menu']=='Luaran') echo "active"; ?>">
         <a href="{{url('/')}}">
          <i class="fa fa-exchange"></i> <span>Luaran Pengabdian</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
   <li><a class="" href="{{url('tampil_peng_luaran_buku')}}">
            <span class="fa fa-genderless">&nbsp;</span>Buku Ajar
          </a></li>
          <li><a class="" href="{{url('tampil_peng_luaran_jurnal')}}">
            <span class="fa fa-genderless">&nbsp;</span>Jurnal
          </a></li>
           <li><a class="" href="{{url('tampil_peng_luaran_hki')}}">
            <span class="fa fa-genderless">&nbsp;</span>HKI
          </a></li>

 <li><a class="" href="{{url('tampil_peng_luaran_pemakalah')}}">
            <span class="fa fa-genderless">&nbsp;</span>Pemakalah
          </a></li>

 <li><a class="" href="{{url('tampil_peng_luaran_lain')}}">
            <span class="fa fa-genderless">&nbsp;</span>Luaran Lain
          </a></li>

        </ul>
      </li>



     <!--  <li class="treeview <?php if($menu['menu']=='Kegiatan Penunjang') echo "active"; ?>">
        <a href="{{url('kegiatan_penunjang')}}"><i class="fa fa-book"></i><span> Kegiatan Penunjang</span></a>
      </li>
      @if(Session::get('userRole')=='Admin')
      <li class="treeview <?php if($menu['menu']=='User') echo "active"; ?>">
        <a href="{{url('user')}}"><i class="fa fa-user"></i><span> Manajemen User</span></a>
      </li> -->

         <!--    <li class="treeview <?php if($menu['menu']=='Dosen') echo "active"; ?>">
              <a href="{{url('dosen')}}"><i class="fa fa-user"></i> List Dosen</a>
            </li> -->

            @endif
            <li class="header">DOKUMEN</li>
            <li class="treeview {{{ ($menu['menu']=='Dokumen')?'active':''}}}">
              <a href="{{{ url('/') }}}/dokumen/user_manual_1.0.pdf" target="_blank">
                <i class="fa fa-info-circle"></i> <span> Panduan Pengguna</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <!-- <h1>Selamat Datang, <small>Aplikasi Repositori Kinerja Dosen Universitas Negeri Malang</small></h1> -->
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">{{{ $menu['menu'] }}}</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

         <!-- {{var_dump(Session::all())}} -->
         @yield('content')



         
       </section><!-- /.content -->
     </div><!-- /.content-wrapper -->

     <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Litbang PTIK UM</b>
      </div>
      <strong>Copyright &copy; 2014-2015 <a href="http://um.ac.id">Universitas Negeri Malang</a>.</strong> All rights reserved.
    </footer>

    
  </div><!-- ./wrapper -->
  @if(App::environment()=='production')
  <!-- jQuery 2.1.4 -->
  <script src="{{secure_asset('style/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{secure_asset('style/bootstrap/js/bootstrap.min.js') }}"></script>
  <!-- bootstrap notify -->
  <script src="{{ secure_asset('style/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
  <!-- SlimScroll -->
  <script src="{{secure_asset('style/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
  <script src="{{secure_asset('style/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
  <script src="{{secure_asset('style/plugins/select2/select2.full.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{ secure_asset('style/plugins/fastclick/fastclick.min.js') }}"></script>
  <script src="{{ secure_asset('style/plugins/chartjs/Chart.min.js') }}"></script>
  <!-- easyautocomplete -->
  <script src="{{ secure_asset('style/plugins/easyautocomplete/jquery.easy-autocomplete.min.js') }}"></script>
  <!-- DataTable -->
  <script src="{{ secure_asset('style/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ secure_asset('style/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{secure_asset('style/dist/js/app.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{secure_asset('style/dist/js/demo.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @else
  <!-- jQuery 2.1.4 -->
  <script src="{{asset('style/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('style/bootstrap/js/bootstrap.min.js') }}"></script>
  <!-- SlimScroll -->
  <script src="{{asset('style/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
  <script src="{{asset('style/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
 {{--  <script src="{{asset('style/plugins/select2/select2.full.min.js')}}"></script> --}}
  <!-- FastClick -->
  <script src="{{ asset('style/plugins/fastclick/fastclick.min.js') }}"></script>
  <script src="{{ asset('style/plugins/chartjs/Chart.min.js') }}"></script>
  <!-- easyautocomplete -->
  <script src="{{ asset('style/plugins/easyautocomplete/jquery.easy-autocomplete.min.js') }}"></script>
  <!-- bootstrap notify -->
  <script src="{{ asset('style/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
  <!-- DataTable -->
  <script src="{{ asset('style/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('style/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('style/dist/js/app.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('style/dist/js/demo.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="{{ asset('style/dist/js/textareacounter.js') }}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @endif 

  <script type="text/javascript">
    
// cari data anggota
 function buildOptions(element_id) {
        return {
      url:function(pharse){
        @if(App::environment()=='production')
        return "{{secure_url('api/dosen')}}/"+pharse;
        @else
        return "{{url('api/dosen')}}/"+pharse;
        @endif
      },
      getValue:function(suggest){
          // $("#dsn_nip").val(suggest.dsn_nip);
          if (isNaN($("#"+element_id).val())) {
            return (suggest.dsn_gelar || '')+suggest.dsn_nm+(suggest.dsn_gelar2 || '');
          } else {
            return suggest.dsn_nip ;
          }
        },

        template:{
          type:"custom",
          method: function(value, item){
            item.dsn_gelar=(item.dsn_gelar!==null)?item.dsn_gelar:'';
            item.dsn_gelar2=(item.dsn_gelar2!==null)?item.dsn_gelar2:'';
            if (item.jurusan===null) {
              item.jurusan={jur_nm:""};
            }
            return "<strong>"+item.dsn_nip+"</strong> - <span>"+item.dsn_gelar+item.dsn_nm+item.dsn_gelar2+"</span> - <em>"+item.jurusan.jur_nm+"</em>";
          }
        },
        list:{
          showAnimation:{
            type:"fade",
            time:400,
            callback:function(){}
          },
          hideAnimation:{
            type:"slide",
            time:300,
            callback:function(){}
          },
          /*onSelectItemEvent:function(){
            $("#"+element_id+"_nip").val($("#"+element_id).getSelectedItemData().dsn_nip);
          }*/
        }
      };
      }

      $("#anggota_1").easyAutocomplete(buildOptions('anggota_1'));
      $("#anggota_2").easyAutocomplete(buildOptions('anggota_2'));
      $("#anggota_3").easyAutocomplete(buildOptions('anggota_3'));
      $("#anggota_4").easyAutocomplete(buildOptions('anggota_4'));
      $("#anggota_5").easyAutocomplete(buildOptions('anggota_5'));
// akhir cari data anggota
   



    $(document).ready(function(){
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
      });
      $("#data_repo").DataTable();


      @if(session("gagal"))
      $.notify('{{session("gagal")}}',{
        type:'danger',
        timer:1500,
        delay:500,
        placement:{
          from:'top',
          align:'center'
        },
      });
      @elseif(session("berhasil"))
      $.notify('{{session("berhasil")}}',{
        type:'success',
        timer:1500,
        delay:500,
        placement:{
          from:'top',
          align:'center'
        },
      });
      @endif
    });

    @if($menu['userfak'])

    var options={
      url:function(pharse){

        @if(App::environment()=='production')
        return "{{secure_url('api/dosen')}}/"+pharse;
        @else
        return "{{url('api/dosen')}}/"+pharse;
        @endif
      },
      getValue:function(suggest){
          // $("#dsn_nip").val(suggest.dsn_nip);
          if (isNaN($("#cari_dosen").val())) {
            return suggest.dsn_nm ;
          } else {
            return suggest.dsn_nip ;
          }


        },

        template:{
          type:"custom",
          method: function(value, item){

            item.dsn_gelar=(item.dsn_gelar!==null)?item.dsn_gelar:'';
            item.dsn_gelar2=(item.dsn_gelar2!==null)?item.dsn_gelar2:'';
            if (item.jurusan===null) {
              item.jurusan={jur_nm:""};
            }
            return "<strong>"+item.dsn_nip+"</strong> - <span>"+item.dsn_gelar+item.dsn_nm+item.dsn_gelar2+"</span> - <em>"+item.jurusan.jur_nm+"</em>";
          }
        },
        list:{
          showAnimation:{
            type:"fade",
            time:400,
            callback:function(){}
          },
          hideAnimation:{
            type:"slide",
            time:300,
            callback:function(){}
          },
          onSelectItemEvent:function(){
            $("#dsn_nip").val($("#cari_dosen").getSelectedItemData().dsn_nip);
          }
        }
      };

      $("#cari_dosen").easyAutocomplete(options);
      @endif

      @if($menu['menu']=='User')
      var options={
        url:function(pharse){

          @if(App::environment()=='production')
          return "{{secure_url('api/pegawai')}}/"+pharse;
          @else
          return "{{url('api/pegawai')}}/"+pharse;
          @endif
        },
        getValue:function(suggest){
          // $("#dsn_nip").val(suggest.dsn_nip);
         // if (isNaN($("#cari_dosen").val())) {
         //  return suggest.dsn_nm ;
         // } else {
         //  return suggest.dsn_nip ;
         // }
         return suggest.nip;

       },

       template:{
        type:"custom",
        method: function(value, item){
          item.gelar_depan=(item.gelar_depan!==null)?item.gelar_depan:'';
          item.gelar_belakang=(item.gelar_belakang!==null)?item.gelar_belakang:'';

          return "<strong>"+item.nip+"</strong> - <span>"+item.gelar_depan+item.nama_pegawai+item.gelar_belakang+"</span>";
        }
      },
      list:{
        showAnimation:{
          type:"fade",
          time:400,
          callback:function(){}
        },
        hideAnimation:{
          type:"slide",
          time:300,
          callback:function(){}
        }
      }
    };

    $("#user_id").easyAutocomplete(options);


    $("#user_status").change(function(){
      var user_id=$(this).val();
      window.location="{{url('user/status/')}}/"+user_id;
    });
    @endif 




  //   @if($menu['menu']=='Pendidikan')

  //   $("#dari_siakad").click(function(e){
  //     e.preventDefault();
  //     var thaka=$("#pilih_thaka").val();
  //     var url="{{url('/akademik/import')}}/"+thaka;

  //     $.getJSON(url).success(function(response_data){  
  //       $.post("{{url('/akademik/save_import')}}",
  //         { data:response_data, thaka:thaka})
  //       .done(function(msg){
  //         var pesan="Tidak berhasil menambahkan data pendidikan dari SIAKAD";
  //         var type="danger";
  //         if(msg==='berhasil'){
  //           var pesan="Berhasil menambahkan data pendidikan dari SIAKAD";
  //           var type="success";
  //         }
  //         $.notify(pesan,{
  //           type:type,
  //           timer:5500,
  //           delay:5500,
  //           placement:{
  //             from:'top',
  //             align:'center'
  //           },
  //         });
  //         setTimeout(function(){
  //           console.log("Zzzzzz");
  //         },5500);
  //         window.location='{{url("/akademik")}}';
  //       });
  //     });
  //   });

  //   $("#pilih_thaka").change(function(){
  //     var thaka=$("#pilih_thaka").val();
  //     window.location='{{url("/akademik/import/")}}/'+thaka;
  //   });
  //   @endif


  // @if ($menu['menu']=='Penelitian')

  //   $("#dari_litabmas").click(function(e){
  //     e.preventDefault();
  //     var tahun=$("#tahun").val();
  //     var url="{{url('/penelitian/import')}}/"+tahun;

  //     $.getJSON(url).success(function(response_data){ 
  //       $.post("{{url('/penelitian/save_import')}}",
  //         { data:response_data, tahun:tahun})
  //       .done(function(msg){
  //         var pesan="Tidak berhasil menambahkan data pendidikan dari SIAKAD";
  //         var type="danger";
  //         if(msg==='berhasil'){
  //           var pesan="Berhasil menambahkan data pendidikan dari SIAKAD";
  //           var type="success";
  //         }
  //         $.notify(pesan,{
  //           type:type,
  //           timer:5500,
  //           delay:5500,
  //           placement:{
  //             from:'top',
  //             align:'center'
  //           },
  //         });
  //         setTimeout(function(){
  //           console.log("Zzzzzz");
  //         },5500);
  //         window.location='{{url("/penelitian")}}';
  //       });
  //     });
  //   });


  //   $("#tahun").change(function(){
  //     var tahun=$("#tahun").val();
  //     window.location='{{url("/penelitian/import/")}}/'+tahun;
  //   });
  //   @endif

  //   @if($menu['menu']=='Pengabdian')
  //   $("#dari_litabmas").click(function(e){
  //     e.preventDefault();
  //     var tahun=$("#tahun").val();
  //     var url="{{url('/pengabdian/import')}}/"+tahun;

  //     $.getJSON(url).success(function(response_data){ 
  //       $.post("{{url('/pengabdian/save_import')}}",
  //         { data:response_data, tahun:tahun})
  //       .done(function(msg){
  //                                   // console.log(msg);
  //                                   var pesan="Tidak berhasil menambahkan data pendidikan dari SIAKAD";
  //                                   var type="danger";
  //                                   if(msg==='berhasil'){
  //                                     var pesan="Berhasil menambahkan data pendidikan dari SIAKAD";
  //                                     var type="success";
  //                                   }
  //                                   $.notify(pesan,{
  //                                     type:type,
  //                                     timer:5500,
  //                                     delay:5500,
  //                                     placement:{
  //                                       from:'top',
  //                                       align:'center'
  //                                     },
  //                                   });
  //                                   setTimeout(function(){
  //                                     console.log("Zzzzzz");
  //                                   },5500);
  //                                   window.location='{{url("/pengabdian")}}';
  //                                 });
  //     });
  //   });


  //   $("#tahun").change(function(){
  //     var tahun=$("#tahun").val();
  //     window.location='{{url("/pengabdian/import/")}}/'+tahun;
  //   });
  //   @endif
  </script>

  <?php 
  if($menu['menu']=='Dashboard')
    {?>
      <script>

        var areaChartData = {
          labels: [@for($i=date("Y")-5; $i<=date("Y"); $i++)
          {{$i.","}}
          @endfor       ],
          datasets: [
          {
            label: "Penelitian Dilitabmas",
            fillColor: "rgba(210, 214, 222, 1)",
            strokeColor: "#00C0EF",
            pointColor: "#00C0EF",
            pointStrokeColor: "#c1c7d1",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [@foreach($menu['chart']['penelitian_dilitabmas'] as $penelitian_dilitabmas)
            {{$penelitian_dilitabmas[0]->count.", "}}
            @endforeach
            ]
          },
          {
            label: "Penelitian Non Dilitabmas",
            fillColor: "rgba(60,141,188,0.9)",
            strokeColor: "#00A65A",
            pointColor: "#00A65A",
            pointStrokeColor: "rgba(60,141,188,1)",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(60,141,188,1)",
            data: [@foreach($menu['chart']['penelitian_non_dilitabmas'] as $penelitian_non_dilitabmas)
            {{$penelitian_non_dilitabmas[0]->count.", "}}
            @endforeach
            ]
          },
          {
            label: "Pengabdian Dilitabmas",
            fillColor: "rgba(60,141,188,0.9)",
            strokeColor: "#DD4B39",
            pointColor: "#DD4B39",
            pointStrokeColor: "rgba(60,141,188,1)",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(60,141,188,1)",
            data: [@foreach($menu['chart']['pengabdian_dilitabmas'] as $pengabdian_dilitabmas)
            {{$pengabdian_dilitabmas[0]->count.", "}}
            @endforeach
            ]
          },
          {
            label: "Pengabdian Non Dilitabmas",
            fillColor: "rgba(60,141,188,0.9)",
            strokeColor: "#F39C12",
            pointColor: "#F39C12",
            pointStrokeColor: "rgba(60,141,188,1)",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(60,141,188,1)",
            data: [@foreach($menu['chart']['pengabdian_non_dilitabmas'] as $pengabdian_non_dilitabmas)
            {{$pengabdian_non_dilitabmas[0]->count.", "}}
            @endforeach
            ]
          }
          ]
        };

        var areaChartOptions = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: true,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
        };

        var ctx=$("#statistik").get(0).getContext("2d");
        var statistikChart=new Chart(ctx);
        var lineChartOptions = areaChartOptions;
        lineChartOptions.datasetFill = false;
        statistikChart.Line(areaChartData, lineChartOptions);
      </script>
    <?php } ?>


    <script>
      $(function () {
      
        $('#waktu_mulai').datepicker();
        $('#waktu_selesai').datepicker();
      });

// select2 cari list
    $(document).ready(function() {
      $('.select2').select2();
      minimumInputLength: 2
      maximumResultsForSearch: 5
      minimumResultsForSearch: 3
    });

 $("textarea[name='deskripsi']").textareaCounter({ limit: 100 });

  </script>
    
  </body>
  </html>
