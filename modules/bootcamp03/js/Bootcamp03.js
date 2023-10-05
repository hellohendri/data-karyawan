var select = false;
var grid_selector = $("#userKaryawan");
var pager_selector = "#userKaryawanPager";

if (SEARCH != '') {
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
		url: 'bootcamp03/getKaryawan/?id=' + USER_ID + '&search=' + SEARCH,
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
		//toppager: true,

		//multiselect: true,
		//multikey: "ctrlKey",
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


		caption: "Data Karyawan",


		autowidth: true

	});
}

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
	url: 'bootcamp03/getKaryawan/?id=' + USER_ID,
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
	//toppager: true,

	//multiselect: true,
	//multikey: "ctrlKey",
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


	caption: "Data Karyawan",


	autowidth: true

});