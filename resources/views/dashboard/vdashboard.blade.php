@extends('layout.master',['menu'=>$menu])
@section('content')
    <!-- Main content -->
        <section class="content">
              <!-- Small boxes (Stat box) -->

          <div class="row">
           
         	<div class="col-md-3 col-sm-6 col-xs-12">
         		<div class="info-box">
         			<span class="info-box-icon bg-aqua">
	         			<i class="fa fa-line-chart"></i>
	         		</span>
	         		<div class="info-box-content">
	         			<span class="info-box-text">Penelitian Dilitabmas</span>
	         			<span class="info-box-number">{{$menu['data']['penelitian_dilitabmas']}}</span>
	         		</div>
         		</div>
         		
         	</div>
         	<div class="col-md-3 col-sm-6 col-xs-12">
         		<div class="info-box">
         			<span class="info-box-icon bg-green">
	         			<i class="fa fa-line-chart"></i>
	         		</span>
	         		<div class="info-box-content">
	         			<span class="info-box-text">Penelitian Non Dilitabmas</span>
	         			<span class="info-box-number">{{$menu['data']['penelitian_non_dilitabmas']}}</span>
	         		</div>
         		</div>
         		
         	</div>
         	<div class="col-md-3 col-sm-6 col-xs-12">
         		<div class="info-box">
         			<span class="info-box-icon bg-red">
	         			<i class="fa fa-users"></i>
	         		</span>
	         		<div class="info-box-content">
	         			<span class="info-box-text">Pengabdian Dilitabmas</span>
	         			<span class="info-box-number">{{$menu['data']['pengabdian_dilitabmas']}}</span>
	         		</div>
         		</div>
         		
         	</div>
         	<div class="col-md-3 col-sm-6 col-xs-12">
         		<div class="info-box">
         			<span class="info-box-icon bg-yellow">
	         			<i class="fa fa-users"></i>
	         		</span>
	         		<div class="info-box-content">
	         			<span class="info-box-text">Pengabdian Non Dilitabmas</span>
	         			<span class="info-box-number">{{$menu['data']['pengabdian_non_dilitabmas']}}</span>
	         		</div>
         		</div>
         		
         	</div>
         <div class="col-md-12 col-sm-12 col-xs-12">
             <div class="box">
                 <div class="box-header"><h3>Statistik Implementasi Tri Dharma Perguruan Tinggi Dalam 5 Tahun Terakhir (

                   {{date("Y")-5}} - {{date("Y")}}
                 )</h3></div>
                 <div class="box-body">
                     <div class="chart"><canvas id="statistik" height="75"></canvas></div>

                 </div>
                 <div class="box-footer"></div>
             </div>
         </div>
          </div><!-- /.row -->
        </section>
        <!-- /.content -->
@endsection
