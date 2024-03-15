
var options5 = {
	chart: {
		height: 350,
		type: 'bar',
		parentHeightOffset: 0,
		fontFamily: 'Poppins, sans-serif',
		toolbar: {
			show: false,
		},
	},
	colors: ['#ff4d59', '#f56767'],
	grid: {
		borderColor: '#c7d2dd',
		strokeDashArray: 5,
	},
	plotOptions: {
		bar: {
			horizontal: false,
			columnWidth: '15%',
			endingShape: 'rounded'
		},
	},
	dataLabels: {
		enabled: false
	},
	stroke: {
		show: true,
		width: 1,
		colors: ['transparent']
	},
	series: [{
		name: 'In Progress',
		data: [40, 28, 47, 22, 34, 25, 30, 20, 37, 10, 28, 11 ]
	}],
	xaxis: {
		categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
		labels: {
			style: {
				colors: ['#ff4d59'],
				fontSize: '16px',
			},
		},
		axisBorder: {
			color: '#8fa6bc',
		}
	},
	yaxis: {
		title: {
			text: ''
		},
		labels: {
			style: {
				colors: '#353535',
				fontSize: '16px',
			},
		},
		axisBorder: {
			color: '#f00',
		}
	},
	legend: {
		horizontalAlign: 'right',
		position: 'top',
		fontSize: '16px',
		offsetY: 0,
		labels: {
			colors: '#353535',
		},
		markers: {
			width: 5,
			height: 10,
			radius: 15,
		},
		itemMargin: {
			vertical: 0
		},
	},
	fill: {
		opacity: 1

	},
	tooltip: {
		style: {
			fontSize: '15px',
			fontFamily: 'Poppins, sans-serif',
		},
		y: {
			formatter: function (val) {
				return val
			}
		}
	}
}

var chart5 = new ApexCharts(document.querySelector("#chart5"), options5);
chart5.render();
