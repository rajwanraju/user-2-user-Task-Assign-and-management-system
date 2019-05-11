'use strict';
$(function () {
    initCharts();
});
//Charts
function initCharts() {
    //Chart Bar
    $('.chart.chart-bar').sparkline([6,4,8,6,8,10,5,6,7,9,5,6,4,8,6,8,10,5,6,7,9,5], {
        type: 'bar',
        barColor: '#fff',
        negBarColor: '#fff',
        barWidth: '4px',
        height: '45px'
    });
    

    //Chart Pie
    $('.chart.chart-pie').sparkline([30, 35, 25, 8], {
        type: 'pie',
        height: '45px',
        sliceColors: ['rgba(255,255,255,0.70)', 'rgba(255,255,255,0.85)', 'rgba(255,255,255,0.95)', 'rgba(255,255,255,1)']
    });


    //Chart Line
    $('.chart.chart-line').sparkline([9,4,6,5,6,4,7,3], {
        type: 'line',
        width: '60px',
        height: '45px',
        lineColor: '#fff',
        lineWidth: 1.3,
        fillColor: 'rgba(0,0,0,0)',
        spotColor: 'rgba(255,255,255,0.40)',
        maxSpotColor: 'rgba(255,255,255,0.40)',
        minSpotColor: 'rgba(255,255,255,0.40)',
        spotRadius: 3,
        highlightSpotColor: '#fff'
    });
    

    try {
    	// polar chart
    	var ctx = document.getElementById("polar-chart");
    	if (ctx) {
    		ctx.height = 200;
    		var myChart = new Chart(ctx, {
    			type: 'polarArea',
    			data: {
    				datasets: [{
    					data: [15, 18, 9, 6, 19],
    					backgroundColor: [
    						"rgba(0, 123, 255,0.9)",
    						"rgba(0, 123, 255,0.8)",
    						"rgba(0, 123, 255,0.7)",
    						"rgba(0,0,0,0.2)",
    						"rgba(0, 123, 255,0.5)"
    					]

    				}],
    				labels: [
    					"Green",
    					"Green",
    					"Green",
    					"Green"
    				]
    			},
    			options: {
    				legend: {
    					position: 'top',
    					labels: {
    						fontFamily: 'Poppins'
    					}

    				},
    				responsive: true
    			}
    		});
    	}

    } catch (error) {
    	console.log(error);
    }
    
    try {

    	// single bar chart
    	var ctx = document.getElementById("singel-bar-chart");
    	if (ctx) {
    		ctx.height = 200;
    		var myChart = new Chart(ctx, {
    			type: 'bar',
    			data: {
    				labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
    				datasets: [
    					{
    						label: "My First dataset",
    						data: [40, 55, 75, 81, 56, 55, 40],
    						borderColor: "rgba(0, 123, 255, 0.9)",
    						borderWidth: "0",
    						backgroundColor: "rgba(0, 123, 255, 0.5)"
    					}
    				]
    			},
    			options: {
    				legend: {
    					position: 'top',
    					labels: {
    						fontFamily: 'Poppins'
    					}

    				},
    				scales: {
    					xAxes: [{
    						ticks: {
    							fontFamily: "Poppins"

    						}
    					}],
    					yAxes: [{
    						ticks: {
    							beginAtZero: true,
    							fontFamily: "Poppins"
    						}
    					}]
    				}
    			}
    		});
    	}

    } catch (error) {
    	console.log(error);
    }
}

