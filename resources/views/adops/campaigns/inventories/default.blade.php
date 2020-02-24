@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Orders | Campaigns')

@section('style')
  @include('include.dashboard_campaign_charts_styles')
@endsection

@section('searchfield')
  @include('include.user.header_search_news')
@endsection

@section('menubutton')
  @include('include.header_section_'.$url.'_button')
@endsection

@section('content')

	@if (session('status'))
		{{ session('status') }}
	@endif

  <div class="admin-container">

  </div>

@section('script')
  @include('include.dashboard_campaign_charts_scripts')
@endsection

@endsection