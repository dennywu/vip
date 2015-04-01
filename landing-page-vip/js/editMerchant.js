$(function(){
	var id = $("#merchantId").val();
	initializeData(id);
	$("#form-edit-merchant").submit(postUpdateMerchant);
});

var initializeData = function(id){
	$.ajax({
		type:"GET",
		url:"php/presentation/GetMerchantByIdJson.php",
		data: {
			id : id
		},
		dataType:"json",
		success:function(result){					
			$("#merchant-name").val(result.name);
			$("#list-category").val(result.category_id);
			$("#merchant-discount").val(result.discount);
			tinymce.editors["merchant-shortdesc"].setContent(result.short_desc);
			tinymce.editors["description-tinymce"].setContent(result.description);
		},
		error:function(a){
			alert(a.responseText);
		}
	});
};

var postUpdateMerchant = function(ev){
	ev.preventDefault();
	var name = $("#merchant-name").val();
	var category = $("#list-category").val();
	var discount = $("#merchant-discount").val();
	if(name == "" || category == "" || discount == ""){
		alert("Semua Field harus diisi");
		return;
	}
	tinymce.triggerSave();
	var desc = $("textarea#description-tinymce").val();
	var shortDesc = $("#merchant-shortdesc").val();
	
	var fileSelect = document.getElementById('image');
	var files = fileSelect.files;

	var imageData = new FormData();
	for (var i = 0; i < files.length; i++) {
		var file = files[i];

		if (!file.type.match('image.*')) {
			continue;
		}

		imageData.append('image', file, file.name);
	}
	
	
	$.ajax({
		type:"POST",
		url:"php/services/updateMerchant.php",
		data: {
			id : $("#merchantId").val(),
			name : name,
			categoryid : category,
			discount : discount,
			shortDesc : shortDesc,
			desc : desc,
			filename : files.length == 0 ? "" : files[0].name
		},
		dataType:"json",
		success:function(result){
			if(result.error == true){
				alert(result.message);
				return;
			}
			
			if (files.length > 0) {
				$.ajax({
					type:"POST",
					url:"php/services/addMerchantImage.php",
					data: imageData,
					contentType: false,
					processData: false,
					dataType: "json",
					success:function(result){
						window.location = "admin.php";
					},
					error:function(a){
						alert(a.responseText);
					}
				});
			}else{
				window.location = "admin.php";
			}
		},
		error:function(a){
			alert(a.responseText);
		}
	});
};