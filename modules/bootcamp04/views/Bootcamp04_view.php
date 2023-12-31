<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Bootcamp04</title>
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp04/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp04/css/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp04/css/ui.jqgrid.css">
    <!-- Add any additional CSS here -->
</head>

<body>
    <div class="container">
        <h1>Data Karyawan</h1>

        <?php
        echo "<p>Username: " . $user . "</p>";
        ?>

        <div class="button-wrapper">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addKaryawanModal">Add</button>
            <button type="button" class="btn btn-warning" id="editKaryawan">Edit</button>
            <input type="button" class="btn btn-danger" id="delKaryawan" value="Delete" />
        </div>

        <table id="userKaryawan"></table>
        <div id="userKaryawanPager"></div>

        <!-- Add Karyawan Bootstrap Modal -->
        <div class="modal fade" id="addKaryawanModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="modalTitle">Tambah Karyawan</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Modal Content  -->
                    <form id="addForm">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <?php echo form_error('nik'); ?>
                                <input type="number" class="form-control" id="nik" name="nik" placeholder="Nomor NIK">
                                <br>
                                <input type="button" id="nikcheck" class="btn btn-default" value="Check NIK">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
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
                            <input type="button" class="btn btn-primary btn-submit" id="addKaryawan" name="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Add Karyawan Bootstrap Modal -->

        <!-- Edit Karyawan Bootstrap Modal -->
        <div class="modal fade" id="editKaryawanModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="modalTitle">Edit Karyawan</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Modal Content  -->
                    <form id="formEdit">
                        <div class="modal-body" id="modalBody">
                            <!-- Edit Karyawan Form Section Goes Here -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <input type="button" class="btn btn-primary btn-submit" name="submit" id="saveKaryawan" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Edit Karyawan Bootstrap Modal -->

        <!-- jQuery UI Delete Karyawan Modal -->
        <div id="dialog-confirm" title="Are you sure?">
            <p class="modal-delete">
                <span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                These items will be permanently deleted and cannot be recovered. Are you sure?
            </p>
        </div>
        <!-- End of jQuery UI Delete Karyawan Modal -->

    </div>

    <script type="text/javascript">
        var USER_ID = '<?= $user ?>';
        var BASE_URL = '<?= base_url() ?>';
        var SITE_URL = '<?= site_url() ?>';
    </script>

    <!-- Load JavaScript from external files -->
    <script src="<?= base_url() ?>modules/bootcamp04/js/jquery-2.0.3.min.js"></script>
    <script src="<?= base_url() ?>modules/bootcamp04/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>modules/bootcamp04/js/jquery-ui.js"></script>
    <script src="<?= base_url(); ?>modules/bootcamp04/js/jqGrid/jquery.jqGrid.js"></script>
    <script src="<?= base_url(); ?>modules/bootcamp04/js/jqGrid/i18n/grid.locale-en.js"></script>
    <script src="<?= base_url(); ?>modules/bootcamp04/js/Bootcamp04.js?v=<?= rand(0, 20); ?>"></script>
    <script src="<?= base_url() ?>modules/bootcamp04/js/Ajaxform.js"></script>
    <!-- Add any additional JavaScript files here -->
</body>
</html>
