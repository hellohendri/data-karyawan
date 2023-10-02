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
	url: 'bootcamp02/getKaryawan/?id=' + USER_ID,
	mtype: "post",
	datatype: "json",
	height: 394,
	colNames: ['NIK', 'Nama', 'Tempat Lahir', 'Tanggal Lahir', 'Umur', 'Alamat', 'Telp', 'Jabatan', 'Created By', 'Created Time', 'Action'],
	colModel: [
		{ name: 'nik', width: 150, sortable: false },
		{ name: 'nama', width: 150, sortable: false, editable: true, editrules: { required: true }, editoptions: { maxlength: 50 } },
		{ name: 'tempat_lahir', width: 150, sortable: false, editable: true, editrules: { required: false } },
		{ name: 'tanggal_lahir', width: 150, sortable: false, editable: true, editrules: { required: false } },
		{ name: 'umur', width: 50, sortable: false, editable: true, editrules: { required: false } },
		{ name: 'alamat', width: 200, sortable: false, editable: true, editrules: { required: false } },
		{ name: 'telp', width: 150, sortable: false, editable: true, editrules: { required: false } },
		{ name: 'jabatan', width: 150, sortable: false, editable: true, editrules: { required: false } },
		{ name: 'created_by', width: 150, sorttype: false, editable: false },
		{ name: 'created_time', width: 150, sorttype: false, editable: false },
		{
			name: 'actions',
			width: 100,
			sortable: false,
			formatter: function (cellValue, options, rowObject) {
				var editButton = '<a href="#" class="edit-button" data-id="' + rowObject.id + '">Edit</a>';
				var deleteButton = '<a href="#" class="delete-button" data-id="' + rowObject.id + '">Delete</a>';

				return editButton + ' | ' + deleteButton;
			}
		}
	],

	shrinkToFit: false,
	viewrecords: true,
	rowNum: 10,
	rowList: [10, 20, 30],
	pager: pager_selector,
	altRows: true,

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
	},

	autowidth: true

});