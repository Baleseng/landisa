@extends('layouts.admin.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Reports | Campaigns ')

@section('style')
  @include('include.admin.dashboard_campaign_charts_styles')
@endsection

@section('searchfield')
  @include('include.admin.header_search_news')
@endsection

@section('menubutton')
  @include('include.admin.header_section_'.$url.'_button')
@endsection

@section('content')

	@if (session('status'))
		{{ session('status') }}
	@endif

  <div class="admin-container">

  </div>

@section('script')
  @include('include.admin.dashboard_campaign_charts_scripts')
@endsection

@endsection