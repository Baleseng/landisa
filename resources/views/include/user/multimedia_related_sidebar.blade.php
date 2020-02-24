  <div class="gallery-list-header">
    <a href="">Related Content</a>
  </div>
  <div class="gallery-list-content scrollbar-container">
    <div class="gallery-list-row">
      <div class="gallery-list-block">
        <img src="https://cms.mqoqowa.africa/images/articles/{{$content->article_img}}" />
        <div class="multimedia-btn-id fa fa-{{ $content->section }}"></div>
      </div>

      <div class="gallery-list-title">
        <a href="">{{ $content->title }}</a>
       
        <!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
        <span>{{ $content->subsection }} | {{ $content->created_at}}</span>

        <ul>
          <li><dl class="fa fa-eye"></dl> <b> {{ views($content)->unique()->count() }} </b></li>
          <li><dl class="fa fa-comment"></dl> <b>0</b></li>
          <li><dl class="fa fa-share-square-o"></dl> <b>0</b></li>
        </ul>
        
      </div>
    </div>
  </div>


