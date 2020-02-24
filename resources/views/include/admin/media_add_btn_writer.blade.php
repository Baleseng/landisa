<a href="{{ url($url.'/media/suspended') }}" class="page-btn">Suspended</a>
<a href="{{ url($url.'/media/reviewed') }}" class="page-btn">Reviewed</a>
<a href="{{ url($url.'/media') }}" class="page-btn">Pending</a>
<!-- Trigger/Open The Modal -->

<span id="myBtn" class="modal_add-btn"><i class="fa fa-file-alt"></i> Add</span>

<!-- The Modal -->
<section id="myModal" class="modal">
	<!-- Modal content -->
	<div class="modal-conten-close"><i class="fa fa-remove"></i></div>
	
	<div class="modal-content ">	
  	<a class="modal-content-wrap-row-btn" href="{{ url($url.'/media/video') }}">
  		<i class="fa fa-file-video"></i>
  		<b>Video Content</b>
  	</a>

  	<a class="modal-content-wrap-row-btn" href="{{ url($url.'/media/vr') }}">
  		<i class="fa fa-file"></i>
  		<b>VR Content</b>
  	</a>

  	<a class="modal-content-wrap-row-btn" href="{{ url($url.'/media/gallery') }}">
  		<i class="fa fa-file-image"></i>
  		<b>Gallery Content</b>
  	</a>
  	
  	<a class="modal-content-wrap-row-btn" href="{{ url($url.'/media/audio') }}">
  		<i class="fa fa-file-audio"></i>
  		<b>Audio Content</b>
  	</a>
	</div>
	
</section>