
$(function(){
	var showMerchants = function(keyword, cateId){
		$.ajax({
			type:'GET',
			url:'php/presentation/GetMerchantForHomePage.php',
			dataType:'json',
			data:{
				keyword: keyword,
				cateId: cateId,
				offset: currentPage
			},
			success:function(result){
				var elListMerchants = $("#list-merchants");
				for(var i = 0; i< result.length; i++)
				{			
					var html = "<div class='coupon-item grid_3'>"+
								"<div class='coupon-content'>"+
									"<div class='img-thumb-center'>"+
										"<div class='wrap-img-thumb'>"+
										   "<span class='ver_hold'></span>"+
											"<a href='detail.php?id="+ result[i].id +"' class='ver_container'><img src='"+ result[i].path +"' alt='$COUPON_TITLE'></a>"+
										"</div>"+
									"</div>"+
									"<div class='coupon-price'>"+ result[i].discount +" %</div>"+
									"<div class='coupon-brand'>"+ result[i].name +"</div>"+
									"<div class='coupon-desc'>"+ result[i].short_desc +"</div>"+
									"<div class='time-left'></div>"+
									"<a class='btn btn-blue btn-take-coupon' href='detail.php?id="+ result[i].id +"'>View Detail</a>"+
								"</div>"+
							"</div>";
					elListMerchants.append(html);
				}
				
				if($(".coupon-item").length < totalMerchant){
					$("#paging-marchant").html("<div class='pagination'><a href='#'>Show More</a></div>");
					$("#paging-marchant a").click(function(ev){
						ev.preventDefault();
						currentPage += 1;
						showMerchants("","");
					});
				}
				else{
					$("#paging-marchant").empty();
				}
			},
			error:function(a,b,c){
			}
		});
	};

	var getTotalMerchant = function(){
		var totalMerchant = 0;
		$.ajax({
			type:'GET',
			url:'php/presentation/CountTotalMerchants.php',
			dataType:'json',
			async:false,
			success:function(result){
				totalMerchant = result;
			}
		});
		return totalMerchant;
	};

	var currentPage = 0;
	var totalMerchant = getTotalMerchant();
	showMerchants("","");
	$("#sys_selected_val").on("click",function(e){
        $("#sys_list_dd_cate").fadeToggle(300);
        $("body").on("click.hideDropCate",function(){
            $("#sys_list_dd_cate").fadeOut(300);
            $("body").off("click.hideDropCate");
        });
        e.stopPropagation();
    });
	
    $("#sys_list_dd_cate").on("click","a",function(e) {
        $("#sys_selected_val").children("span").html($(this).html()).attr("data-cate-id", $(this).attr("data-cate-id"));
        $("#sys_list_dd_cate").fadeOut(300);
        $("body").off("click.hideDropCate");
        e.stopPropagation();
        return false;
    });
	
    $("#sys_apply_filter").on("click",function(){
        var paramAjax = {
            keyword: $("#sys_txt_search").val(),
            cateId: $("#sys_selected_val").children("span").attr("data-cate-id")
        };
        console.log(paramAjax);
		$("#list-merchants").empty();
		totalMerchant = 0;
		currentPage = 0;
		showMerchants(paramAjax.keyword, paramAjax.cateId);
    });
});

