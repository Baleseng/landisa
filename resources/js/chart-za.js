// Prepare demo data
// Data is joined to map using value of 'hc-key' property by default.
// See API docs for 'joinBy' for more info on linking data and map.
var data = [
  ['za-ec', 0],
  ['za-np', 0],
  ['za-nl', 20],
  ['za-wc', 30],
  ['za-nc', 0],
  ['za-nw', 0],
  ['za-fs', 5],
  ['za-gt', 50],
  ['za-mp', 0]
];

// Create the chart
Highcharts.mapChart('za', {
  chart: {
    map: 'countries/za/za-all'
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