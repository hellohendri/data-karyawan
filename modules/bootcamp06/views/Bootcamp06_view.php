<html>
<head>
<title>Bootcamp06</title>
<link href="<?=base_url()?>modules/bootcamp06/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp06/css/jquery-ui.css" />
<link rel="stylesheet" href="<?=base_url()?>modules/bootcamp06/css/ui.jqgrid.css" />
</head>
<body>

<?php
echo "username : ".$user;
?>
<br>
<div class="text-center">
	<button type="button" class="btn btn-primary btn-lg">Add Data</button>
</div>
<br>
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
</body>
