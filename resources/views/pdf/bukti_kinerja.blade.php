<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DNA_[mt_kd]_kls-offr_[jw_kls]-[jw-offr]_[nip_dosen]</title>
	<style>
		table tr td{
			font-family: "tahoma";
		}
	</style>
</head>
<body>
	<table border="0px" style="position:fixed;border-collapse: collapse;font-family: tahoma;margin:auto;border-bottom: 1px solid black;left: 0px; top: 0px; right: 0px;" width="100%">
		<tr style="border-bottm:1px solid black">
			<td width="15%"><img src="{{ asset('logo_um.png') }}" alt="" width="90px" height="90px"></td>
			<td style="text-align: center;">
				<span style="font-size: 1.3em">KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</span><br/>
				<strong style="font-size: 1.35em">UNIVERSITAS NEGERI MALANG (UM)</strong><br/>
				<span style="font-size: 1.15em">Jalan Semarang 5, Malang 65145<br/>
				Telepon: 0341-551312<br/>
				Laman: www.um.ac.id</span>
			</td>
		</tr>
	</table>
	<table width="100%" style="position: relative;top:140px">
		<tr><td><h3 style="text-align:center;width:100%">Daftar Nilai Akhir</h3></td></tr>
		<tr><td>	<ul style="list-style: none;padding-left:0px">
		<li>Tahun Akademik: [fetch_thaka]</li>
		<li>Kode Mata Kuliah: [mt_kd]</li>
		<li>Nama Mata Kuliah: [mt_nm]</li>
		<li>Dosen: [loop dsn_nm.dsn_glr]</li>
		<li>SKS-JS: [sks-js]</li>
		<li>KLS-OFFR: [jw_kls-jw_offr]</li>
		<li>Hari: [loop jadwal]</li>
	</ul>
	<br><br>
	Waktu Kirim DNA: [date("Y-m-d")]</td></tr>
	</table>
	<table width="100%" border=1 style="border-collapse: collapse;position: relative;top:140px">
		<thead style="font-weight: bolder">
			<tr>
				<td width="2.5%">No.</td>
				<td width="20%">NIM</td>
				<td width="45%">Nama</td>
				<td>Nilai Angka</td>
				<td>Nilai Huruf</td>
			</tr>
		</thead>
		<tbody>
			@for($i=0; $i<=50; $i++)
			<tr>
				<td>{{$i}}</td>
				<td>140535604969</td>
				<td>A. EKO PRASTIYO</td>
				<td>2.7</td>	
				<td>B-</td>	
			</tr>
			@endfor
		</tbody>
	</table>
	<table width="100%" border=0 style="position: relative;top:200px">
		<tr>
			<td colspan="3"><small style="position:relative; top:250px">Waktu Simpan: [date("Y-m-d")]</small></td>
			<td colspan="2" style="text-align: right"><small><em>{{ url('/') }}</em></small></td>
		</tr>
	</table>
	

	
</body>
</html>