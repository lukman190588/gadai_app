<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<center><h3 style="margin-bottom: 2px;">DATA DISPENSASI <?=strtoupper($karyawan['nama_karyawan'])?></h3><h4 style="margin-top: 2px;"><?=tgl_ina(date('Y-m-d'))?></h4></center>
	<hr><br>
	<table style="width:100%" border="1">
		<tr>
			<th>No</th>
			<th>Tanggal Mulai</th>
			<th>Tanggal Selesai</th>
			<th>Jenis Dispensasi</th>
			<th>Status</th>
		</tr>
		<?php foreach ($dispensasi as $key => $value): ?>
			<tr>
				<th><?=$key+1?></th>
				<th><?=tgl_ina(substr($value['tgl_mulai'], 0, 10))?></th>
				<th><?=tgl_ina(substr($value['tgl_selesai'], 0, 10))?></th>
				<th><?=$value['jenis_dispensasi']?></th>
				<th><?=strtoupper($value['status_dispensasi'])?></th>
			</tr>
		<?php endforeach ?>
	</table>
</body>
</html>