<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Karyawan</title>
    <!-- CSS only -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?= base_url() ?>modules/bootcamp02/css/form.css" />
</head>

<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>FORM</h3>
                <h3>DATA KARYAWAN</h3>
                <p>Halaman Untuk Pengelolaan Data Karyawan Ecentrix</p>
                <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ECENTRIX</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">FORM DATA KARYAWAN</h3>
                        <form action="<?= base_url() ?>bootcamp02/submitadd?id=<?= $_GET['id'] ?>" method="POST" id="addkaryawan">
                            <div class="row register-form">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" value="<?= $this->form_validation->set_value('nik', isset($karyawan) ? $karyawan->nik : null) ?>">
                                        <?php echo form_error('nik'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= $this->form_validation->set_value('nama') ?>">
                                        <?php echo form_error('nama'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_Lahir" placeholder="Tempat Lahir" value="<?= $this->form_validation->set_value('tempat_lahir') ?>">
                                        <?php echo form_error('tempat_lahir'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Tanggal Lahir" value="<?= $this->form_validation->set_value('tanggal_lahir') ?>">
                                        <?php echo form_error('tanggal_lahir'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="umur" id="umur" placeholder="Umur" disabled>
                                        <input type="hidden" id="val_umur" name="val_umur">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-bottom: 28px;">
                                        <textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="Alamat"><?= $this->form_validation->set_value('alamat') ?></textarea>
                                        <?php echo form_error('alamat'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="telp" id="telp" placeholder="Nomor Telepon" value="<?= $this->form_validation->set_value('telp') ?>">
                                        <?php echo form_error('telp'); ?>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="jabatan" name="jabatan" value="<?= $this->form_validation->set_value('jabatan') ?>">
                                            <option selected disabled hidden>Pilih Jabatan</option>
                                            <option value="manager" <?php echo set_select('jabatan', 'manager'); ?>>Manager</option>
                                            <option value="staff" <?php echo set_select('jabatan', 'staff'); ?>>Staff</option>
                                            <option value="supervisor" <?php echo set_select('jabatan', 'supervisor'); ?>>Supervisor</option>
                                        </select>
                                        <?php echo form_error('jabatan'); ?>
                                    </div>
                                    <input type="submit" class="btnRegister" value="Submit" />
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type='text/javascript'>
        function hitungUmur(tanggalLahir) {
            var tanggalLahirArray = tanggalLahir.split('-');
            var tahunLahir = parseInt(tanggalLahirArray[0]);
            var bulanLahir = parseInt(tanggalLahirArray[1]);
            var tanggalLahir = parseInt(tanggalLahirArray[2]);

            var tanggalSekarang = new Date();

            var tahunSekarang = tanggalSekarang.getFullYear();
            //Bulan dimulai dari 0 (Januari) hingga 11 (Desember)
            var bulanSekarang = tanggalSekarang.getMonth() + 1;
            var tanggalSekarang = tanggalSekarang.getDate();

            var umur = tahunSekarang - tahunLahir;

            if (bulanSekarang < bulanLahir || (bulanSekarang === bulanLahir && tanggalSekarang < tanggalLahir)) {
                umur--;
            }

            return umur;
        }

        $(document).ready(function() {
            $('#tanggal_lahir').on('change', function() {
                var selectedDate = $(this).val();
                console.log(selectedDate)
                var usia = hitungUmur(selectedDate)
                console.log(usia)
                $("#umur").val(usia);
                $("#val_umur").val(usia);
            });
        });
    </script>

</body>

</html>