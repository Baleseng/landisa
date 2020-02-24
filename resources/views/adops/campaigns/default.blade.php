@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Campaigns')

@section('style')
  @include('include.add_edit_styles')
@endsection

@section('searchfield')
  @include('include.admin_header_search_news')
@endsection

@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif

  <div class="admin-container">

  </div>

@section('script')
  @include('include.add_edit_scripts')
@endsection

@endsection