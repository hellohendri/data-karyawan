<html>
<head>
<title>Bootcamp07</title>
<link href="<?=base_url()?>modules/bootcamp07/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp07/css/jquery-ui.css" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp07/css/ui.jqgrid.css" /> 
<style>
	button {
	background-color: #2f7fb3;
	margin: 1em;
	border: none;
	color: #ffffff;
	border-radius: 10px;
	height: 40px;
	width: 180px;
	}
	button:hover {
	background-color: #0487e2;
	border-radius: 10px;
	height: 40px;
	width: 180px;
	}
</style>
</head>
<body>
<?php
echo "username : ".$user;
?>
<br>
<button>Tambah Data Karyawan</button>
<table id="userKaryawan"></table>
<div id="userKaryawanPager"></div>
<script type="text/javascript">
	var USER_ID='<?=$user?>';
</script>
<script src='<?=base_url()?>modules/bootcamp07/js/jquery-2.0.3.min.js'></script>
<script src="<?=base_url()?>modules/bootcamp07/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>modules/bootcamp07/js/jquery-ui.js"></script>
<script src="<?=base_url();?>modules/bootcamp07/js/jqGrid/jquery.jqGrid.js"></script>
<script src="<?=base_url();?>modules/bootcamp07/js/jqGrid/i18n/grid.locale-en.js"></script>
<script src="<?php echo base_url();?>modules/bootcamp07/js/bootcamp07.js?v=<?=rand(0,20);?>"></script>
</body>

		

