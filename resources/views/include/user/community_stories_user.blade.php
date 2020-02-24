
  <div class="content-stories-img">
    <a href="">
      <img class="fa fa-user" src="{{ URL::asset('images/profile/users/'.$story->avator) }}">
    </a>
  </div>

  <div class="content-stories-heading">
    
    <a class="content-article-heading" href="@include('include.community_hyperlink')">{{ $story->title }}</a>
  
     <!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
    <span class="subsection">Community | {{ $story->name }} {{ $story->surname }}</span>

  </div>
  <div class="content-stories-status row">
     <ul>
      <li><i class="fa fa-eye"></i> <b>0</b></li>
      <li><i class="fa fa-comment"></i> <b>0</b></li>
      <li><i class="fa fa-share"></i> <b>0</b></li>
    </ul>
    <span class="published">{{ $story->created_at->diffForHumans() }}</span>
  </div>

