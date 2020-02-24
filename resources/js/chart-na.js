// Prepare demo data
// Data is joined to map using value of 'hc-key' property by default.
// See API docs for 'joinBy' for more info on linking data and map.
var data = [
    ['na-os', 0],
    ['na-on', 1],
    ['na-ow', 2],
    ['na-ot', 3],
    ['na-oh', 4],
    ['na-ok', 5],
    ['na-ca', 6],
    ['na-ka', 7],
    ['na-ha', 8],
    ['na-kh', 9],
    ['na-ku', 10],
    ['na-er', 11],
    ['na-od', 12]
];

// Create the chart
Highcharts.mapChart('na', {
    chart: {
        map: 'countries/na/na-all'
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
