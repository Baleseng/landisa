// Prepare demo data
// Data is joined to map using value of 'hc-key' property by default.
// See API docs for 'joinBy' for more info on linking data and map.
var data = [
    ['bw-6964', 0],
    ['bw-6963', 1],
    ['bw-6967', 2],
    ['bw-6966', 3],
    ['bw-kg', 4],
    ['bw-se', 5],
    ['bw-ne', 6],
    ['bw-6962', 7],
    ['bw-gh', 8],
    ['bw-nw', 9],
    ['bw-ce', 10],
    ['bw-kl', 11],
    ['bw-kw', 12],
    ['bw-6965', 13],
    ['bw-so', 58]
];

// Create the chart
Highcharts.mapChart('bw', {
    chart: {
        map: 'countries/bw/bw-all'
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
        name: '',
        fillColor: '#cccccc',
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
