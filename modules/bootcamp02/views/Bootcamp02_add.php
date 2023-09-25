<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Karyawan</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <div class="position-relative">
        <button type="button" class="btn-close position-absolute top-0 end-0 me-4 mt-4" aria-label="Close" id="closeButton"></button>
    </div>

    <div class="container">
        <div class="row py-4">
            <div class="col">
                <div class="text-center">
                    <h1>TAMBAH KARYAWAN ECENTRIX</h1>
                    <p class="lead">Form untuk menambah data karyawan di ecentrix</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <form action="<?= base_url() ?>bootcamp02/submitadd?id=<?= $_GET['id'] ?>" method="POST" id="addkaryawan">
                    <nav>
                        <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="step1-tab" data-bs-toggle="tab" href="#step1">Langkah 1</a>
                            <a class="nav-link" id="step2-tab" data-bs-toggle="tab" href="#step2">Langkah 2</a>
                            <a class="nav-link" id="step3-tab" data-bs-toggle="tab" href="#step3">Langkah 3</a>
                        </div>
                    </nav>
                    <div class="tab-content py-4">
                        <div class="tab-pane fade show active" id="step1">
                            <h4>Data Pribadi</h4>
                            <div class="mb-3">
                                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_Lahir" placeholder="Tempat Lahir">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                            </div>
                            <div class="mb-3">
                                <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                                <input type="text" class="form-control" name="umur" id="umur">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="step2">
                            <h4>Data Pendukung</h4>
                            <div class="mb-3">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="telp" class="col-sm-2 col-form-label">Telp</label>
                                <input type="tel" class="form-control" name="telp" id="telp" placeholder="Nomor Telepon">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="step3">
                            <h4>Data Pekerjaan</h4>
                            <div class="mb-3">
                                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                <select class="form-control" id="jabatan" name="jabatan">
                                    <option selected disabled hidden>Pilih Jabatan</option>
                                    <option value="manager">Manager</option>
                                    <option value="staff">Staff</option>
                                    <option value="supervisor">Supervisor</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-auto"><button type="button" class="btn btn-secondary" data-enchanter="previous">Kembali</button></div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" data-enchanter="next">Lanjut</button>
                            <button type="submit" class="btn btn-primary" data-enchanter="finish">Tambah Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- JavaScript for validations only -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <!-- Our script! :) -->
    <script src="<?= base_url() ?>modules/bootcamp02/js/enchanter.js"></script>
    <script>
        var registrationForm = $('#addkaryawan');
        var formValidate = registrationForm.validate({
            errorClass: 'is-invalid',
            errorPlacement: () => false
        });

        const wizard = new Enchanter('addkaryawan', {}, {
            onNext: () => {
                if (!registrationForm.valid()) {
                    formValidate.focusInvalid();
                    return false;
                }
            }
        });
    </script>

    <script>
        // Tangkap tombol silang dan tambahkan event listener
        var closeButton = document.getElementById('closeButton');
        closeButton.addEventListener('click', function() {
            // Kembali ke halaman sebelumnya
            window.history.back();
        });
    </script>

</body>

</html>