<div class="project-wc-mainwrap">
  <div class="project-wc-logo-wrap">
    <div class="project-wc-logo">
      <img src="{{ URL::asset('images/worldcup/logo.png') }}">
    </div>
    <div class="project-wc-cd">
      <div class="project-wc-cd-heading">Count down to the next Match</div>
      
      <div class="counter">
        <div id='countDown'>
          <div id='day'><input type='text' id='daysM' size='1'/><span>Days</span></div>
          <div id='hrs'><input type='text' id='hoursM' size='1'/><span>Hrs</span></div>
          <div id='min'><input type='text' id='minutesM' size='1'/><span>Min</span></div>
          <div id='sec'><input type='text' id='secondsM' size='1'/><span>Sec</span></div>
        </div>
      </div>

    </div>
  </div>

  <div class="project-wc-live-wrap">
    <div class="project-wc-live-title">Commentary Russia vs South Africa</div>
    <div class="project-wc-live-feed-input row">
      <select id="feedtime_entered"></select>
      <textarea id="feed_entered" placeholder="Feed In Live Action" maxlength="150" rows="2"></textarea>
      <button onclick="submitfeed();" class="fa fa-pencil-square"></button>
    </div>

    <div class="project-wc-live-feed scrollbar-container">
      <div id="showfeed" class="project-wc-live-feed-row">

        @foreach ( $wcfeed as $feed )
        <div class="project-wc-live-feed-col-1">'{{ $feed->timer }}</div>   
        <div class="project-wc-live-feed-col-3">
          <div class="project-wc-live-feedreporter">Commentary</div>
          <div class="project-wc-live-newsfeed">{{ $feed->feed }}</div>
        </div>
        @endforeach
        
      </div>
    </div>
  </div>

  <div class="project-wc-tabs">

    <div class="project-wc-tab">
      <input type="radio" id="tab-1" name="tab-group-1" checked>
      <label for="tab-1" id="standing">
        Standings
      </label>
      <div class="content">
        @include('include.project_wc_standing')
      </div> 
    </div>

    <div class="project-wc-tab">
      <input type="radio" id="tab-2" name="tab-group-1">
      <label for="tab-2" id="highlights">
        Highlights
      </label>
      <div class="content"> </div> 
    </div>

    <div class="project-wc-tab">
      <input type="radio" id="tab-3" name="tab-group-1">
      <label for="tab-3" id="matches">
        Match
      </label>
      <div class="content"> </div> 
    </div>

    <div class="project-wc-tab">
      <input type="radio" id="tab-4" name="tab-group-1">
      <label for="tab-4" id="status">
        Status
      </label>
      <div class="content"> </div> 
    </div>

  </div>

</div>

<div class="project-wc-news-title">
  Latest News From FIFA World Cup
</div>
<section class="responsive slider">
  @foreach ($wcnews->where('subsection', '=', 'News') as $news)
  <div> 
    <div class="projectwc-btn-id"></div>
    <div class="slick-img-wrap">
      <img src="{{ asset('images/articles/'.$news->article_img) }}" />
    </div>

    <p class="multimedia">
      <a href="@include('include.projectwchyperlink')">
        {{ $news->title }}    
      </a>
    </p>
    
    <!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
    <span>{{ $news->section }} | {{ $news->publish_date }}</span>

    <ul>
      <li><dl class="fa fa-eye"></dl> <b>0</b></li>
      <li><dl class="fa fa-comment"></dl> <b>0</b></li>
      <li><dl class="fa fa-share-square-o"></dl> <b>0</b></li>
    </ul>
  </div>
  @endforeach
</section>


      

