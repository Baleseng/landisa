  <div class="community-widget-col-0">

    <div class="community-widget-btn">
      <div class="community-widget-inner">
        <div class="community-widget-front community-community">
          <span class="community-widget-unlink">
            <i class="fa fa-users"></i>
          </span>
        </div>
        <div class="community-widget-back">
          <a href="{{ url( 'community' ) }}" class="community-widget-link">
            My community
          </a>
        </div>
      </div>
    </div>

    <div class="community-widget-btn">
      <div class="community-widget-inner">
        <div class="community-widget-front community-story">
          <span class="community-widget-unlink">
            <i class="fa fa-file-text"></i>
          </span>
        </div>
        <div class="community-widget-back">
          <a href="{{ url( 'community/add/story' ) }}" class="community-widget-link">
            Add a story
          </a>
        </div>
      </div>
    </div>

    <div class="community-widget-btn">
      <div class="community-widget-inner">
        <div class="community-widget-front community-gallery">
          <span class="community-widget-unlink">
            <i class="fa fa-camera"></i> 
          </span>
        </div>
        <div class="community-widget-back">
          <a href="{{ url( 'community/add/gallery' ) }}" class="community-widget-link">
            Create Gallery
          </a>
        </div>
      </div>
    </div>

    <div class="community-widget-btn">
      <div class="community-widget-inner">
        <div class="community-widget-front community-video">
          <span class="community-widget-unlink">
            <i class="fa fa-video-camera"></i> 
          </span>
        </div>
        <div class="community-widget-back">
          <a href="{{ url( 'community/add/video' ) }}" class="community-widget-link">
            Upload Video
          </a>
        </div>
      </div>
    </div>

  </div>


  <div class="community-widget-col-1 communiy-side-margin">
    <div class="communty-multimedia">
      
      <div class="community-widget-h3-media">Trending Community Multimedia </div>
     
      <ul class="community-widget-ul-media">
        @foreach ($media->where('category', '=', 'multimedia')->take(9) as $articles)
          <li class="community-widget-li-media">
            <img src="https://cms.mqoqowa.africa/images/articles/{{$articles->article_img}}">
            <a href="@include('include.user.multimediahyperlink')" class="community-widget-info">
              <i class="fa fa-{{$articles->section}}"></i>
            </a>
          </li>
        @endforeach
      </ul>

    </div>
  </div>



  <div class="community-widget-col-1">

    <div class="community-widget-story"> 
      
      <div class="community-widget-h3">Community Story of the day</div>

      <div class="community-widget-img">
        <a href="@include('include.user.articles_hyperlink')">
          <img src="https://cms.mqoqowa.africa/images/articles/{{$articles->article_img}}"/>
        </a>
      </div>
      <div class="community-widget-heading">   
        
        <a class="community-widget-title" href="">{{ $articles->title }}</a>
        <!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
        <span class="subsection">Community | Articles</span>
      </div>

      <p class="community-widget-synop">{{ $articles->synopsis }}</p>

      <div class="community-widget-status row">
         <ul>
          <li><i class="fa fa-eye"></i> <b> </b></li>
          <li><i class="fa fa-comment"></i> <b>0</b></li>
          <li><i class="fa fa-share"></i> <b>0</b></li>
        </ul>
        <span class="published">{{ $articles->created_at->diffForHumans() }}</span>
      </div>
    </div>
  </div>
