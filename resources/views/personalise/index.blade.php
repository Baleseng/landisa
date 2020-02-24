
@extends('layouts.auth')

@section('title', 'Personalisation')

@section('content')

	<section class="demo">
	  <div class="wrapper">
	    <div class="reg-mobihide-col-container">
	    	<div class="personalise-btn">
	      	<a href="{{ action('SectionController@edit', Auth::user()->id) }}">
	      		<i class="fa fa-th"></i>
	      		<b>Personalize Section Content</b>
	      	</a>
	      </div>
	    </div>
	  </div>
	</section>

@endsection
