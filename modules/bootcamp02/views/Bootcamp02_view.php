<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan Nicola</title>

    <link href="<?= base_url() ?>modules/bootcamp02/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp02/css/jquery-ui.css" />
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp02/css/ui.jqgrid.css" />
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .username {
            margin-right: auto;
        }

        .add-button {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <h3 style="text-align: center;">DATA KARYAWAN ECENTRIX</h3>
    <div class="container">
        <div class="username">
            <?php echo "Username : " . $user; ?>
        </div>
        <a href="<?= base_url() ?>bootcamp02/add?id=<?= $user ?>" class="btn btn-primary add-button"> + Tambah Data</a>
    </div>

    <table id="userKaryawan"></table>
    <div id="userKaryawanPager"></div>
    <script type="text/javascript">
        var USER_ID = '<?= $user ?>';
        var BASE_URL = '<?= base_url('bootcamp02') ?>';
    </script>

    <script src='<?= base_url() ?>modules/bootcamp02/js/jquery-2.0.3.min.js'></script>
    <script src="<?= base_url() ?>modules/bootcamp02/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>modules/bootcamp02/js/jquery-ui.js"></script>
    <script src="<?= base_url(); ?>modules/bootcamp02/js/jqGrid/jquery.jqGrid.js"></script>
    <script src="<?= base_url(); ?>modules/bootcamp02/js/jqGrid/i18n/grid.locale-en.js"></script>
    <script src="<?php echo base_url(); ?>modules/bootcamp02/js/Bootcamp02.js?v=<?= rand(0, 20); ?>"></script>
</body>

</html>