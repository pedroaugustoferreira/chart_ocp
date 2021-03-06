<!DOCTYPE html>
<!-- saved from url=(0061)https://www.chartjs.org/samples/latest/charts/line/basic.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Line Chart</title>
	<script async="" src="./chart_files/analytics.js"></script><script src="./chart_files/Chart.min.js"></script>
	<script src="./chart_files/utils.js"></script>
	<style>
	canvas{
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	</style>
<style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style></head>

<body>
	<div style="width:75%;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
		<canvas id="canvas" style="display: block; height: 474px; width: 948px;" width="1896" height="948" class="chartjs-render-monitor"></canvas>
	</div>
	<br>
	<br>
	
	<script>

		var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var config = {
			type: 'line',
			data: {
				labels: ['0318',
'0319',
'0320',
'0321',
'0322',
'0323',
'0324',
'0325',
'0326',
'0327',
'0328',
'0329',
'0330',
'0331',
'0401',
'0402',
'0403',
'0404',
'0405',
'0406',
'0407',
'0408',
'0409',
'0410',
'0411',
'0412',
'0413',
'0414',
'0415',
'0416'],
				datasets: [{
					label: 'Pods Running',
					backgroundColor: window.chartColors.green,
					borderColor: window.chartColors.green,
					data: [
					0,
0,
146,
147,
146,
148,
147,
159,
153,
153,
155,
158,
158,
160,
161,
0,
0,
163,
161,
157,
151,
155,
158,
158,
157,
158,
159,
136,
134,
"<?php echo "300"; ?>",
					],
					fill: false,
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'OCP Produção'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Data'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Total de Pods'
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});

			});

			window.myLine.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var colorName = colorNames[config.data.datasets.length % colorNames.length];
			var newColor = window.chartColors[colorName];
			var newDataset = {
				label: 'Dataset ' + config.data.datasets.length,
				backgroundColor: newColor,
				borderColor: newColor,
				data: [],
				fill: false
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());
			}

			config.data.datasets.push(newDataset);
			window.myLine.update();
		});

		document.getElementById('addData').addEventListener('click', function() {
			if (config.data.datasets.length > 0) {
				var month = MONTHS[config.data.labels.length % MONTHS.length];
				config.data.labels.push(month);

				config.data.datasets.forEach(function(dataset) {
					dataset.data.push(randomScalingFactor());
				});

				window.myLine.update();
			}
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myLine.update();
		});

		document.getElementById('removeData').addEventListener('click', function() {
			config.data.labels.splice(-1, 1); // remove the label first

			config.data.datasets.forEach(function(dataset) {
				dataset.data.pop();
			});

			window.myLine.update();
		});
	</script>



</body></html>
