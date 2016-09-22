{{$menu['ketdosen']}}
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Repository Kinerja | Universitas Negeri Malang</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      @if(App::environment()=='production')
    <link rel="stylesheet" href="{{secure_asset('style/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{secure_asset('style/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{secure_asset('style/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{secure_asset('style/plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{secure_asset('style/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{secure_asset('style/plugins/easyautocomplete/easy-autocomplete.css') }}">
    <!-- <link rel="stylesheet" href="{{secure_asset('style/plugins/easyautocomplete/easy-autocomplete.themes.css') }}"> -->
      @else
              <link rel="stylesheet" href="{{asset('style/bootstrap/css/bootstrap.min.css') }}">
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
              <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
              <link rel="stylesheet" href="{{asset('style/dist/css/AdminLTE.min.css') }}">
              <link rel="stylesheet" href="{{asset('style/dist/css/skins/_all-skins.min.css') }}">
              <link rel="stylesheet" href="{{asset('style/plugins/datepicker/datepicker3.css') }}">
              <link rel="stylesheet" href="{{asset('style/plugins/select2/select2.min.css') }}">
              <link rel="stylesheet" href="{{asset('style/plugins/easyautocomplete/easy-autocomplete.css') }}">
              <!-- <link rel="stylesheet" href="{{asset('style/plugins/easyautocomplete/easy-autocomplete.themes.css') }}"> -->
      @endif
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->

    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{{url('/')}}" class="logo">
        <strong>Repositori Kinerja</strong>
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <!-- <span class="logo-mini"><img src="{{asset('style/img/logo-small.png') }}" alt="" /></span> -->
          <!-- logo for regular state and mobile devices -->
          <!-- <span class="logo-lg"><img src="{{asset('style/img/logo.png') }}" alt="" /></span> -->
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
         <div class="container">
    <div class="navbar-header">
       <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </a>
    
    </div>
    <div class="navbar-collapse collapse" id="searchbar">
     
     <ul class="nav navbar-nav navbar-right" style="margin-right:40px">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu" style="text-align:right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs">{{{ $menu['userId'] }}} [Hak Akses: {{{ $menu['hakAkses'] }}}]</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="{{url('servicelogout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
     
     
     @if($menu['userfak'])
      @if($menu['ketdosen'])
          <ul class="nav navbar-nav" style="margin:auto">
            <li style="padding:15px;"><span style="color:yellow">Anda Sedang mengakses Dosen : {{$menu['ketdosen']}}</span></li>
            <li><a href='{{url("/pilih_dosen/remove")}}' style="padding-top:16px;"><i class="fa fa-close"></i> Ganti Dosen</a></li>
          </ul>
      @else
                @if(App::environment()=='production')
                <form class="navbar-form" action="{{secure_url('/pilih_dosen/create')}}" method="post">
            @else
                <form class="navbar-form" action="{{url('/pilih_dosen/create')}}" method="post">
                @endif
         {{csrf_field()}}
            <div class="form-group" style="display:flex;">
              <div class="input-group" style="display:table;">
                <input class="form-control" name="cari_dosen" placeholder="Cari NIP Dosen..." autofocus="autofocus" type="text" id="cari_dosen" style="width:100%">
                <span class="input-group-btn" style="width:1%">
                           <button type='submit' class='btn btn-success'><i class="fa fa-university"></i> Pilih Dosen</button>
                          </span>
              </div>
            </div>
        </form>
      @endif
     
    @endif
    </div><!--/.nav-collapse -->
  </div>
          
        </nav>
      </header>

      <!-- =============================================== -->

      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left info">
              &nbsp;
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li class='treeview <?php if($menu["menu"]=="Dashboard") echo "active"; ?>  '>
              <a href="{{url('/')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <!--<i class="fa fa-angle-left pull-right"></i>-->
              </a>
              <!--<ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Riwayat</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Pengajuan</a></li>
              </ul>-->
            </li>
            <li class="treeview <?php if($menu['menu']=='Pendidikan') echo "active"; ?>  ">
                  <a href="{{url('akademik')}}"><i class="fa fa-graduation-cap"></i> Pendidikan</a>
            </li>
            <li class="treeview <?php if($menu['menu']=='Penelitian') echo "active"; ?>">
                  <a href="{{url('penelitian')}}"><i class="fa fa-line-chart"></i> Penelitian</a>
            </li>
            <li class="treeview <?php if($menu['menu']=='Pengabdian') echo "active" ?>">
              <a href="{{url('pengabdian')}}"><i class="fa fa-users"></i> Pengabdian</a>
            </li>
            <li class="treeview <?php if($menu['menu']=='Kegiatan Penunjang') echo "active"; ?>">
              <a href="{{url('kegiatan_penunjang')}}"><i class="fa fa-book"></i> Kegiatan Penunjang</a>
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
    <!-- SlimScroll -->
    <script src="{{secure_asset('style/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{secure_asset('style/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{secure_asset('style/plugins/select2/select2.full.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ secure_asset('style/plugins/fastclick/fastclick.min.js') }}"></script>
    <script src="{{ secure_asset('style/plugins/chartjs/Chart.min.js') }}"></script>
    <!-- easyautocomplete -->
    <script src="{{ secure_asset('style/plugins/easyautocomplete/jquery.easy-autocomplete.min.js') }}"></script>
    <!-- bootstrap notify -->
    <script src="{{ secure_asset('style/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{secure_asset('style/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{secure_asset('style/dist/js/demo.js')}}"></script>
    @else
            <!-- jQuery 2.1.4 -->
    <script src="{{asset('style/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('style/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{asset('style/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{asset('style/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('style/plugins/select2/select2.full.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('style/plugins/fastclick/fastclick.min.js') }}"></script>
    <script src="{{ asset('style/plugins/chartjs/Chart.min.js') }}"></script>
    <!-- easyautocomplete -->
    <script src="{{ asset('style/plugins/easyautocomplete/jquery.easy-autocomplete.min.js') }}"></script>
    <!-- bootstrap notify -->
    <script src="{{ asset('style/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('style/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('style/dist/js/demo.js')}}"></script>
        @endif
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
          label: "Akademik",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "#00C0EF",
          pointColor: "#00C0EF",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [@foreach($menu['chart']['akademik'] as $akademik)
                    {{$akademik[0]->count.", "}}
                  @endforeach
          ]
        },
        {
          label: "Penelitian",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "#00A65A",
          pointColor: "#00A65A",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [@foreach($menu['chart']['penelitian'] as $penelitian)
                    {{$penelitian[0]->count.", "}}
                  @endforeach
          ]
        },
        {
          label: "Pengabdian Masyarakat",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "#DD4B39",
          pointColor: "#DD4B39",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [@foreach($menu['chart']['pengabdian'] as $pengabdian)
                    {{$pengabdian[0]->count.", "}}
                  @endforeach
          ]
        },
        {
          label: "Kegiatan Penunjang",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "#F39C12",
          pointColor: "#F39C12",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [@foreach($menu['chart']['kegiatan_penunjang'] as $kegiatan_penunjang)
                    {{$kegiatan_penunjang[0]->count.", "}}
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
        $(".select2").select2();
        $('#waktu_pelaksanaan').datepicker();
      });
    </script>

    @if($menu['userfak'])
    <script>

      var options={
        url:function(pharse){
            @if(App::environment()=='production')
                return "{{secure_url('api/dosen')}}/"+pharse;
            @else
                    return "{{url('api/dosen')}}/"+pharse;
            @endif
        },
        getValue:"dsn_nip",

        template:{
          type:"custom",
          method: function(value, item){
                    item.dsn_gelar=(item.dsn_gelar!==null)?item.dsn_gelar:'';
                    item.dsn_gelar2=(item.dsn_gelar2!==null)?item.dsn_gelar2:'';

                    return "<strong>"+value+"</strong> - <span>"+item.dsn_gelar+item.dsn_nm+item.dsn_gelar2+"</span> - <em>"+item.jurusan.jur_nm+"</em>";
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

      $("#cari_dosen").easyAutocomplete(options);
    </script>
    @endif

    @if(session("gagal"))
    <script>
    $(document).ready(function(){
        $.notify({
          message: '{{session("gagal")}}'
        },{
          type:'danger',
          animate: {
            enter: 'animated fadeInRight',
            exit: 'animated fadeOutRight'
          }
        });
    });
      
    </script>
    @elseif(session("berhasil"))
    <script>
    $(document).ready(function(){
      $.notify({
        message: '{{session("berhasil")}}'
      },{
        type:'success',
        animate: {
            enter: 'animated fadeInRight',
            exit: 'animated fadeOutRight'
        }
      });
    });
      
    </script>
    @endif
  </body>
</html>
