@extends('layout.master')
@section('content')

<html>
<head>
	<title>Tambah Product</title>
</head>
<body>

<form action="" method="post">
	<input type="hidden" name="_token" value="">
	NIP
    <input type="text" name="product_name" class="form-control" value="<?php echo ($user->nip) ? $user->nip : "-"?>">
	Nama
    <input type="text" name="product_price" class="form-control" value="<?php echo ($user->nama_pegawai) ? $user->nama_pegawai : "-"?>">
	Quantity
	<input type="text" name="product_qty" class="form-control">
	<br/>
	<input type="submit" value="Simpan Record" class="btn btn-primary">
</form>
</body>
</html>
@stop()
