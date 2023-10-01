<html>
<head>
<title>Bootcamp06</title>
<link href="<?=base_url()?>modules/bootcamp06/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp06/css/jquery-ui.css" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp06/css/ui.jqgrid.css" />
<!-- <style>
	.container {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		text-align: center;
	}
	.popup {
		background: #000;	
		color: #fff;
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		display: flex;
		justify-content: center;
		align-items: center;
		text-align: center;
	}
	.popup-content {
		height: 250px;
		width: 500px;
		background: #fff;
		padding: 20px;
		border-radius: 5px;
		position: relative;
	}
	input {
		margin: 20px auto;
		display: block;
		width: 50%;
		padding: 8px;
		border: 1px solid black;

	}
</style> -->
</head>

<body>
<?php
echo "username : ".$user;	
?>

<br>

<div class="container">
	<center>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Data</button>
    </center>
	<br>

    <div id="myModal" class="modal fade" role="dialog">
	<form action="<?php echo site_url(). '/bootcamp06/tambah_data'; ?>" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h4 class="modal-title">Add data</h4>
                </div>
                <div class="modal-body">
                    <label><b>NIK</b></label><br>
                    <input type="text" class="form-control" placeholder="Masukkan NIK" name="nik" required><br>
                    <label><b>Nama</b></label><br>
                    <input type="text" class="form-control" placeholder="Masukkan nama" name="nama" required><br>
                    <label><b>Tempat Lahir</b></label><br>
                    <input type="text" class="form-control" placeholder="Masukkan tempat lahir" name="tempat_lahir" required><br>
                    <label><b>Tanggal Lahir</b></label><br>
                    <input type="date" class="form-control" placeholder="Masukkan tanggal lahir" name="tanggal_lahir" required><br>
					<label><b>Umur</b></label><br>
                    <input type="text" class="form-control" placeholder="Masukkan umur" name="umur" required><br>
                    <label><b>Alamat</b></label><br>
                    <input type="text" class="form-control" placeholder="Masukkan alamat" name="alamat" required><br>
                    <label><b>Telp</b></label><br>
                    <input type="text" class="form-control" placeholder="Masukkan nomor telepon" name="telp" class="form-control" required><br>
					<label><b>Jabatan</b></label><br>
                    <select id="jabatan" name="jabatan" class="form-control" placeholder="Pilih Jabatan" required>
                        <option value="Option 1">Manager</option>
                        <option value="Option 2">Staff</option>
                        <option value="Option 3">Supervisor</option>
                    </select> <br>
					<label><b>Created By</b></label><br>
                    <input type="text" class="form-control" placeholder="Masukkan nama karyawan" name="created_by" class="form-control" required><br>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-primary">Save</button>
				   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
	</form>
	</div>
</div>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>



<!-- 
<div class="popup" id="form-editdata">
	<div class="popup-content">
		<input type="text" placeholder="Username">
		<input type="text" placeholder="Password">
		<a href="#" class="button">Save</a>
		<a href="#" class="button close">Close</a>
	</div>
</div>
<script>
	document.getElementById(".buttonadd").addEventListener("click", function() {
		document.querySelector(".popup").style.display = "flex";
	})

	document.querySelector(".close").addEventListener("click", function(){
		document.querySelector(".popup").style.display = "none";
	})
</script> -->

<table id="userKaryawan"></table>
<div id="userKaryawanPager"></div>
<script type="text/javascript">
	var USER_ID='<?=$user?>';
</script>
<script src='<?=base_url()?>modules/bootcamp06/js/jquery-2.0.3.min.js'></script>
<script src="<?=base_url()?>modules/bootcamp06/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>modules/bootcamp06/js/jquery-ui.js"></script>
<script src="<?=base_url();?>modules/bootcamp06/js/jqGrid/jquery.jqGrid.js"></script>
<script src="<?=base_url();?>modules/bootcamp06/js/jqGrid/i18n/grid.locale-en.js"></script>
<script src="<?php echo base_url();?>modules/bootcamp06/js/bootcamp06.js?v=<?=rand(0,20);?>"></script>

</body>
