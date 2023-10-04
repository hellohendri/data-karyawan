<html>
<head>
<title>Bootcamp09</title>
<link href="<?=base_url()?>modules/bootcamp09/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp09/css/jquery-ui.css" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp09/css/ui.jqgrid.css" />
</head>
<body>

<?php
echo "username : ".$user;
?>
<a href="ajaxform/?id=<?=$user?>" style="position:relative;float:right;margin-right:20px;">ajax form</a>
<table id="userKaryawan"></table>
<?php print_r($user);?>
<div id="userKaryawanPager"></div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Karyawan</button>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#userModal">Tambah User</button>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="">Edit Data</button>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="">Hapus Data</button>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
	 <form id="tambah_Karyawan"  method="post" action="<?php echo form_open('bootcamp09/tambah_Karyawan'); ?>">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Karyawan</h4>
      </div>
      <div class="modal-body">
	  <div class="form-group">
		<label for="nik">NIK</label>
		<input type="text" class="form-control" id="nik" name="nik" aria-describedby="nik" placeholder="Masukkan NIK">
	</div>
	<div class="form-group">
		<label for="nama">Nama</label>
		<input type="text" class="form-control" id="nama" name="nama" aria-describedby="nama" placeholder="Masukkan Nama Lengkap">
	</div>
	<div class="form-group">
		<label for="tempat_lahir">Tempat Lahir</label>
		<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" aria-describedby="tempat_lahir" placeholder="Masukkan Tempat Lahir">
	</div>
	<div class="form-group">
		<label for="tanggal_lahir">Tanggal Lahir</label>
		<input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" aria-describedby="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
		<small id="tanggal_lahir" class="form-text text-muted">Contoh: 2023-09-02 / tahun-bulan-hari</small>
	</div>
	<div class="form-group">
		<label for="tanggal_lahir">Umur</label>
		<input type="text" class="form-control" id="umur" name="umur" aria-describedby="umur" placeholder="Masukkan Umur">
	</div>
	<div class="form-group">
		<label for="alamat">Alamat</label>
		<input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="alamat" placeholder="Masukkan Alamat">
	</div>
	<div class="form-group">
		<label for="telp">Telepon</label>
		<input type="text" class="form-control" id="telp" name="telp" aria-describedby="telp" placeholder="Masukkan Nomor Telepon">
		<small id="telepon" class="form-text text-muted">Contoh: 0813xxxxxxxx</small>
	</div>
    <div class="form-group">
      <label for="jabatan">Jabatan</label>
      <select id="jabatan" name="jabatan" class="form-control">
        <option selected>Staff</option>
		<option>Manager</option>
		<option>Supervisor</option>
      </select>
	  <small id="jabatan" class="form-text text-muted">Klik pada pilihan untuk memilih jabatan</small>
    </div>
	<div class="form-group">
		<label for="created_by">Created By</label>
		<input type="text" class="form-control" id="created_by" name="created_by" aria-describedby="created_by" placeholder="Masukkan Nama Pembuat">
		<small id="telepon" class="form-text text-muted">Nama pembuat samakan dengan nama user</small>
	</div>
	<div class="form-group">
		<label for="created_time">Created Time</label>
		<input type="text" class="form-control" id="created_time" name="created_time" aria-describedby="created_time" placeholder="Masukkan Jam Dibuat">
		<small id="telepon" class="form-text text-muted">Isi seperti contoh: 2023-09-26 10:22:14</small>
	</div>
    </div>
      <div class="modal-footer">
        <input type="submit" name="submit" id="submit" value="submit" class="btn btn-default" data-dismiss="modal">Tambah</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<div id="userModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah User</h4>
      </div>
      <div class="modal-body">
	  <div class="form-group">
		<label for="id">ID</label>
		<input type="text" class="form-control" id="id" name="id" aria-describedby="id" placeholder="Masukkan ID">
	</div>
	<div class="form-group">
		<label for="namaUser">Nama</label>
		<input type="text" class="form-control" id="namaUser" name="namaUser" aria-describedby="namaUser" placeholder="Masukkan Nama Lengkap">
	</div>
	<div class="modal-footer">
        <button type="submitUser" name="submitUser" id="submitUser" value="submitUser" class="btn btn-default" data-dismiss="modal">Tambah</button>
    </div>
	</div>
</div>
</div>

<script type="text/javascript">
	var USER_ID='<?=$user?>';
	var BASE_URL='<?=base_url()?>';
</script>
<script src='<?=base_url()?>modules/bootcamp09/js/jquery-2.0.3.min.js'></script>
<script src="<?=base_url()?>modules/bootcamp09/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>modules/bootcamp09/js/jquery-ui.js"></script>
<script src="<?=base_url();?>modules/bootcamp09/js/jqGrid/jquery.jqGrid.js"></script>
<script src="<?=base_url();?>modules/bootcamp09/js/jqGrid/i18n/grid.locale-en.js"></script>
<script src="<?php echo base_url();?>modules/bootcamp09/js/Bootcamp09.js?v=<?=rand(0,20);?>"></script>
</body>
</body>
