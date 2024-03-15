var options5 = {
	series: [{
		name: 'Team C',
		type: 'line',
		data: [30, 2, 3, 3, 4, 3, 6, 5, 5, 3, 3]
	}],
	chart: {
		height: 350,
		type: 'line',
		stacked: false,
		toolbar: {
			show: false,
		}
	},
	grid: {
		show: false,
		padding: {
			left: 0,
			right: 0
		}
	},
	stroke: {
		width: [0, 2, 5],
		curve: 'smooth'
	},
	plotOptions: {
		bar: {
			columnWidth: '5%'
		}
	},

	fill: {
		opacity: [0.85, 0.25, 1],
		gradient: {
			inverseColors: false,
			shade: 'light',
			type: "vertical",
			opacityFrom: 0.85,
			opacityTo: 0.55,
			stops: [0, 100, 100, 100]
		}
	},
	labels: ['01/01/2020', '02/01/2020', '03/01/2020', '04/01/2020', '05/01/2020', '06/01/2020', '07/01/2020',
	'08/01/2020', '09/01/2020', '10/01/2020', '11/01/2020'
	],
	markers: {
		size: 0
	},
	xaxis: {
		type: 'datetime'
	},
	yaxis: {
		title: {
			text: 'Points',
		},
		min: 0
	},
	tooltip: {
		shared: true,
		intersect: false,
		y: {
			formatter: function (y) {
				if (typeof y !== "undefined") {
					return y.toFixed(0) + " points";
				}
				return y;
			}
		}
	}
};
var chart = new ApexCharts(document.querySelector("#chart5"), options5);
chart.render();
