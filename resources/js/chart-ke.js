// Prepare demo data
// Data is joined to map using value of 'hc-key' property by default.
// See API docs for 'joinBy' for more info on linking data and map.
var data = [
    ['ke-co', 0],
    ['ke-ny', 1],
    ['ke-ce', 2],
    ['ke-na', 3],
    ['ke-565', 4],
    ['ke-rv', 5],
    ['ke-we', 6],
    ['ke-ne', 7]
];


// Create the chart
Highcharts.mapChart('ke', {
  chart: {
    map: 'countries/ke/ke-all'
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