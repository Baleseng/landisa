
@extends('layouts.auth')

@section('title', 'Personalisation')

@section('content')

	<section class="demo">
	  <div class="wrapper">
	    <div class="reg-mobihide-col-container row">
	      <h1>Personalise Section Content</h1>
	    </div>
	    <div class="reg-col-container">
	      <p>Select the first four section & the last four section in the order you would like see them.</p>
      	<form method="POST">

        {{ method_field('PATCH') }}

        {{ csrf_field() }}
	
		      @include('include.form_input_section_update')
		    
		    </form>
	    </div>
	  </div>
	</section>

<script src="http://34.241.65.213/js/highlight.js"></script>
<script src="http://34.241.65.213/js/option.js"></script>
@endsection
