<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <link href="https://cms.mqoqowa.africa/images/favicon/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180">
    <link href="https://cms.mqoqowa.africa/images/favicon/favicon-32x32.png" rel="icon" type="image/png" sizes="32x32">
    <link href="https://cms.mqoqowa.africa/imagess/favicon/favicon-16x16.png" rel="icon" type="image/png" sizes="16x16">
    <link href="https://cms.mqoqowa.africa/images/favicon/site.webmanifest" rel="manifest">

    <link href="https://cms.mqoqowa.africa/css/admin.css" rel="stylesheet">
    

    <link href="https://cms.mqoqowa.africa/css/reset.css" rel="stylesheet" media="all" >
    <link href="https://cms.mqoqowa.africa/css/v4-shims.css" rel="stylesheet">
    <link href="https://cms.mqoqowa.africa/css/fontawesome.css" rel="stylesheet">

  </head>
  <body>
    <div class="flex-center position-ref full-height">
      <div class="content">
        
        <div class="m-b-md">
          <div class="logo">
            <img src="https://cms.mqoqowa.africa/images/logo/signageadmin.svg"/>
          </div>
        </div>

        <div class="links">
          <a href="{{ url('login/admin') }}">Admin</a>
          <span class="separetor"></span>
          <a href="{{ url('login/editor') }}">Editors</a>
          <span class="separetor"></span>
          <a href="{{ url('login/writer') }}">Writers</a>
          <span class="separetor"></span>
          <a href="{{ url('login/moderator') }}">Moderators</a>
          <span class="separetor"></span>
          <a href="{{ url('login/adops') }}">Adops</a>
        </div>

      </div>
    </div>
  </body>
</html>