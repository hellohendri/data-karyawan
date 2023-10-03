<html>
<head>
<title>Bootcamp07</title>
<link href="<?=base_url()?>modules/bootcamp07/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp07/css/jquery-ui.css" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp07/css/ui.jqgrid.css" /> 
<style>
	#addbtn {
		margin: 1em;
		border-radius: 10px;
	}
	.modal {
	  display: none; 
	  position: fixed;
	  z-index: 1; 
	  padding-top: 100px; 
	  left: 0;
	  top: 0;
	  width: 100%; 
	  height: 100%; 
	  overflow: auto; 
	}
	.modal-content {
	  background-color: #fefefe;
	  margin: auto;
	  padding: 20px;
	  border: 1px solid #888;
	  width: 70%;
	}
	.close {
	  color: #aaaaaa;
	  float: right;
	  font-size: 28px;
	  font-weight: bold;
	}
	.close:hover,
	.close:focus {
	  color: #000;
	  text-decoration: none;
	  cursor: pointer;
	}
</style>
</head>
<body>
<?php
echo "username : ".$user;
?>
<br>
<div class="add">
<button class="btn btn-primary" id="addbtn">Tambah Data Karyawan</button>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <form id="form-input" action="<?php echo site_url('Bootcamp07/addData') ?>" method="post" enctype="multipart/form-data">
	<div class="form-group"> 
		<label for="nik">NIK:</label>
        <input type="text" id="nik" name="nik" class="form-control" placeholder="Masukkan NIK" required>
      </div>
      

      <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama" required>
      </div>
      
      <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" required>
      </div>
      
      <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
      </div>
      
      <div class="form-group">
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
      </div>
      
      <div class="form-group">
        <label for="telp">Telepon:</label>
        <input type="text" id="telp" name="telp" class="form-control" placeholder="Masukkan Nomor Telepon" required>
      </div>
	<div class="form-group">
		<label for="jabatan">Jabatan:</label>
		<select id="jabatan" name="jabatan" class="form-control" placeholder="Pilih Jabatan" required>
        <?php foreach ($jabatan_options as $option): ?>
            <option value="<?php echo $option['jabatan']; ?>"><?php echo $option['jabatan']; ?></option>
        <?php endforeach; ?>
		</select>
	</div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<table id="userKaryawan"></table>
<div id="userKaryawanPager"></div>
<script type="text/javascript">
	var USER_ID='<?=$user?>';
</script>
<script>
var modal = document.getElementById("myModal");
var btn = document.getElementById("addbtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script src='<?=base_url()?>modules/bootcamp07/js/jquery-2.0.3.min.js'></script>
<script src="<?=base_url()?>modules/bootcamp07/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>modules/bootcamp07/js/jquery-ui.js"></script>
<script src="<?=base_url();?>modules/bootcamp07/js/jqGrid/jquery.jqGrid.js"></script>
<script src="<?=base_url();?>modules/bootcamp07/js/jqGrid/i18n/grid.locale-en.js"></script>
<script src="<?php echo base_url();?>modules/bootcamp07/js/bootcamp07.js?v=<?=rand(0,20);?>"></script>
<script>
    $(document).ready(function() {
      var grid_selector = $("#userKaryawan");
	  var rowId = $(this).data("nik");
      grid_selector.on("click", ".edit-button", function () {
        var rowId = $(this).data("nik");
        if (confirm("Are you sure you want to edit this item?")) {
          console.log("Edit button clicked for row with ID: " + editUrl);
        }
      });
      grid_selector.on("click", ".delete-button", function () {
		var deleteUrl = "<?php echo site_url('Bootcamp07/deleteData') ?>";
        var data = {
			nik: $(this).data("nik"),
		};
        $.ajax({
			url: deleteUrl,
			type: "post",
			data: data,
			success: function (data) {
				var message = data.message;
				alert(message);
			},
		error: function (xhr, ajaxOptions, thrownError) {
			alert(thrownError);
		},
		});
	}); 
	});
</script>

</body>
