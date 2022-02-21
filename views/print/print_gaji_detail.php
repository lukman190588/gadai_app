<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<center><h2 style="margin-bottom: 2px;">DETAIL SLIP GAJI <?=strtoupper($karyawan['nama_karyawan'])?></h2><h3 style="margin-top: 2px;"><?=tgl_ina(date('Y-m-d'))?></h3></center>
	<hr><br>
	<center style="font-size: 20px;">
		<table style="width:70%; margin-right: auto; margin-left: auto">
			<tr>
				<td><strong>Nama Karyawan</strong></td>
				<td><?=$gaji['nama_gaji']?></td>
			</tr>
			<tr>
				<td><strong>Pekerjaan</strong></td>
				<td><?=$pekerjaan['nama_pekerjaan']?><br></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><strong>Salary</strong></td>
				<td>Rp <?=rupiah($gaji['gaji_seharusnya'])?></td>
			</tr>
			<tr>
				<td><strong>Potongan</strong></td>
				<td>Rp <?=rupiah($potongan)?></td>
			</tr>
			<tr>
				<td></td>
				<td><hr></td>
			</tr>
			<tr>
				<td><strong>Total Diterima</strong></td>
				<td>Rp <?=rupiah($gaji['gaji_diterima'])?></td>
			</tr>
		</table>
	</center>
		
</body>
</html>