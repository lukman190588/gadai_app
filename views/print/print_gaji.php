<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<center><h3 style="margin-bottom: 2px;">DATA SLIP GAJI <?=strtoupper($karyawan['nama_karyawan'])?></h3><h4 style="margin-top: 2px;"><?=tgl_ina(date('Y-m-d'))?></h4></center>
	<hr><br>
	<table style="width:100%" border="1">
		<tr>
			<th>No</th>
			<th>Nama Gaji</th>
			<th>Nominal Diterima</th>
			<th>Tanggal Diterima</th>
		</tr>
		<?php foreach ($gaji as $key => $value): ?>
			<tr>
				<th><?=$key+1?></th>
				<th><?=strtoupper($value['nama_gaji'])?></th>
				<th>Rp <?=rupiah($value['gaji_diterima'])?></th>
				<th><?=tgl_ina(substr($value['waktu_gajian_diterima'], 0, 10))?></th>
			</tr>
		<?php endforeach ?>
	</table>
</body>
</html>