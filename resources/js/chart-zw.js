// Prepare demo data
// Data is joined to map using value of 'hc-key' property by default.
// See API docs for 'joinBy' for more info on linking data and map.
var data = [
    ['zw-ma', 0],
    ['zw-ms', 1],
    ['zw-bu', 2],
    ['zw-mv', 3],
    ['zw-mw', 4],
    ['zw-mc', 5],
    ['zw-ha', 6],
    ['zw-mn', 7],
    ['zw-mi', 8],
    ['zw-me', 9]
];



// Create the chart
Highcharts.mapChart('zw', {
  chart: {
    map: 'countries/zw/zw-all'
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