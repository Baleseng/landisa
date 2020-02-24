@extends('layouts.admin.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Writer | Add')

@section('style')
  @include('include.admin.add_edit_styles')
@endsection

@section('searchfield')
  @include('include.admin.header_search_news')
@endsection

@section('menubutton')
  @include('include.admin.header_section_writer_button')
@endsection

@section('content')

	@if (session('status'))
		{{ session('status') }}
	@endif

  <div class="admin-container">
  	
    <form method="POST" action="{{ url('writer/news')}}">
  
      {{ csrf_field() }}
      
      <div class="addedit-wrap">
        <div class="addedit-create-title">Create New Article</div>

        <div class="addedit-input-fields">
          <div class="addedit-input-option">
            <select name="section">
              <option selected='selected'>Choose Section</option>
              <option value="extrovert">Extrovert</option>
              <option value="enthusiast">Enthusiast</option>
              <option value="backpacker">Backpacker</option>
              <option value="gearhead">Gearhead</option>
            </select>
            <span class="errorLabel"></span>
          </div>
        </div>

        <div class="addedit-input-fields">
          <div class="crop-image-wrap">
            <label>Select image to crop</label>
            <div class="crop-image-btn-wrap">

              <label id="#bb"><i class="fa fa-cloud-upload"></i> Upload
                <input type="file" id="image" size="60" name="article_img" value="{{ $news->article_img }}">
              </label> 

              <div id="upload-demo"></div>
            </div>
          </div>
        </div>
        
        <div class="addedit-input-fields">
          <div class="addedit-input-text-title">
            <label>Article Headline</label>
            <textarea name="title" class="addedit-title">{{ $news->title }}</textarea>
          </div>
          <div class="addedit-input-text-synopsis">
            <textarea name="full_article" class="maxarticle" id="editor" rows="35">{{ $news->full_article }}</textarea>
          </div>
        </div>

        <input type="hidden" value="{{ Auth::user()->id }}" name="writer_id"/>
        <input type="hidden" value="{{ $geoip->getIP() }}" name="ip"/>
        <input type="hidden" value="{{ $geoip->getCountryCode() }}" name="flag"/>
        <input type="hidden" value="{{ $geoip->getCountry() }}" name="country"/>
        <input type="hidden" value="{{ $geoip->getRegion() }}" name="region"/>
        <input type="hidden" value="{{ $geoip->getCity() }}" name="city"/>

        <input type="hidden" value="pending" name="status"/>

        <div class="addedit-submi-btn">
          <button type="submit" class="addedit-submitbtn">Create Article</button> 
          <a class="addedit-cancelbtn" href="{{ url('/writer/news') }}">Cancel Article</a>
        </div>

      </div>
    </form>
  </div>

@section('script')
  @include('include.admin.add_edit_scripts')
@endsection

@endsection