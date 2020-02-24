// Prepare demo data
// Data is joined to map using value of 'hc-key' property by default.
// See API docs for 'joinBy' for more info on linking data and map.
var data = [
    ['ug', 0],
    ['ng', 0],
    ['st', 0],
    ['tz', 20],
    ['sl', 0],
    ['gw', 0],
    ['cv', 0],
    ['sc', 0],
    ['tn', 0],
    ['mg', 0],
    ['ke', 20],
    ['cd', 0],
    ['fr', 0],
    ['mr', 0],
    ['dz', 0],
    ['er', 0],
    ['gq', 0],
    ['mu', 0],
    ['sn', 0],
    ['km', 0],
    ['et', 0],
    ['ci', 0],
    ['gh', 0],
    ['zm', 20],
    ['na', 20],
    ['rw', 0],
    ['sx', 0],
    ['so', 0],
    ['cm', 0],
    ['cg', 0],
    ['eh', 0],
    ['bj', 0],
    ['bf', 0],
    ['tg', 0],
    ['ne', 0],
    ['ly', 0],
    ['lr', 0],
    ['mw', 0],
    ['gm', 0],
    ['td', 0],
    ['ga', 0],
    ['dj', 0],
    ['bi', 0],
    ['ao', 20],
    ['gn', 0],
    ['zw', 20],
    ['za', 20],
    ['mz', 20],
    ['sz', 0],
    ['ml', 0],
    ['bw', 20],
    ['sd', 0],
    ['ma', 0],
    ['eg', 0],
    ['ls', 0],
    ['ss', 0],
    ['cf', 0]
];

// Create the chart
Highcharts.mapChart('africa', {
    chart: {
        map: 'custom/africa',
        colors: '#000000'
    },

    title: {
        text: ''
    },

    subtitle: {
        text: ''
    },

    mapNavigation: {
        enabled: false,
        buttonOptions: {
            verticalAlign: 'bottom'
        }
    },

    colorAxis: {
        min: 0,
        minColor: '#f9e2d7',
        maxColor: '#f26522'
    },

    label:{
        style:{
            cursor:'pointer'
        }
    },

    series: [{
        data: data,
        name: 'Random data',
        states: {
            hover: {
                color: '#eeeeee'
            }
        },
        dataLabels: {
            enabled: false,
            format: '{point.name}'
        }
    }]
});
