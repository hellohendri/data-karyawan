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
                                        <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_Lahir" placeholder="Tempat Lahir">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="Tanggal Lahir">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="umur" id="umur" placeholder="Umur">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-bottom: 28px;">
                                        <textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="Alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="telp" id="telp" placeholder="Nomor Telepon">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="jabatan" name="jabatan">
                                            <option selected disabled hidden>Pilih Jabatan</option>
                                            <option value="manager">Manager</option>
                                            <option value="staff">Staff</option>
                                            <option value="supervisor">Supervisor</option>
                                        </select>
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

</body>

</html>