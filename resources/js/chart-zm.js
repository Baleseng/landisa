// Prepare demo data
// Data is joined to map using value of 'hc-key' property by default.
// See API docs for 'joinBy' for more info on linking data and map.
var data = [
    ['zm-lp', 0],
    ['zm-no', 1],
    ['zm-ce', 2],
    ['zm-ea', 3],
    ['zm-ls', 4],
    ['zm-co', 5],
    ['zm-nw', 6],
    ['zm-so', 7],
    ['zm-we', 8],
    ['zm-mu', 9]
];


// Create the chart
Highcharts.mapChart('zm', {
  chart: {
    map: 'countries/zm/zm-all'
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