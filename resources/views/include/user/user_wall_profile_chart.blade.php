<script type="text/javascript">
// Build the chart
Highcharts.chart('container', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie',
    height: '100%',
    backgroundColor: 'none'
  },

  credits: {
    enabled: false
  },

  exporting: { 
    enabled: false 
  },

  title: {
    text:''
  },

  plotOptions: {
    pie: {
      allowPointSelect: false,
      cursor: 'pointer',
      dataLabels: {
        enabled: false
      },
      showInLegend: false
    }
  },

  series: [{
    name: 'Activity',
    colorByPoint: true,
    data: [{
        color: '#e5b363',
        name: 'Posts',
        y: 25
    }, {
        color: '#ce6b6c',
        name: 'Comments',
        y: 19.84
    }, {
        color: '#a69ddc',
        name: 'Moods',
        y: 15.85
    }, {
        color: '#71b2c3',
        name: 'Messages',
        y: 10.67
    }]
  }]
});
</script>