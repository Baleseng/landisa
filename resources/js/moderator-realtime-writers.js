$.getJSON('https://moderator.triwink.app/json/writers.json', function (data) {

    Highcharts.mapChart('container', {
        chart: {
            color: '#f9e2d7',
            map: 'custom/africa'
        },

        title: {
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
            enableMouseTracking: true
        }, {
            type: 'mapbubble',
            name: 'User Activity in',
            joinBy: ['iso-a3', 'code3'],
            data: data,
            minSize: 4,
            maxSize: '12%',
            tooltip: {
                pointFormat: '{point.properties.hc-a2}: {point.z}'
            },
            animation: {
                duration:1000
            },
        }]
    });
});