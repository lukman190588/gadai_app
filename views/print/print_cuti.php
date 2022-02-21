<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<center><h3 style="margin-bottom: 2px;">DATA CUTI <?=strtoupper($karyawan['nama_karyawan'])?></h3><h4 style="margin-top: 2px;"><?=tgl_ina(date('Y-m-d'))?></h4></center>
	<hr><br>
	<table style="width:100%" border="1">
		<tr>
			<th>No</th>
			<th>Tanggal Cuti Mulai</th>
			<th>Tanggal Cuti Selesai</th>
			<th>Alasan</th>
			<th>Status</th>
		</tr>
		<?php foreach ($cuti as $key => $value): ?>
			<tr>
				<th><?=$key+1?></th>
				<th><?=tgl_ina(substr($value['tgl_cuti_mulai'], 0, 10))?></th>
				<th><?=tgl_ina(substr($value['tgl_cuti_selesai'], 0, 10))?></th>
				<th><?=$value['alasan_cuti']?></th>
				<th><?=strtoupper($value['status_cuti'])?></th>
			</tr>
		<?php endforeach ?>
	</table>
</body>
</html>