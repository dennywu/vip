$(function(){
	var offset = 0;
	getMerchants(offset);
	$.ajaxSetup({
		beforeSend: function () {
			var html = "<div class='ajax-loading-container'><div class='loading-element'><div class='message'>Loading...</div></div></div>";
			$(document.body).append(html);
		},
		complete: function () {
			$("div.ajax-loading-container").remove();
		}
	});
	$("#form-search").submit(function(ev){
		ev.preventDefault();
		var keyword = $("#form-search input").val();
		getMerchantsByKeyword(keyword);
	});
});

var getMerchantsByKeyword = function(keyword){
	$.ajax({
		type:"GET",
		url:"php/presentation/GetMerchantForAdminPageByKeyword.php",
		dataType:"JSON",
		data:{
			keyword : keyword
		},
		success:function(result){
			$("#list-merchants tbody").empty();
			$("#footer-table").remove();
			for(var i = 0; i< result.length; i++)
            {
				var html = "<tr>"+
								"<td class='counter'></td>"+
								"<td>"+ result[i].name +"</td>"+
								"<td>"+ result[i].discount +"%</td>"+
								"<td>"+ result[i].categoryName +"</td>"+
								//"<td>"+ result[i].short_desc +"</td>"+
								"<td><a href='editMerchant.php?id="+ result[i].id +"' class='btn'>Update</a></td>"+
								"<td><a href='#' class='deleteMerchant' data-merchantid='"+ result[i].id +"' data-merchantname='"+ result[i].name +"' class='btn btn-danger'>Delete</a></td>"+
							"</tr>";
				$("#list-merchants tbody").append(html);
			}
			$(".deleteMerchant").click(deleteMerchant);
		}
	});
};

var getMerchants = function(offset){
	$.ajax({
		type:"GET",
		url:"php/presentation/GetMerchantForAdminPage.php",
		data:{
			offset:offset
		},
		dataType:"JSON",
		success:function(result){
			for(var i = 0; i< result.length; i++)
            {
				var html = "<tr>"+
								"<td class='counter'></td>"+
								"<td>"+ result[i].name +"</td>"+
								"<td>"+ result[i].discount +"%</td>"+
								"<td>"+ result[i].categoryName +"</td>"+
								//"<td>"+ result[i].short_desc +"</td>"+
								"<td><a href='editMerchant.php?id="+ result[i].id +"' class='btn'>Update</a></td>"+
								"<td><a href='#' class='deleteMerchant' data-merchantid='"+ result[i].id +"' data-merchantname='"+ result[i].name +"' class='btn btn-danger'>Delete</a></td>"+
							"</tr>";
				$("#list-merchants tbody").append(html);
			}
			$(".deleteMerchant").click(deleteMerchant);
			
			if(result.length == 0 && $("#list-merchants tbody tr").length == 0){
				var html = "<tr><td colspan='6'>No Merchants Found</td></tr>";
				$("#list-merchants tbody").append(html);
			}
			var totalMerchants = getTotalMerchants();
			if(totalMerchants > ((offset + 1) * 10)){
				$("#footer-table").remove();
				$("#content").append("<div id='footer-table'><a href='#' class='btn btn-success' id='btn-showmore'>Show More</a> Total : "+ totalMerchants +" Merchants</div>");
				$("#btn-showmore").click(function(){
					offset += 1;
					getMerchants(offset);
				});
			}else{
				$("#footer-table").remove();
			}
			
		},
		error:function(a,b,c){
			console.log(a.responseText);
		}
	});
};

var deleteMerchant = function(ev){
	ev.preventDefault();
	var merchantName = $(this).data('merchantname');
	var merchantId = $(this).data('merchantid');
	var result = window.confirm("Apakah anda yakin ingin menghapus merchant "+ merchantName +" ?");
	if(result){
		$.ajax({
			type:"POST",
			url:"php/services/deleteMerchant.php",
			data:{
				id: merchantId
			},
			dataType:'json',
			success:function(){
				window.location = "admin.php";
			},
			error:function(callback){
				alert(callback.responseText);
			}
		});
	}
};

var getTotalMerchants = function(){
	var totalMerchants=0;
	$.ajax({
		type:"GET",
		url:"php/presentation/CountTotalMerchants.php",
		dataType:"JSON",
		async:false,
		success:function(result){
			totalMerchants = result;
		},
		error:function(a,b,c){
			console.log(a.responseText);
		}
	});
	return totalMerchants;
};