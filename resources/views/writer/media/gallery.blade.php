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
  @include('include.admin.header_section_' .$url. '_button')
@endsection

@section('content')

  @if (session('status'))
    {{ session('status') }}
  @endif

  <div class="admin-container">

    <form method="post" action="{{url('media/gallery')}}" enctype="multipart/form-data">
    {{csrf_field()}}

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
            <option value="gearhead">Multimedia</option>
          </select>
          <span class="errorLabel"></span>
        </div>
      </div>

      <div class="addedit-input-fields">
        <div class="addedit-input-text-title">
          <label>Article Headline</label>
          <textarea name="title" class="addedit-title"></textarea>
        </div>
      </div>


        
      <div class="addedit-input-fields">
        <label>Create a Gallery</label> 
        <div class="addedit-input-files row">  
          <div class="hdtuto control-group lst increment" >
            <button class="btn btn-add" type="button"><i class="fldemo fa fa-plus"></i> <b>Add</b></button>
          </div>
          <div class="clone hide">
            <div class="hdtuto control-group lst">
              <label id="#bb" class="button">
                <span class="btn-upload"><i class="fa fa-cloud-upload"></i> Upload</span>
                <input type="file" id="File" name="file_name[]" multiple="multiple" />
              </label>
              <img src="" id="profile-img-tag" width="200px" />
              <button class="btn btn-del" type="button"><i class="fldemo fa fa-trash"></i></button> 
            </div>
          </div>
        </div>
        @if (count($errors) > 0)
        <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
        @endif
        @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div> 
        @endif    
      </div>

      <div class="addedit-input-fields">
        <div class="crop-image-wrap">
          <label>Select image to crop</label>
          <div class="crop-image-btn-wrap">

            <label id="#bb"><i class="fa fa-cloud-upload"></i> Upload
              <input type="file" id="image" size="60" name="article_img" value="{{ $media->article_img }}">
            </label> 

            <div id="upload-demo"></div>
          </div>
        </div>
      </div>

      <div class="addedit-input-fields">
        <div class="addedit-input-text-synopsis">
          <label>Article Synopsis</label>
          <textarea name="synopsis" class="maxarticle" id="editor" rows="35"></textarea>
        </div>
      </div>

      <input type="hidden" value="{{ Auth::user()->id }}" name="writer_id"/>

      <input type="hidden" value="{{ $geoip->getCountryCode() }}" name="flag"/>
      <input type="hidden" value="{{ $geoip->getCountry() }}" name="country"/>
      <input type="hidden" value="{{ $geoip->getRegion() }}" name="region"/>
      <input type="hidden" value="{{ $geoip->getCity() }}" name="city"/>

      <input type="hidden" value="multimedia" name="category"/>
      <input type="hidden" value="gallery" name="section"/>
      <input type="hidden" value="pending" name="status"/>

      <div class="addedit-submi-btn">
        <button type="submit" class="addedit-submitbtn">Create Content</button> 
        <a class="addedit-cancelbtn" href="{{ url('media') }}">Cancel</a>
      </div>
 
    </div>
      
  </form>        
  </div>

  <script type="text/javascript">
    
    $(function () {
      
      $(":file").change(function () {
        
        if (this.files && this.files[0]) {
          var reader = new FileReader();
          reader.onload = imageIsLoaded;
          reader.readAsDataURL(this.files[0]);
        }

      });

    });

    function imageIsLoaded(e) {
      $('#myImg').attr('src', e.target.result);
    };

  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      
      $(".btn-add").click(function(){ 
        
        function readURL(input) {
          
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) { $('#profile-img-tag').attr('src', e.target.result); }
            reader.readAsDataURL(input.files[0]);
          }

        }

        var lsthmtl = $(".clone").html();
        $(".increment").after(lsthmtl);
        $("#File").change(function(){ readURL(this); });
      
      });

      $("body").on("click",".btn-del",function(){ 
        $(this).parents(".hdtuto control-group lst").remove();
      });

    });
  </script>

@section('script')
  @include('include.admin.add_edit_scripts')
@endsection

@endsection