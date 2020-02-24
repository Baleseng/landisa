  <section class="gallery" id="article">

  	@foreach (json_decode($id->file_name) as $content)
 
    <div v-fo="img in images">
      <div class="content-multimedia-img">
        <img src="https://writer.triwink.app/images/articles/{{ $content }}"/>
      </div>
    </div>

    @endforeach 

  </section>