<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootcamp 03</title>
    <link href="<?= base_url() ?>modules/bootcamp03/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp03/css/jquery-ui.css" />
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp03/css/ui.jqgrid.css" />
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp03/css/style.css" />
</head>

<body>
    <div class="container">
        <h1>Data Karyawan</h1>

        <?php
        echo "<p>Username : " . $user . "</p>";
        ?>

        <div class="button-wrapper">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addKaryawanModal">Add</button>
            <button type="button" class="btn btn-warning" id="editKaryawan" >Edit</button>
            <input type="button" class="btn btn-danger" value="Delete" onclick="getSelectedRow()" />
        </div>

        <table id="userKaryawan"></table>
        <div id="userKaryawanPager"></div>

        <!-- Add Karyawan Bootstrap Modal -->
        <div class="modal fade" id="addKaryawanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="modalTitle">Tambah Karyawan</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Modal Content  -->
                    <form action="<?php echo base_url() ?>index.php/bootcamp03/addKaryawan/?id=<?php echo $user ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <?php echo form_error('nik'); ?>
                                <input type="number" class="form-control" id="nik" name="nik" placeholder="Nomor NIK"> <br>
                                <input type="button" id="nikcheck" class="btn btn-default" value="Check NIK">
                            </div>
                            <div class="form-group">
                                <label for="nik">Nama</label>
                                <?php echo form_error('nama'); ?>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="tempat-lahir">Tempat Lahir</label>
                                <?php echo form_error('tempat_lahir'); ?>
                                <input type="text" class="form-control" id="tempat-lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                            </div>
                            <div class="form-group">
                                <label for="tanggal-lahir">Tanggal Lahir</label>
                                <?php echo form_error('tanggal_lahir'); ?>
                                <input type="date" class="form-control" id="tanggal-lahir" name="tanggal_lahir" placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <?php echo form_error('alamat'); ?>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="telp">Telp</label>
                                <?php echo form_error('telp'); ?>
                                <input type="text" class="form-control" id="telp" name="telp" placeholder="No. Telepon">
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <?php echo form_error('jabatan'); ?>
                                <select class="form-control" id="jabatan" name="jabatan">
                                    <option>manager</option>
                                    <option>staff</option>
                                    <option>supervisor</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary btn-submit" name="submit" value="Submit"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Add Karyawan Bootstrap Modal -->

        <!-- Test Show Data Using Ajax -->

        <div id="#editKaryawan">

        </div>

        <!-- End of Test Show Data Using Ajax -->

        <!-- Edit Karyawan Bootstrap Modal -->
        <div class="modal fade" id="editKaryawanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="modalTitle">Edit Karyawan</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Modal Content  -->
                    <form action="<?php echo base_url() ?>index.php/bootcamp03/saveKaryawan/?id=<?php echo $user ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <?php echo form_error('nik'); ?>
                                <input type="number" class="form-control" id="nik" name="nik" placeholder="Nomor NIK"> <br>
                            </div>
                            <div class="form-group">
                                <label for="nik">Nama</label>
                                <?php echo form_error('nama'); ?>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="tempat-lahir">Tempat Lahir</label>
                                <?php echo form_error('tempat_lahir'); ?>
                                <input type="text" class="form-control" id="tempat-lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                            </div>
                            <div class="form-group">
                                <label for="tanggal-lahir">Tanggal Lahir</label>
                                <?php echo form_error('tanggal_lahir'); ?>
                                <input type="date" class="form-control" id="tanggal-lahir" name="tanggal_lahir" placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <?php echo form_error('alamat'); ?>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="telp">Telp</label>
                                <?php echo form_error('telp'); ?>
                                <input type="text" class="form-control" id="telp" name="telp" placeholder="No. Telepon">
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <?php echo form_error('jabatan'); ?>
                                <select class="form-control" id="jabatan" name="jabatan">
                                    <option>manager</option>
                                    <option>staff</option>
                                    <option>supervisor</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary btn-submit" name="submit" value="Submit"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Edit Karyawan Bootstrap Modal -->

        <!-- JQuery UI Edit Karyawan Dialog Form Modal -->
        <!-- <div id="dialog-form" title="Edit Data Karyawan">
            <p class="validateTips">All form fields are required.</p>

            <form>
                <fieldset class="edit-karyawan">
                    <label for="nik">Nik</label>
                    <input type="text" name="nik" id="nik" value="" class="text ui-widget-content ui-corner-all">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="text ui-widget-content ui-corner-all">
                    <label for="tempatLahir">Tempat Lahir</label>
                    <input type="text" name="tempatLahir" id="tempatLahir" class="text ui-widget-content ui-corner-all">

                    <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
                </fieldset>
            </form>

        </div> -->
        <!-- End of JQuery UI Edit Karyawan Dialog Form Modal -->

        <!-- Jquery UI Modal -->
        <div id="dialog-confirm" title="Are you sure?">
            <p class="modal-delete"><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
        </div>
        <!-- End of Jquery UI Modal -->

    </div>

    <script type="text/javascript">
        var USER_ID = '<?= $user ?>';
        var BASE_URL = '<?= base_url() ?>';
        var SITE_URL = '<?= site_url() ?>';
    </script>

    <script src='<?= base_url() ?>modules/bootcamp03/js/jquery-2.0.3.min.js'></script>
    <script src="<?= base_url() ?>modules/bootcamp03/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>modules/bootcamp03/js/jquery-ui.js"></script>
    <script src="<?= base_url(); ?>modules/bootcamp03/js/jqGrid/jquery.jqGrid.js"></script>
    <script src="<?= base_url(); ?>modules/bootcamp03/js/jqGrid/i18n/grid.locale-en.js"></script>
    <script src="<?php echo base_url(); ?>modules/bootcamp03/js/Bootcamp03.js?v=<?= rand(0, 20); ?>"></script>
    <script src="<?= base_url() ?>modules/bootcamp03/js/Ajaxform.js"></script>
</body>

</html>