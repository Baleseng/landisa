// Prepare demo data
// Data is joined to map using value of 'hc-key' property by default.
// See API docs for 'joinBy' for more info on linking data and map.
var data = [
    ['mz-nm', 0],
    ['mz-in', 1],
    ['mz-mp', 2],
    ['mz-za', 3],
    ['mz-7278', 4],
    ['mz-te', 5],
    ['mz-mn', 6],
    ['mz-cd', 7],
    ['mz-ns', 8],
    ['mz-ga', 9],
    ['mz-so', 10]
];

// Create the chart
Highcharts.mapChart('mz', {
  chart: {
      map: 'countries/mz/mz-all'
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