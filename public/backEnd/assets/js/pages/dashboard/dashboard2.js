'use strict';
$(function () {
    initCharts();
    initLineChart();
});
//Charts
function initCharts() {
    $('.chart.chart-bar2').sparkline(undefined, {
        type: 'bar',
        barColor: '#000',
        negBarColor: '#000',
        barWidth: '4px',
        height: '67px'
    });
}

function initLineChart(){

	Morris.Line({
        element: 'line_chart',
        data: [{
            period: '2008',
            iphone: 35,
            ipad: 67,
            itouch: 15
        },{
            period: '2009',
            iphone: 140,
            ipad: 189,
            itouch: 67
        },{
            period: '2010',
            iphone: 50,
            ipad: 80,
            itouch: 22
        },{
            period: '2011',
            iphone: 180,
            ipad: 220,
            itouch: 76
        }, {
            period: '2012',
            iphone: 130,
            ipad: 110,
            itouch: 82
        }, {
            period: '2013',
            iphone: 80,
            ipad: 60,
            itouch: 85
        }, {
            period: '2014',
            iphone: 78,
            ipad: 205,
            itouch: 135
        }, {
            period: '2015',
            iphone: 180,
            ipad: 124,
            itouch: 140
        }, {
            period: '2016',
            iphone: 105,
            ipad: 100,
            itouch: 85
        },
        {
            period: '2017',
            iphone: 210,
            ipad: 180,
            itouch: 120
        }
    ],
    xkey: 'period',
    ykeys: ['iphone', 'ipad', 'itouch'],
    labels: ['iPhone', 'iPad', 'iPod Touch'],
    pointSize: 3,
    fillOpacity: 0,
    pointStrokeColors: ['#222222', '#cccccc', '#f96332'],
    behaveLikeLine: true,
    gridLineColor: '#e0e0e0',
    lineWidth: 2,
    hideHover: 'auto',
    lineColors: ['#222222', '#20B2AA', '#f96332'],
    resize: true
    });
}