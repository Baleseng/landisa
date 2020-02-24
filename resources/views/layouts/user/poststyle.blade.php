<script>
	window.csrf = "{{ csrf_token() }}";
	@if (Auth::user())
		window.user = {
			"name":"{{ Auth::user()->name }}",
			"surname":"{{ Auth::user()->surname }}",
			"avator":"{{ Auth::user()->avator }}",
			"email":"{{ Auth::user()->email }}",
			"id":"{{ Auth::user()->id }}"
		};
	@endif
</script>

	<link href="{{ url('css/chatroom.css') }}" rel="stylesheet">
	
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-more.js"></script>
	<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
	<!-- Styles -->
	<link href="{{ url('css/slick.css') }}" rel="stylesheet">

  <!-- Scripts -->
  <script>
		window.Laravel = {!! json_encode([
			'csrfToken' => csrf_token(),
		]) !!};
  </script>





