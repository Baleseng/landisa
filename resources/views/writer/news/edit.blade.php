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

@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif

  <div class="admin-container">

    <!-- <div class="admin-back-btn">
      <a href="{{ url('news') }}" target="_parent">
        <i class="fa fa-arrow-circle-left" ></i> News / Add
      </a>
    </div> -->
    
    <form method="POST" action="{{ url('news/'.$news->id) }}">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}
      <div class="addedit-wrap">
        <div class="addedit-create-title">Create New Article</div>

        <div class="addedit-input-fields">
          <div class="addedit-input-option">
            <select name="section">
              <option selected='selected' value="{{ $news->section }}">{{ $news->section }}</option>
              <option value="headlines">Headlines</option>
              <option value="entrepreneur">Entrepreneur</option>
              <option value="fanatic">Fanatic</option>
              <option value="petrolhead">Petrolhead</option>
              <option value="extrovert">Extrovert</option>
              <option value="enthusiast">Enthusiast</option>
              <option value="backpacker">Backpacker</option>
              <option value="gearhead">Gearhead</option>
              <option value="9">Multimedia</option>
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

        <input type="hidden" value="pending" name="status"/>
        <div class="addedit-submi-btn">
          <button type="submit" class="addedit-submitbtn">Edit Article</button> 
          <a class="addedit-cancelbtn" href="{{ url('news/preview/'. $news->id . '-' . str_replace(' ', '-', $news->title)) }}">Cancel Article</a>
        </div>

      </div>
    </form>

  </div>

@section('script')
  @include('include.admin.add_edit_scripts')
@endsection

@endsection