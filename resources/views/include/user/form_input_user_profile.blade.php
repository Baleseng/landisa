
		<div id="modal">
      <div id="main-cropper">
        <img class="profile-pic fa fa-user" src="" alt=""/>
      </div>

      <a class="button actionUpload">
        <span class="upload-button"><i class="fa fa-camera"></i>Upload</span>
        <input id="file" type="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" value="{{ old('file') }}" name="image" accept="image/*">
      </a>

      <button class="actionDone">Done</button>
   		<button class="actionCancel">Cancel</button>
   	</div>

    <div class="form-btn-wrap">
      <button type="submit" class="primarybtn">{{ __('Register') }}</button>
    </div>

