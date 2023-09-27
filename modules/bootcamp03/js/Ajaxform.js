if (!USER_ID) {
    $('#toggleModalAdd').prop('disabled', true)
    $('#editKaryawan').prop('disabled', true)
    $('#delKaryawan').prop('disabled', true)
}

$('#addKaryawan').click(function () {

    $.ajax({
        type: 'POST',
        url: SITE_URL + "/bootcamp03/addKaryawan/?id=" + USER_ID,
        data: $('form').serialize(),
        success: function (response) {
            if (response.success) {
                alert(response.message);
                grid_selector.trigger('reloadGrid');
                $('#addKaryawanModal').modal('hide');
            } else {
                alert(response.message);
                $('#errorGroup').append(response.errors);
            }
        },
        error: function () {
            alert("akses controller gagal");
        }
    });

});

$('#editKaryawan').click(function () {
    var selRowId = grid_selector.jqGrid('getGridParam', 'selrow');
    var celValue = grid_selector.jqGrid('getCell', selRowId, 'nik');

    if (selRowId) {

        $.ajax({
            type: 'POST',
            url: SITE_URL + "/bootcamp03/editKaryawan/" + celValue,
            data: { nik: celValue },
            success: function (response) {
                var val = JSON.parse(response);
                $('#modalBody').empty();

                $.each(val.data, function (key, value) {
                    html = '<label for="nik">NIK</label>' +
                        '<?php echo form_error("nik"); ?>' +
                        '<input type="number" class="form-control" id="editNik" name="nik" value="' + value.nik + '" placeholder="Nomor NIK">' +
                        '<label for="nama">Nama</label>' +
                        '<?php echo form_error("nama"); ?>' +
                        '<input type="text" class="form-control" id="nama" name="nama" value="' + value.nama + '" placeholder="Nama">' +
                        '<label for="tempatLahir">Tempat Lahir</label>' +
                        '<?php echo form_error("tempat_lahir"); ?>' +
                        '<input type="text" class="form-control" id="tempatLahir" name="tempatLahir" value="' + value.tempat_lahir + '" placeholder="Tempat Lahir">' +
                        '<label for="tanggalLahir">Tanggal Lahir</label>' +
                        '<?php echo form_error("tanggal_lahir"); ?>' +
                        '<input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" value="' + value.tanggal_lahir + '" placeholder="Tanggal Lahir">' +
                        '<label for="alamat">Alamat</label>' +
                        '<?php echo form_error("alamat"); ?>' +
                        '<input type="text" class="form-control" id="alamat" name="alamat" value="' + value.alamat + '" placeholder="Alamat">' +
                        '<label for="telp">Telp</label>' +
                        '<?php echo form_error("telp"); ?>' +
                        '<input type="number" class="form-control" id="telp" name="telp" value="' + value.telp + '" placeholder="Telepon">' +
                        '<label for="jabatan">Jabatan</label>' +
                        '<?php echo form_error("jabatan"); ?>' +
                        '<div class="#selectJabatan"><select class="form-control" id="jabatan" name="jabatan"><option value="manager">manager</option><option value="staff">staff</option><option value="supervisor">supervisor</option></select></div>'
                });

                $('#modalBody').append(html);
            },
            error: function () {
                alert("akses controller gagal");
            }
        });

        $('#editKaryawan').attr({
            'data-toggle': "modal",
            'data-target': "#editKaryawanModal"
        });

    } else {
        alert('No rows are selected');
    }

});

$("#saveKaryawan").click(function () {
    console.log("Save karyawan telah di click");

    $.ajax({
        type: 'POST',
        url: SITE_URL + "/bootcamp03/saveKaryawan",
        data: $("#formEdit").serialize(),
        success: function (response) {
            var val = JSON.parse(response);
            alert(val.message);
            grid_selector.trigger('reloadGrid');
            $('#editKaryawanModal').modal('hide');
        },
        error: function () {
            alert("akses controller gagal");
        }
    });

});

$("#delKaryawan").click(function (e) {
    var selRowId = grid_selector.jqGrid('getGridParam', 'selrow');
    var celValue = grid_selector.jqGrid('getCell', selRowId, 'nik');

    if (selRowId) {
        $("#dialog-confirm").html(
            '<p class="modal-delete"><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Data with nik ' + celValue + ' will be permanently deleted and cannot be recovered. Are you sure?</p>'
        );
        $("#dialog-confirm").dialog({
            resizable: false,
            height: "auto",
            width: 400,
            modal: true,
            buttons: {
                Cancel: function () {
                    $(this).dialog("close");
                },
                "Delete karyawan": function () {
                    // window.location = "delKaryawan/" + celValue;

                    $.ajax({
                        type: 'POST',
                        url: SITE_URL + "/bootcamp03/delKaryawan/" + celValue,
                        data: celValue,
                        success: function (response) {
                            var val = JSON.parse(response);
                            alert(val.message);
                            grid_selector.trigger('reloadGrid');
                        },
                        error: function () {
                            alert("akses controller gagal");
                        }
                    });

                    $(this).dialog("close");
                },
            }
        });
    }
    else {
        alert("No rows are selected");
    }

});