
    Highcharts.mapChart('bubblemap', {
        chart: { 
            color: '#f9e2d7',
            map: 'custom/africa'
        },

        title: {
            text: ''
        },

        subtitle: {
            text: ''
        },

        legend: {
            enabled: false
        },

        mapNavigation: {
            enabled: false,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },

        series: [{
            name: 'Countries',
            color: '#f9e2d7',
            enableMouseTracking: false
        }],
    });
