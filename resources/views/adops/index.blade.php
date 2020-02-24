<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cms | Triwink</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" sizes="180x180" href="https://cms.mqoqowa.africa//images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://cms.mqoqowa.africa//images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://cms.mqoqowa.africa//imagesimages/favicon/favicon-16x16.png">
    <link rel="manifest" href="https://cms.mqoqowa.africa//images/favicon/site.webmanifest">

    <link href="https://cms.mqoqowa.africa//css/admin.css" rel="stylesheet">
    
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet" media="all" >
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/v4-shims.css') }}" rel="stylesheet">

  </head>
  <body>
    <div class="flex-center position-ref full-height">
      <div class="content">
        
        <div class="m-b-md">
          <div class="logo">
            <img src="https://cms.mqoqowa.africa//images/logo/signageadmin.svg"/>
          </div>
        </div>

        <div class="links">
          <a href="{{ url('campaigns/active') }}">Active</a>
          <span class="separetor"></span>
          <a href="{{ url('campaigns/inactive') }}">Inactive</a>
          <span class="separetor"></span>
          <a href="{{ url('campaigns/archive') }}">Archive</a>
        </div>

      </div>
    </div>
  </body>
</html>