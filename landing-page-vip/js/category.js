$(function(){
	//showMerchants("","");
	showLatestDiscount();
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
		if(paramAjax.keyword != "")
			window.location = "category.php?key="+paramAjax.keyword;
		if(paramAjax.cateId != 0)
			window.location = "category.php?cate="+paramAjax.cateId;
    });
	
	$("#form-search-merchant").on("submit", function(ev){
		ev.preventDefault();
		var keyword = $("#sys_search_coupon_code").val();
		
		if(keyword != "")
			window.location = "category.php?key="+keyword;
	});
});

var showMerchants = function(keyword, cateId){
	$.ajax({
        type:'GET',
        url:'php/presentation/GetMerchantForHomePage.php',
        dataType:'json',
		data:{
			keyword: keyword,
			cateId: cateId
		},
        success:function(result){
			var elListMerchants = $("#list-merchants .wrap-list");
			elListMerchants.empty();
            for(var i = 0; i< result.length; i++)
            {		
						var html= "<div class='coupons-code-item full flex'>"+
                                    "<div class='brand-logo thumb-left'>"+
                                        "<div class='wrap-logo'>"+
                                            "<div class='center-img'>"+
                                                "<span class='ver_hold'></span>"+
                                                "<a href='"+ result[i].id +"' class='ver_container'><img src='"+ result[i].path +"' alt='"+result[i].name+"'></a>"+
                                            "</div>"+
                                        "</div>"+
                                    "</div>"+
                                    "<div class='right-content flex-body'>"+
                                        "<p class='rs save-price'><a href='detail.php?id="+ result[i].id +"'>"+ result[i].name +"</a></p>"+
                                        "<p class='rs coupon-desc'>"+ result[i].short_desc +"</p>"+
                                        "<div class='bottom-action'>"+
                                            "<div class='left-vote'>"+
                                                "<span class='lbl-work'>Discount : "+ result[i].discount +"</span>"+
                                            "</div>"+
                                            "<a class='btn btn-blue btn-view-coupon' href='detail.php?id="+ result[i].id +"'>VIEW <span>DETAIL</span></a>"+
                                        "</div>"+
                                    "</div>"+
                                "</div>";
				elListMerchants.append(html);
            }
        },
		error:function(a,b,c){
		}
    });
};

var showLatestDiscount = function(){
	$.ajax({
        type:'GET',
        url:'php/presentation/GetMerchantByLimit.php',
        dataType:'json',
		data:{
			limit:5
		},
        success:function(result){
			var elListMerchants = $("#list-latest-discount .block-content");
			elListMerchants.empty();
            for(var i = 0; i< result.length; i++)
            {		
				var html = 	"<div class='coupons-code-item simple flex'>"+
                                    "<div class='brand-logo thumb-left'>"+
                                        "<div class='wrap-logo'>"+
                                            "<div class='center-img'>"+
                                                "<span class='ver_hold'></span>"+
                                                "<a href='detail.php?id="+ result[i].id +"' class='ver_container'><img src='"+ result[i].path +"' alt='"+ result[i].name +"'></a>"+
                                            "</div>"+
                                        "</div>"+
                                    "</div>"+
                                    "<div class='right-content flex-body'>"+
                                        "<p class='rs save-price'><a href='detail.php?id="+ result[i].id +"'>"+ result[i].short_desc +"</a></p>"+
                                    "</div>"+
                                "</div>";
				elListMerchants.append(html);
            }
        },
		error:function(a,b,c){
		}
    });
};