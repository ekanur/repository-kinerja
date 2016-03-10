<!DOCTYPE html>
<style type="text/css"> 
#gb{ position:fixed; top:1px; z-index:+1000; } * html 
#gb{position:relative;} 
.gbcontent{ float:left;margin-left:800px; 
	border-radius: 30px; -moz-border-radius: 30px; -webkit-border-radius: 30px;
	border:0px solid #000000; padding:5px;
	} 

</style>
<script type="text/javascript"> 
	function showHideGB(){ 
		var gb = document.getElementById("gb"); 
		var w = gb.offsetWidth; gb.opened ? moveGB(0, 30-w) : moveGB(20-w, 0); gb.opened = !gb.opened; 
		} 
	function moveGB(x0, xf){ 
		var gb = document.getElementById("gb"); 
		var dx = Math.abs(x0-xf) > 10 ? 5 : 1; var dir = xf>x0 ? 1 : -1; var x = x0 + dx * dir; gb.style.top = x.toString() + "px"; if(x0!=xf){setTimeout("moveGB("+x+", "+xf+")", 10);} 
		} 
</script>
<div id="gb"> <div class="gbtab" onclick="showHideGB()"> </div> 
	<div class="gbcontent">
		<!--<div style="text-align:right"> <a href="javascript:showHideGB()"> .:[Tutup]:. </a> </div> -->
		<center>
			<a href="http://siakad.um.ac.id" target="_blank">
			<img src="https://cdn1.iconfinder.com/data/icons/smallicons-controls/32/614367-check-512.png" alt='Klaim Data' width=30 height=30> Klaim Data</a>
		</center>
		<script type="text/javascript"> 
			var gb = document.getElementById("gb"); gb.style.center = (30-gb.offsetWidth).toString() + "px"; 
		</script>
	</div>
</div>
<html>
<head>
    <title>Title</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/bootstrap.min.css') ?>" />

</head>
<body style="width:80%;margin:40px auto">
    <div class="units-container">
        <form id="frmsetting" action="javascript:">
           <table id="one-column-emphasis" class="table">
				     <tbody>
                       	<tr>
				        	<td width="200">No Sertifikat</td>
				            <td width="5">:</td>
				            <td width="400"><?php echo ($user->sertifikat_pendidik)?$user->sertifikat_pendidik:"-"?></td>
				        </tr>
				       	<tr>
				        	<td>NIP</td>
				            <td>:</td>
				            <td><?php echo ($user->nip)?$user->nip:"-"?></td>

				        </tr>
				        <tr>
				        	<td>NIDN</td>
                            <td>:</td>
                            <td><?php echo ($user->nidn)?$user->nidn:"-"?></td>
				        </tr>
				        <tr>
				        	<td>Nama</td>
				            <td>:</td>
				            <td><?php echo ($user->nama_pegawai)?$user->nama_pegawai:"-"?></td>
				        </tr>
				        <tr>
		      <td height="25">Tgl Lahir</td>
		      <td >:</td>
                      <td ><?php echo ($user->tgl_lahir)? \App\lib\Common::format_date_abb($user->tgl_lahir,'ina'):"-"?></td>
		   </tr>
		    </tbody>
				</table>

            </form>

    </div>
</body>
</html>