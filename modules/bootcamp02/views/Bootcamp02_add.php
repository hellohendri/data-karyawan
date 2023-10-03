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
            <div class="col-md-3 register-left" style="margin-top: 150px;">
                <h3>FORM</h3>
                <h3>DATA KARYAWAN</h3>
                <p>Halaman Untuk Pengelolaan Data Karyawan Ecentrix</p>
                <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="" role="tab" aria-controls="home" aria-selected="true">ECENTRIX</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">FORM DATA KARYAWAN</h3>
                        <?php $action = isset($karyawan) ? "submitadd/{$karyawan->nik}" : 'submitadd' ?>
                        <form action="<?= base_url("bootcamp02/{$action}?id=" . $_GET['id']) ?>" method="POST" id="addkaryawan">
                            <div class="row register-form">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" value="<?= $this->form_validation->set_value('nik', isset($karyawan) ? $karyawan->nik : null) ?>" <?php echo isset($karyawan) ? 'disabled' : '' ?>>
                                        <?php echo form_error('nik'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= $this->form_validation->set_value('nama', isset($karyawan) ? $karyawan->nama : null) ?>">
                                        <?php echo form_error('nama'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_Lahir" placeholder="Tempat Lahir" value="<?= $this->form_validation->set_value('tempat_lahir', isset($karyawan) ? $karyawan->tempat_lahir : null) ?>">
                                        <?php echo form_error('tempat_lahir'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Tanggal Lahir" value="<?= $this->form_validation->set_value('tanggal_lahir', isset($karyawan) ? $karyawan->tanggal_lahir : null) ?>">
                                        <?php echo form_error('tanggal_lahir'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="umur" id="umur" placeholder="Umur" disabled>
                                        <input type="hidden" id="val_umur" name="val_umur">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-bottom: 28px;">
                                        <textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="Alamat"><?= $this->form_validation->set_value('alamat', isset($karyawan) ? $karyawan->alamat : null) ?></textarea>
                                        <?php echo form_error('alamat'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="telp" id="telp" placeholder="Nomor Telepon" value="<?= $this->form_validation->set_value('telp', isset($karyawan) ? $karyawan->telp : null) ?>">
                                        <?php echo form_error('telp'); ?>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="jabatan" name="jabatan" value="<?= $this->form_validation->set_value('jabatan') ?>">
                                            <option selected disabled hidden>Pilih Jabatan</option>
                                            <option value="manager" <?php echo set_select('jabatan', 'manager', isset($karyawan) ? $karyawan->jabatan == 'manager' : false); ?>>Manager</option>
                                            <option value="staff" <?php echo set_select('jabatan', 'staff', isset($karyawan) ? $karyawan->jabatan == 'staff' : false); ?>>Staff</option>
                                            <option value="supervisor" <?php echo set_select('jabatan', 'supervisor', isset($karyawan) ? $karyawan->jabatan == 'supervisor' : false); ?>>Supervisor</option>
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
            if (tanggalLahir) {
                console.log(tanggalLahir);
                var tanggalLahirArray = tanggalLahir.split('-');
                console.log(tanggalLahirArray);
                var tahunLahir = parseInt(tanggalLahirArray[0]);
                console.log(tahunLahir);
                var bulanLahir = parseInt(tanggalLahirArray[1]);
                console.log(bulanLahir);
                var tanggalLahir = parseInt(tanggalLahirArray[2]);
                console.log(tanggalLahir);

                var tanggalSekarang = new Date();

                var tahunSekarang = tanggalSekarang.getFullYear();
                //Bulan dimulai dari 0 (Januari) hingga 11 (Desember)
                var bulanSekarang = tanggalSekarang.getMonth() + 1;
                var tanggalSekarang = tanggalSekarang.getDate();

                var umur = tahunSekarang - tahunLahir;

                if (bulanSekarang < bulanLahir || (bulanSekarang === bulanLahir && tanggalSekarang < tanggalLahir)) {
                    umur--;
                }

                $("#umur").val(umur + ' Tahun');
                $("#val_umur").val(umur);
            }
        }

        $('#tanggal_lahir').on('change', function() {
            hitungUmur($(this).val())
        });

        $(document).ready(function() {
            hitungUmur($('#tanggal_lahir').val())
        });
    </script>

</body>

</html>