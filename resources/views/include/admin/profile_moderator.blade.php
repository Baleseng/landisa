@extends('layouts.profile')

@section('title','' .$url.  ' | moderator | ' . $id->name )

@section('styles')
  @include('include.profile_styles')
@endsection

@section('searchfield')
  @include('include.user.header_search_news')
@endsection

@section('menubutton')
  @include('include.user.header_section_' .$url. '_button')
@endsection

@section('content')

  <div class="admin-profile-container">
    <div class="admin-profile-row row">
      <div class="admin-profile-col-1">
        
        <div class="admin-profile-img">
          <img class="fa fa-user" src="https://writer.triwink.app/images/avator/{{ $id->avator }}" >
        </div>

        <div class="admin-profile-info">
          <div class="admin-profile-title">
            <div class="admin-profile-border"></div>
            <div class="admin-profile-h5">Basic Info</div>
          </div>
          <div class="admin-profile-li"><i class="fa fa-"></i> <b>Gender</b> <span> : {{ $id->gender }} </span></div>
          <div class="admin-profile-li"><i class="fa fa-"></i> <b>Birthday</b> <span>: {{ $id->birth }} </span></div>
        </div>  

        <div class="admin-profile-info">
          <div class="admin-profile-title">
            <div class="admin-profile-border"></div>
            <div class="admin-profile-h5">Enjoys writing about</div>
          </div>
          <div class="admin-profile-li"><h6></h6></div>
        </div>

      </div>
      <div class="admin-profile-col-2">
        
        <div class="admin-profile-name">
          
          <h1>{{$id->name}} {{$id->surname}}</h1>
          <div class="admin-profile-interest"><i class="fa fa-"></i> <b>Interesting</b> <span>: </span></div>
          
          <div class="admin-profile-title">
            <div class="admin-profile-border"></div>
            <div class="admin-profile-h5">Ranking as Writer</div>
          </div>

          <span class="ranking-number">8.5</span>
          <div class="admin-profile-raking">
            <i class="ranked fa fa-star"></i>
            <i class="ranked fa fa-star"></i>
            <i class="ranked fa fa-star"></i>
            <i class="ranked fa fa-star-half-alt"></i>
            <i class="unranked fa fa-star"></i>
          </div>

        </div>

        <div class="admin-profile-info">
          <div class="admin-profile-title">
            <div class="admin-profile-border"></div>
            <div class="admin-profile-h5">Contact Info</div>
          </div>
          <div class="admin-profile-li"><i class="fa fa-"></i> <b>Email</b> <span>: {{ $id->email }}</span></div>
          <div class="admin-profile-li"><i class="fa fa-"></i> <b>Phone</b> <span>: {{ $id->mobile }}</span></div>
          <div class="admin-profile-li"><i class="fa fa-"></i> <b>Acvite</b> <span>:{{ $id->region }}</span></div>
        </div>
      </div>

      <div class="admin-profile-col-2">
        <div id="container" style="min-width: 310px; max-width: 420px; height: 400px; margin: 0 auto" ></div>
      </div>

    </div>
  </div>
                
  @section('scripts')
    <script type="text/javascript">
      Highcharts.chart('container', {

        chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
            backgroundColor: 'none'
        },

        credits: {
          enabled: false
        },

        exporting: { 
          enabled: false 
        },

        title: {
            text: 'Activity'
        },

        pane: {
            startAngle: -150,
          endAngle: 150,
          background: [{
            backgroundColor: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0, '#FFF'],
                    [1, '#333']
                ]
            },
              borderWidth: 0,
              outerRadius: '109%'
          }, {
            backgroundColor: {
            linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
            stops: [
                [0, '#333'],
                [1, '#FFF']
            ]
          },
                borderWidth: 1,
                outerRadius: '107%'
          }, {

          // default background

          }, {
            backgroundColor: '#DDD',
            borderWidth: 0,
            outerRadius: '105%',
            innerRadius: '103%'
            }]
        },

        // the value axis
        yAxis: {
          min: 0,
          max: 200,

          minorTickInterval: 'auto',
          minorTickWidth: 1,
          minorTickLength: 10,
          minorTickPosition: 'inside',
          minorTickColor: '#666',

          tickPixelInterval: 30,
          tickWidth: 2,
          tickPosition: 'inside',
          tickLength: 10,
          tickColor: '#666',
          labels: {
            step: 2,
            rotation: 'auto'
          },
          title: {
            text: 'km/h'
          },
          plotBands: [{
            from: 0,
            to: 120,
            color: '#55BF3B' // green
          }, {
            from: 120,
            to: 160,
            color: '#DDDF0D' // yellow
            }, {
            from: 160,
            to: 200,
            color: '#DF5353' // red
            }]
        },

        series: [{
          name: 'Speed',
          data: [80],
          tooltip: {
            valueSuffix: ' km/h'
          }
        }]
        },

        // Add some life

        function (chart) {
            if (!chart.renderer.forExport) {
            setInterval(function () {
                var point = chart.series[0].points[0],
              newVal,
              inc = Math.round((Math.random() - 0.5) * 20);
                    newVal = point.y + inc;
              if (newVal < 0 || newVal > 200) {
                newVal = point.y - inc;
              }
                    point.update(newVal);
                }, 3000);
          }
        });
    </script>
    @include('include.profile_scripts')
  @endsection

@endsection