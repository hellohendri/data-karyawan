$('#addKaryawan').click(function () {

    $.ajax({
        type: 'POST',
        url: SITE_URL + "/bootcamp03/addKaryawan/?id=" + USER_ID,
        data: $('#addForm').serialize(),
        success: function (response) {
            if (response.success) {

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: response.message
                })

                grid_selector.trigger('reloadGrid');
                $('#addKaryawanModal').modal('hide');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.message
                });
                $('#errorGroup').append(response.errors);
            }
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Akses Controller Gagal'
            });
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
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Akses Controller Gagal'
                });
            }
        });

        $('#editKaryawan').attr({
            'data-toggle': "modal",
            'data-target': "#editKaryawanModal"
        });

    } else {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No rows are selected!'
        })
    }

});

$("#saveKaryawan").click(function () {

    $.ajax({
        type: 'POST',
        url: SITE_URL + "/bootcamp03/saveKaryawan",
        data: $('#formEdit').serialize(),
        success: function (response) {
            if (response.success) {

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: response.message
                })

                grid_selector.trigger('reloadGrid');
                $('#editKaryawanModal').modal('hide');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.message
                });
                $('div#errorGroup').append(response.errors);
            }
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Alses controller gagal'
            });
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

                    $.ajax({
                        type: 'POST',
                        url: SITE_URL + "/bootcamp03/delKaryawan/" + celValue,
                        data: celValue,
                        success: function (response) {
                            var val = JSON.parse(response);

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })
                
                            Toast.fire({
                                icon: 'success',
                                title: val.message
                            })

                            grid_selector.trigger('reloadGrid');
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Akses Controller Gagal'
                            });
                        }
                    });

                    $(this).dialog("close");
                },
            }
        });
    }
    else {

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No rows are selected!'
        })

    }

});

if (!USER_ID) {

    $('#excelExport,#toggleModalAdd,#editKaryawan,#delKaryawan').click(function (e) {
        e.preventDefault();

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Harap login terlebih dahulu'
        });
    });

} else {

    $('#toggleModalAdd').attr({
        'data-toggle': "modal",
        'data-target': "#addKaryawanModal"
    });

}