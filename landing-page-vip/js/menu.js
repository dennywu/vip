$(function(){
	insertCategoriesToMenu();
});

var insertCategoriesToMenu = function(){
	$.ajax({
        type:'GET',
        url:'php/presentation/GetAllCategory.php',
        dataType:'json',
		async:false,
        success:function(result){
			var elCategoriesHeader = $("#menu-categories");
			var elCategoriesNav = $("#menu-categories-nav");
			var elCategoriesFilter = $("#sys_list_dd_cate div.wrap-list-cate");
			elCategoriesHeader.empty();
			elCategoriesNav.empty();
			elCategoriesFilter.empty();
            for(var i = 0; i< result.length; i++)
            {			
				elCategoriesHeader.append('<li><a href="category.php?cate='+ result[i].id +'">'+ result[i].name +'</a></li>');
				elCategoriesNav.append('<li><a href="category.php?cate='+ result[i].id +'">'+ result[i].name +'</a></li>');
				elCategoriesFilter.append('<a href="#" data-cate-id="'+ result[i].id +'">'+result[i].name+'</a>');
            }
        },
		error:function(a,b,c){
		}
    });
};

/*var insertMallToFilter = function(){
	$.ajax({
        type:'GET',
        url:'/vip/php/presentation/GetAllMalls.php',
        dataType:'json',
        success:function(result){
			var elMallsFilter = $("#mall_list div.wrap-list-cate");
			elMallsFilter.empty();
            for(var i = 0; i< result.length; i++)
            {			
				elMallsFilter.append('<a href="#" data-mall-id="'+ result[i].id +'">'+result[i].name+'</a>');
            }
        },
		error:function(a,b,c){
		}
    });
};*/