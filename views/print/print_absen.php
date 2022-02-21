<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<center><h3 style="margin-bottom: 2px;">DATA ABSENSI <?=strtoupper($karyawan['nama_karyawan'])?></h3><h4 style="margin-top: 2px;"><?=tgl_ina(date('Y-m-d'))?></h4></center>
	<hr><br>
	<table style="width:100%" border="1">
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Jam Masuk</th>
			<th>Status</th>
		</tr>
		<?php foreach ($absen as $key => $value): ?>
			<tr>
				<th><?=$key+1?></th>
				<th><?=tgl_ina(substr($value['waktu_absen'], 0, 10))?></th>
				<th><?=substr($value['waktu_absen'], 11)?></th>
				<th><?=$value['status_absen']?></th>
			</tr>
		<?php endforeach ?>
	</table>
</body>
</html>