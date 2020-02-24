<div class="user-wall-cover-preview">
    <form method="POST">
      
      {{ method_field('PATCH') }}
      {{ csrf_field() }}

      <div class="user-wall-cover-preview-label">
        <a href="javascript:changeProfile()" class="fa fa-cloud-upload-alt" id="image-label"></a>   
      </div>
      
      <input type="hidden" value="{{  Auth::user()->avator }}" name="avator"/>
      <input type="file" id="file" class="user-wall-cover-preview-input" onclick="document.getElementById('idcover').style.display='block'" style="display: none"/>
      <input type="hidden" id="file_name" name="coverimg"/>

      <div id="idcover" class="modal-cover">
        <div class="modal-cover-content">
          
          <div class="user-preview-img" id="file">  
            <img id="preview_image" class="fa fa-file-image" src="{{ URL::asset('images/users/'.Auth::user()->coverimg) }}"/>
            <i id="loading" class="fa fa-spinner fa-spin fa-3x fa-fw article-upload-loader"></i>
          </div>
          
          <button type="submit" class="modal-cover-save" onclick="document.getElementById('idcover').style.display='none'"><i class="fa fa-save"></i> Save</button>
           <a href="{{ url('wall/'. Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname) }}" class="modal-cover-cancel"><i class="fa fa-times"></i> Cancel</a>
        </div>
      </div>

    </form>
  </div>