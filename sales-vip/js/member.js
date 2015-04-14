/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/
$(document).ready(function(){
	intializeFilterSalesmanControl();
	$("#filterBySalesman").change(filterBySalesman);

    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});

var intializeFilterSalesmanControl = function(){
	$.ajax({
		type:"GET",
		url:"php/presentation/getSalesmans.php",
		dataType:"JSON",
		success:function(result){
			$("#filterBySalesman").append("<option value='none'>None</option>");
			result.forEach(function(salesman){
				$("#filterBySalesman").append("<option value='"+ salesman.username +"'>"+salesman.fullname+"</option>");
			});
		}
	});
};

var filterBySalesman = function(){
	var salesman = $("#filterBySalesman").val();
	if(salesman == "none"){
		window.location.reload();
	}else{
		$.ajax({
			type:"GET",
			url:"php/presentation/getMembersByFilter.php",
			dataType:"JSON",
			data:{
				'salesman':salesman
			},
			success:function(result){
				$("#tbl-members tbody").empty();
				if(result.length == 0){
					$("#tbl-members tbody").append("<tr>\
							<td colspan='11' style='text-align:center;'>Tidak ada member yang ditemukan</td>\
						</tr>");
				}
				else{
					result.forEach(function(member){
						$("#tbl-members tbody").append("<tr>\
							<td>"+ member.username + "</td>\
								<td>"+ member.registerdate + "</td>\
								<td>"+ member.nocard +"</td>\
								<td>"+ member.name +"</td>\
								<td>"+ member.address +"</td>\
								<td>"+ member.email +"</td>\
								<td>"+ member.birthday +"</td>\
								<td>"+ member.job +"</td>\
								<td>"+ member.religion +"</td>\
								<td>"+ member.gender +"</td>\
								<td>"+ member.hobby +"</td>\
						</tr>");
					});
				}
			}
		});
	}
};