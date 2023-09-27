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

                $.each(val.data, function (key, value) {
                    $('input#nik').val(value.nik);
                    $('input#nama').val(value.nama);
                    $('input#tempat-lahir').val(value.tempat_lahir);
                    $('input#tanggal-lahir').val(value.tanggal_lahir);
                    $('textarea#alamat').val(value.alamat);
                    $('input#telp').val(value.telp);
                    $('input#jabatan').val(value.jabatan);
                });
                
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