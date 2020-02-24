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

    <form method="post" action="{{ url('media/'.$media->id) }}" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    {{csrf_field()}}

    <div class="addedit-wrap">
      <div class="addedit-create-title">Create New Article</div>
      
      <div class="addedit-input-fields">
        <div class="addedit-input-option">
          <select name="subsection">
            <option value='{{ $media->subsection }}' selected='selected'>{{ $media->subsection }}</option>
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
        </div>
      </div>
        
      <div class="addedit-input-fields">
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
              
              <label class="container">
                <input type="radio" name="cover_img" value="inactivecomment" id="true" checked="checked" />
                <span class="checkmark"></span>
              </label>
              
            </div>
          </div>
        </div>   
      </div>

      <div class="addedit-input-fields">
        <div class="addedit-input-text-title">
          <label>Article Headline</label>
          <textarea name="title" class="addedit-title">{{ $media->title }}</textarea>
        </div>
        <div class="addedit-input-text-synopsis">
          <label>Article Headline</label>
          <textarea name="synopsis" class="maxarticle" id="editor" rows="35">{{ $media->synopsis }}</textarea>
        </div>
      </div>

      <input type="hidden" value="{{ Auth::user()->id }}" name="writer_id"/>
      <input type="hidden" value="{{ Auth::user()->name }} {{ Auth::user()->surname }}" name="writer_name"/>
      <input type="hidden" value="{{ Auth::user()->email }}" name="writer_email"/>
      <input type="hidden" value="{{ Auth::user()->avator }}" name="writer_avator"/>
      <input type="hidden" value="{{ Auth::user()->region }}" name="writer_region"/>

      <input type="hidden" value="multimedia" name="category"/>
      <input type="hidden" value="gallery" name="section"/>
      <input type="hidden" value="pending" name="status"/>

      <div class="addedit-submi-btn">
        <button type="submit" class="addedit-submitbtn">Create Gallery</button> 
        <a class="addedit-cancelbtn" href="{{ url('media/preview/'. $media->id . '-' . str_replace(' ', '-', $media->title)) }}">Cancel</a>
      </div>
    </div>
      
  </form>        
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $(".btn-add").click(function(){ 
        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
              $('#profile-img-tag').attr('src', e.target.result);
            }
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