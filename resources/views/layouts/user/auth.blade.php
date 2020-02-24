<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- <title>{{ config('app.name', 'Triwink') }}</title> -->
		<title>@yield('title')</title>

		<!-- Scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		
		<link href="https://cms.mqoqowa.africa/css/loader.css" rel="stylesheet" media="all" >
	  <script type="text/javascript">
	  	jQuery(window).load(function() { // makes sure the whole site is loaded
				jQuery("#status").fadeOut(); // will first fade out the loading animation
				jQuery("#preloader").delay(500).fadeOut("slow"); // will fade out the white DIV that covers the website.
			})
	  </script>

  	<link href="https://cms.mqoqowa.africa/css/auth.css" rel="stylesheet">

		<link href="https://cms.mqoqowa.africa/images/favicon/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180">
		<link href="https://cms.mqoqowa.africa/images/favicon/favicon-32x32.png" rel="icon" type="image/png" sizes="32x32">
		<link href="https://cms.mqoqowa.africa/imagess/favicon/favicon-16x16.png" rel="icon" type="image/png" sizes="16x16">
		<link href="https://cms.mqoqowa.africa/images/favicon/site.webmanifest" rel="manifest">

	<!-- Styles -->
	
    <link href="{{ url('css/reset.css') }}" rel="stylesheet" media="all" >
    <link href="{{ url('css/v4-shims.css') }}" rel="stylesheet">
  	<link href="{{ url('css/fontawesome.css') }}" rel="stylesheet">
		
	</head>
		<body>

				<div id="preloader">
				  <div id="status">&nbsp;</div>
				</div>
				
				<section class="demo">
					<div class="wrapper">
					  <div class="reg-col-container row">

				    	@yield('content')

				  	</div>
					</div>
				</section>

			<script scr="{{ url('js/app.js') }}" defer></script>

		</body>
</html>