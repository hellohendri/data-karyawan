<!DOCTYPE html>
<html>

<head>
    <title>Edit Data</title>
</head>

<body>
    <center>
        <h1>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</h1>
        <h3>Edit Data</h3>
    </center>
    <!-- Modal Edit -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <?php foreach($nik as $nik){ ?>
        <form action="<?php echo site_url(). '/bootcamp08_model/update'; ?>" method="post" class="form-container">
            <div class=" modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">Edit Data</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="nik"><b>NIK</b></label><br>
                        <input type="text" class="form-control" placeholder="Masukkan NIK" name="nik" required><br>

                        <label for="nama"><b>Nama</b></label><br>
                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" required><br>

                        <label for="tmplahir"><b>Tempat Lahir</b></label><br>
                        <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir"
                            required><br>

                        <label for="tgllahir"><b>Tanggal Lahir</b></label><br>
                        <input type="date" class="form-control" placeholder="Masukkan Tanggal Lahir"
                            name="tanggal_lahir" required><br>

                        <label for="alamat"><b>Alamat</b></label><br>
                        <input type="text" class="form-control" placeholder="Masukkan alamat" name="alamat"
                            required><br>

                        <label for="notelp"><b>Telp</b></label><br>
                        <input type="text" class="form-control" placeholder="Masukkan no. telepon" name="telp"
                            class="form-control" required><br>

                        <label for="jabatan"><b>Jabatan</b></label><br>
                        <select id="jabatan" name="jabatan" class="form-control" placeholder="Pilih Jabatan" required>
                            <?php foreach ($jabatan_options as $option): ?>
                            <option value="<?php echo $option['jabatan']; ?>"><?php echo $option['jabatan']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select> <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>

</html>