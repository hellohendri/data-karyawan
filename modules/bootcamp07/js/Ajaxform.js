$("#btncheck").click(function(){
	console.log("btncheck telah di click");
	
	$.ajax({
		type: 'POST',
		url: SITE_URL+"/bootcamp07/addData",
		data: $("#form-input").serialize(),
		success: function(response) {
			var val = JSON.parse(response);
			
			alert("Data berhasil disimpan");
		},
		error:function(){
			alert("akses controller gagal");
		}
	});
});