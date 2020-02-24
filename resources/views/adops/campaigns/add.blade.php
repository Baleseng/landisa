@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Add | Campaigns')

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

    <form method="POST" action="{{ url('/campaigns') }}">
      {{ csrf_field() }}

      <input type="hidden" value="{{ Auth::user()->id }}" name="operator_id"/>
      <input type="hidden" value="{{ Auth::user()->name }} {{ Auth::user()->surname }}" name="operator_name"/>
      <input type="hidden" value="{{ Auth::user()->email }}" name="operator_email"/>
      <input type="hidden" value="{{ Auth::user()->avator }}" name="operator_avator"/>
      <input type="hidden" value="{{ Auth::user()->region }}" name="operator_region"/>
      <input type="hidden" value="{{ Auth::user()->city }}" name="operator_city"/>


      <div class="addedit-wrap">

        <div class="addedit-create-title">Create New Campaign</div>

        <div class="addedit-input-fields">
          <div class="addedit-input-text">
            <label class="input-text">Campaign Name</label>
            <textarea name="campaign_name" class="addedit-title">{{ $ads->campaign_name }}</textarea>
          </div>
        </div>

        <div class="addedit-input-fields">
          <div class="addedit-input-checkbox">
            <label class="input-text">Campaign Name</label>
            <label class="switch">
              <input type="checkbox">
              <span class="slider round"></span>
            </label>
          </div>
        </div>

        <input type="hidden" value="inactive" name="campaign_delivery"/>
        <div class="addedit-btn">
          <button type="submit" class="addedit-submit-btn">Create Campaign</button> 
          <a class="addedit-cancel-btn" href="{{ url('/') }}"><i class="fa fa-times"></i> Cancel</a>
        </div>
    	</div>
    </form>

  </div>

@section('script')
  @include('include.add_edit_scripts')
@endsection

@endsection