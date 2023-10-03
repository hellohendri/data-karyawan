<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>
</head>
<body>
	<center>
		<h1>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</h1>
		<h3>Edit Data</h3>
	</center>
	<?php foreach($karyawan as $k){ ?>
	<form action="<?php echo site_url('Bootcamp07/update') ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>Nama</td>
				<td>
					<input type="hidden" name="nik" value="<?php echo $k->nik ?>">
					<input type="text" name="nama" value="<?php echo $k->nama ?>">
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $k->alamat ?>"></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td><input type="text" name="telp" value="<?php echo $k->telp ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>
</body>
</html>
