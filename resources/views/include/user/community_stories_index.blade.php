<div class="community-stories-wrap community-color-theme">
  
  <div class="community-stories-subsection"></div>
  
  <div class="community-stories-image">
    <a href="{{ url('wall/') }}">
      <img class="fa fa-user" src="{{ URL::asset('images/profile/users/'.$story->profileimg) }}">
    </a>
  </div>
  
  <div class="community-stories-heading">

    <a href="community/{{ $story->id }}-{{ str_replace(' ', '-', $story->title) }}">{{ $story->title }}</a>
  </div>

  <div class="community-stories-synopsis">
    <a href="{{ url('community/'. $story->id . '-' . str_replace(' ', '-', $story->title)) }}">{!! $story->story !!}</a>
  </div>

  <span class="published">{{ $story->created_at->diffForHumans() }}</span>

  <div class="community-stories-info">
    <!-- SUBSECTION / COUNTING VIERS, COMMENTS & SHARES -->
    <ul>
      <li><i class="fa fa-eye"></i> <b>0</b></li>
      <li><i class="fa fa-comment"></i> <b>0</b></li>
      <li><i class="fa fa-share"></i> <b>0</b></li>
    </ul>  
  </div>

</div>


