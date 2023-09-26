var select = false;
var grid_selector = $("#userKaryawan");
var pager_selector = "#userKaryawanPager";

grid_selector.jqGrid({
    jsonReader: {
        root: "rows",
        page: "page",
        total: "total",
        records: "records",
        repeatitems: true,
        cell: "cell",
        id: "id",
        userdata: "userdata",
        subgrid: {
            root: "rows",
            repeatitems: true,
            cell: "cell"
        }
    },
    url: 'bootcamp04/getKaryawan/?id=' + USER_ID,
    mtype: "post",
    datatype: "json",
    height: 394,
    colNames: ['NIK', 'Nama', 'Tempat Lahir', 'Tanggal Lahir', 'Umur', 'Alamat', 'Telp', 'Jabatan', 'Created By', 'Created Time'],
    colModel: [
        { name: 'nik', width: 150, sortable: false },
        { name: 'nama', width: 150, sortable: false, editable: true, editrules: { required: true }, editoptions: { maxlength: 50 } },
        { name: 'tempat_lahir', width: 150, sortable: false, editable: true, editrules: { required: false } },
        { name: 'tanggal_lahir', width: 150, sortable: false, editable: true, editrules: { required: false } },
        { name: 'umur', width: 150, sortable: false, editable: true, editrules: { required: false } },
        { name: 'alamat', width: 150, sortable: false, editable: true, editrules: { required: false } },
        { name: 'telp', width: 150, sortable: false, editable: true, editrules: { required: false } },
        { name: 'jabatan', width: 150, sortable: false, editable: true, editrules: { required: false } },
        { name: 'created_by', width: 150, sorttype: false, editable: false },
        { name: 'created_time', width: 150, sorttype: false, editable: false },
    ],
    shrinkToFit: false,
    viewrecords: true,
    rowNum: 10,
    rowList: [10, 20, 30],
    pager: pager_selector,
    altRows: true,
    autowidth: true,
    caption: "Data Karyawan",
    multiboxonly: true,
    onSelectRow: function (data) {
        select = true;
    },
    loadComplete: function () {
        var table = this;
        setTimeout(function () {
            styleCheckbox(table);
            updateActionIcons(table);
            updatePagerIcons(table);
            enableTooltips(table);
        }, 0);
    }
});

jQuery(grid_selector).jqGrid('navGrid', pager_selector, {
    edit: true,
    editicon: 'icon-pencil blue',
    add: true,
    addicon: 'icon-plus-sign purple',
    del: true,
    delicon: 'icon-trash red',
    search: true,
    searchicon: 'icon-search orange',
    refresh: true,
    refreshicon: 'icon-refresh green',
    view: true,
    viewicon: 'icon-zoom-in grey',
}, {
    closeAfterEdit: true,
    beforeSubmit: function (postdata, form, oper) {
        console.log(postdata);
        console.log(postdata.is_active);
        console.log(form);
        console.log(oper);
    },
    onclickSubmit: function (params, postdata) {
        console.log(postdata);
        console.log(params);
    },
    afterShowForm: function (formid) {}
    ,
    afterSubmit: function (data, postd) {
        console.log(data);
        console.log(postd);
    },
    recreateForm: true,
    beforeShowForm: function (e) {
        var form = $(e[0]);
        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
        style_edit_form(form);
    }
}, {
    afterSubmit: function (data, postd) {
        console.log(data);
        console.log(postd);
    },
    recreateForm: true,
    viewPagerButtons: false,
    beforeShowForm: function (e) {}
}, {
    recreateForm: true,
    afterSubmit: function (data, postd) {
        console.log(data);
        console.log(postd);
    },
    beforeShowForm: function (e) {},
    onClick: function (e) {}
}, {
    recreateForm: true,
    afterShowSearch: function (e) {
        var form = $(e[0]);
        form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
        style_search_form(form);
    },
    afterRedraw: function () {
        style_search_filters($(this));
    },
    multipleSearch: true
}, {
    recreateForm: true,
    beforeShowForm: function (e) {
        var form = $(e[0]);
        form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
    }
});

grid_selector.jqGrid('navButtonAdd', pager_selector, {
    buttonicon: "icon-undo ",
    title: "Reset Password",
    caption: "",
    position: "second",
    onClickButton: customButtonReset
});

function styleCheckbox(table) {
    $(table).find('input:checkbox').addClass('ace')
        .wrap('<label />')
        .after('<span class="lbl align-top" />')

    $('.ui-jqgrid-labels th[id*="_cb"]:first-child')
        .find('input.cbox[type=checkbox]').addClass('ace')
        .wrap('<label />').after('<span class="lbl align-top" />');
}

function updateActionIcons(table) {
    var replacement = {
        'ui-icon-pencil': 'icon-pencil blue',
        'ui-icon-trash': 'icon-trash red',
        'ui-icon-disk': 'icon-ok green',
        'ui-icon-cancel': 'icon-remove red'
    };
    $(table).find('.ui-pg-div span.ui-icon').each(function () {
        var icon = $(this);
        var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
        if ($class in replacement) icon.attr('class', 'ui-icon ' + replacement[$class]);
    })
}

function updatePagerIcons(table) {
    var replacement = {
        'ui-icon-seek-first': 'icon-double-angle-left bigger-140',
        'ui-icon-seek-prev': 'icon-angle-left bigger-140',
        'ui-icon-seek-next': 'icon-angle-right bigger-140',
        'ui-icon-seek-end': 'icon-double-angle-right bigger-140'
    };
    $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function () {
        var icon = $(this);
        var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
        if ($class in replacement) icon.attr('class', 'ui-icon ' + replacement[$class]);
    })
}

function enableTooltips(table) {
    $('.navtable .ui-pg-button').tooltip({ container: 'body' });
    $(table).find('.ui-pg-div').tooltip({ container: 'body' });
}
