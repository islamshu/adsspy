(function($) {

	"use strict";

	$('#id_0').datetimepicker({
    allowInputToggle: true,
    showClose: true,
    showClear: true,
    showTodayButton: true,
    format: "MM/DD/YYYY hh:mm:ss A",
    icons: {
		  time:'fa fa-clock-o',

		  date:'fa fa-calendar-o',

		  up:'fa fa-chevron-up',

		  down:'fa fa-chevron-down',

		  previous:'fa fa-chevron-left',

		  next:'fa fa-chevron-right',

		  today:'fa fa-chevron-up',

		  clear:'fa fa-trash',

		  close:'fa fa-close'
		},

	});



	var figure = $(".video").hover( hoverVideo, hideVideo );

function hoverVideo(e) { $('video', this).get(0).play(); }
function hideVideo(e) { $('video', this).get(0).pause(); }




var ctx = document.getElementById('myChart').getContext('2d');

var myChart = new Chart(ctx, {
	type: 'line',
	data: {
		labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
		datasets: [
			{
				label: 'order',
				data: [100, 200, 300, 400, 500, 600, 400, 600, 500],
				backgroundColor: [
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1, fontSize:12,fill: true
			}
			,
			{

				label: 'price',
				data: [150, 350, 400, 250, 50, 350, 300],
				backgroundColor: [
					'rgba(54, 162, 235, 0.2)'

				],
				borderColor: [

					'rgba(255, 206, 86, 1)'

				],
				borderWidth: 1 ,fill: true

			}

			,
			{

				label: 'Rating',
				data: [90, 150, 200, 250, 300, 710],
				backgroundColor: [
					'rgba(75, 192, 192, 0.2)'

				],
				borderColor: [

					'rgba(153, 102, 255, 1)'
				],
				borderWidth: 1,fill: true

			}

			,
			{

				label: 'Review',
				data: [200, 250, 300, 450,200,150,160,400],
				backgroundColor: [

					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1,fill: true

			}

		]


	},
	options: {
		scales: {
			y: {
				beginAtZero: true
			}
		}

		
	}
});


$('select').niceSelect();


function sh(src1,src2){
	$(src1).click(function(){
		$(src2).toggleClass('toggle')
	})
}


sh('.country','.countries');

sh('.lang','.langs');

sh('.Engagement','.Engagements');

sh('.objective','.objectives');

$('.cancel').click(function(){
	$(this).parent().parent().toggleClass('toggle')
})

$('.content span').click(function(){
	$(this).parent().parent().toggleClass('toggle')
})


function addTarget(src,src2){
	$(src2).click(function(){

		$(src).text($(this).text());

	})
}

addTarget('.country .current','.countries .row1 span');

addTarget('.lang .current','.langs .row1 span');

addTarget('.Engagement .current','.Engagements .row1 span');

addTarget('.objective .current','.objectives .row1 span');



$(function() {
	$('input[name="daterange"]').daterangepicker({
		opens: 'left'
	}, function (start, end, label) {
		console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
	});
});


})(jQuery);
