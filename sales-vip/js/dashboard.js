$(function(){
	$.ajax({
		url:'php/presentation/getMemberDailyInMonth.php',
		type:'GET',
		dataType:'JSON',
		success:function(result){
			var arrayData = [];
			result.forEach(function (item) {
				var date = new Date(item[0]);
				arrayData.push([date.getTime(), parseInt(item[1])]);
			});
							
			var dailyChart = $('#dailyChart');
			dailyChart.highcharts({
				chart: {
					zoomType: 'x'
				},
				credits: {
					enabled: false
				},
				exporting: { enabled: false },
				title: {
					text: null
				},
				subtitle: {
					text: null
				},
				xAxis: {
					type: 'datetime'
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Total Member'
					}
				},
				legend: {
					enabled: false
				},
				plotOptions: {
					area: {
						fillColor: {
							linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
							stops: [
								[0, Highcharts.getOptions().colors[0]],
								[1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
							]
						},
						marker: {
							radius: 2
						},
						lineWidth: 1,
						states: {
							hover: {
								lineWidth: 1
							}
						},
						threshold: null
					}
				},
				series: [{
					type: 'area',
					name: 'Total Member',
					data: arrayData
				}]
			});
		}
	});
	
});