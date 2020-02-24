@extends('layouts.user.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Writer | ' . $news->title )

@section('style')
  @include('include.preview_upload_publish_styles')
@endsection

@section('searchfield')
  @include('include.admin_header_search_news')
@endsection

@section('content')

@if (session('status'))
  {{ session('status') }}
@endif

  
   <section class="cropimg">
    <div class="admin-card-wrapper">
      
      <div class="articles-section-headline">
        <a href="#">{{ $news->title }}</a>
        <span>{{ $news->section }} | {{ $news->subsection }}</span>
      </div>

      <div class="crop-image-wrap">
         <!-- <div id="preview-crop-image" class="crop-image fa fa-file-image"></div> -->
        <div class="crop-image-btn-wrap">
          <div class="crop-image-select">Select image to crop:</p>
          <form method="POST" action="">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <label id="#bb"><i class="fa fa-file-image"></i> Upload
              <input type="file" id="image" size="60" name="article_img" value="{{ $news->article_img }}">
            </label> 
            <button type="submit" class="submitbtn"><i class="fa fa-paper-plane"></i> Save</button>
            <a href="{{ url('/') }}" class="cancelbtn"><i class="fa fa-times"></i> Cancel</a>
          </form>
        </div>
      </div>
      <div id="upload-demo"></div>

    </div>
  </section>


<!-- JavaScripts -->

  <script type="text/javascript">
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    var resize = $('#upload-demo').croppie({
      enableExif: true,
      enableOrientation: true,
      viewport: { 
        width: 500,
        height: 250,
        type: 'rectangle'
      },
      boundary: {
        width: 600,
        height: 300
      }
    });

    $('#image').on('change', function () { 
      var reader = new FileReader();
      reader.onload = function (e) {
        resize.croppie('bind',{
          url: e.target.result
        }).then(function(){
          console.log('jQuery bind complete');
        });
      }
      reader.readAsDataURL(this.files[0]);
    });

    $('.submitbtn').on('click', function (ev) {
      resize.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function (img) {
        $.ajax({
          url: "{{ action('NewsController@upload', $news->id) }}",
          type: "POST",
          data: {"image":img},
          success: function (data) {
            html = '<img src="' + img + '" />';
            $("#preview-crop-image").html(html);
          }
        });
      });
    });
  </script>

@section('script')
@include('include.preview_upload_publish_scripts')
@endsection

@endsection