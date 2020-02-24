
// Prepare demo data
// Data is joined to map using value of 'hc-key' property by default.
// See API docs for 'joinBy' for more info on linking data and map.
var data = [
    ['tz-mw', 0],
    ['tz-kr', 1],
    ['tz-pw', 2],
    ['tz-mo', 3],
    ['tz-nj', 4],
    ['tz-zs', 5],
    ['tz-zw', 6],
    ['tz-km', 7],
    ['tz-mt', 8],
    ['tz-rv', 9],
    ['tz-pn', 10],
    ['tz-ps', 11],
    ['tz-zn', 12],
    ['tz-sd', 13],
    ['tz-sh', 14],
    ['tz-as', 15],
    ['tz-my', 16],
    ['tz-ma', 17],
    ['tz-si', 18],
    ['tz-mb', 19],
    ['tz-rk', 20],
    ['tz-ds', 21],
    ['tz-do', 22],
    ['tz-tb', 23],
    ['tz-li', 24],
    ['tz-ge', 25],
    ['tz-kl', 26],
    ['tz-tn', 27],
    ['tz-ka', 28],
    ['tz-ir', 29]
];
// Create the chart
Highcharts.mapChart('tz', {
  chart: {
    map: 'countries/tz/tz-all'
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