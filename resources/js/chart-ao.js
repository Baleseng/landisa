// Prepare demo data
// Data is joined to map using value of 'hc-key' property by default.
// See API docs for 'joinBy' for more info on linking data and map.
var data = [
    ['ao-na', 0],
    ['ao-cb', 1],
    ['ao-ln', 2],
    ['ao-ls', 3],
    ['ao-ml', 4],
    ['ao-bo', 5],
    ['ao-cn', 6],
    ['ao-cs', 7],
    ['ao-lu', 8],
    ['ao-ui', 9],
    ['ao-za', 10],
    ['ao-bi', 11],
    ['ao-bg', 12],
    ['ao-cc', 13],
    ['ao-cu', 14],
    ['ao-hm', 15],
    ['ao-hl', 16],
    ['ao-mx', 17]
];

// Create the chart
Highcharts.mapChart('ao', {
    chart: {
        map: 'countries/ao/ao-all'
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
