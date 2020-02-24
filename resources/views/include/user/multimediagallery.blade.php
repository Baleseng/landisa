	<section class="gallery" id="article">

  	@foreach (json_decode($content->file_name) as $content)
 
	    <div v-fo="img in images">
	      <div class="content-multimedia-img">
	        <img src="https://cms.mqoqowa.africa/images/articles/{{ $content }}"/>
	      </div>
	    </div>

    @endforeach 

  </section>







