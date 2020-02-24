<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="@yield('description')">
  <meta name="keywords" content="@yield('keywords')">
  <meta name="author" content="@yield('author')">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Writer</title>
	<!-- Scripts -->

	<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	
 		<link href="{{ url('images/favicon/apple-touch-icon.png') }}" rel="apple-touch-icon" sizes="180x180">
		<link href="{{ url('images/favicon/favicon-32x32.png') }}" rel="icon" type="image/png" sizes="32x32">
		<link href="{{ url('imagess/favicon/favicon-16x16.png') }}" rel="icon" type="image/png" sizes="16x16">
		<link href="{{ url('images/favicon/site.webmanifest') }}" rel="manifest">

<!-- Styles -->
  	<link href="{{ url('css/admin.css') }}" rel="stylesheet">
  	<link href="{{ url('css/auth.css') }}" rel="stylesheet">

    <link href="{{ url('css/reset.css') }}" rel="stylesheet" media="all" >
    <link href="{{ url('css/v4-shims.css') }}" rel="stylesheet">
  	<link href="{{ url('css/fontawesome.css') }}" rel="stylesheet">
  
</head>

<div class="js" style="height:100%">
	<body>
		<!-- <div id="preloader"></div> -->
		<div class="admin-header-container">
				<div class="admin-header-wrap">
					<div class="logo-wrap">
					  <div class="logo">
					    <a href="{{ url('/') }}">
					      <img src="https://cms.mqoqowa.africa//images/logo/signageadmin.svg">
					    </a>
					  </div>
					</div>

					@include('include.admin.header_search_news')
					@include('include.admin.header_alerts_button')

					<div class="header-nav-btn">
				  	<span class="separetor hide"></span>

					  <div class="naviconbtn">
					    
					    <!-- <span class="iconbtn img-block" id="wall">
					    w<a href=""></a>
					    </span> -->

							@include('include.admin.header_section_admin_button')
							@include('include.admin.header_settings_button')

					  </div>
					</div>
						
				</div>
			</div>
	  
	@if (session('status'))
    {{ session('status') }}
  @endif


	<div class="flex-center position-ref full-height">
    <div class="content">
      
      <div class="m-b-md">
        <div class="logo">
          <img src="https://cms.mqoqowa.africa//images/logo/signageadmin.svg"/>
        </div>
      </div>

      <div class="links">
        <a href="{{ url($url.'/news') }}">Article Content</a>
        <span class="separetor"></span>
        <a href="{{ url($url.'/media') }}">Multimedia Content</a>
      </div>

    </div>
  </div>


	<script src="{{ URL::asset('js/preload.js') }}"></script>
  <script src="{{ URL::asset('js/admin.js') }}"></script>
  <script src="{{ URL::asset('js/togglebtn.js') }}"></script>

	<script type="text/javascript">
		$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } }); 
	</script>

	<script type="text/javascript"> 
    $('#search').on('keyup',function(){
      $value=$(this).val();
      $.ajax({ 
        type : 'get', 
        url : '{{URL::to('search')}}',
        data:{'search':$value}, 
        success:function(data){
          $('tbody').html(data);
        }
      });
    })
  </script>

</body>
</div>
</html>

