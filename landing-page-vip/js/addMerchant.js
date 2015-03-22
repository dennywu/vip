$(function(){
	initializeCategories();
	tinymce.init({
		selector: "textarea#description-tinymce",
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
	tinymce.init({
		selector: "textarea#merchant-shortdesc",
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
	$("#form-add-merchant").submit(postAddMerchant);
});

var initializeCategories = function(){
	$.ajax({
        type:'GET',
        url:'php/presentation/GetAllCategoryNotFilter.php',
        dataType:'json',
		async:false,
        success:function(result){
			var elCategoriesHeader = $("#list-category");
			elCategoriesHeader.empty();
            for(var i = 0; i< result.length; i++)
            {			
				elCategoriesHeader.append("<option value='"+ result[i].id +"'>"+ result[i].name +"</option>");
            }
        },
		error:function(a,b,c){
		}
    });
};

var postAddMerchant = function(ev){
	ev.preventDefault();
	var name = $("#merchant-name").val();
	var category = $("#list-category").val();
	var discount = $("#merchant-discount").val();
	if(name == "" || category == ""){
		alert("Semua Field harus diisi");
		return;
	}
	if(!($.isNumeric(discount)) || discount == ""){
		alert("Discount Harus Numeric");
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
	if (files.length < 1) {
		alert("Silahkan masukkan logo perusahaan");
		return;
	}
	
	$.ajax({
		type:"POST",
		url:"php/services/addMerchant.php",
		data: {
			name : name,
			categoryid : category,
			discount : discount,
			shortDesc : shortDesc,
			desc : desc,
			filename : files[0].name
		},
		dataType:"json",
		success:function(result){
			if(result.error == true){
				alert(result.message);
				return;
			}
			
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
		},
		error:function(a){
			alert(a.responseText);
		}
	});
};