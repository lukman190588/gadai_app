<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<center><h3 style="margin-bottom: 2px;">DATA KARYAWAN</h3><h4 style="margin-top: 2px;"><?=tgl_ina(date('Y-m-d'))?></h4></center>
	<hr><br>
	<table style="width:100%" border="1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Pekerjaan</th>
		</tr>
		<?php foreach ($karyawan as $key => $value): ?>
			<tr>
				<th><?=$key+1?></th>
				<th><?=strtoupper($value['nama_karyawan'])?></th>
				<th><?=strtoupper($value['nama_pekerjaan'])?></th>
			</tr>
		<?php endforeach ?>
	</table>
</body>
</html>