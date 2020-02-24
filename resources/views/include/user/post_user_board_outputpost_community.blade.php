<div class="post_user_share_article_post">{{ $p->post }}</div>
<div class="post_user_community_article_col_user">
  <div class="post_user_community_article_col_img">
    <img src="{{ URL::asset('images/users/'.$p->article_img) }}">
  </div>
</div>
<div class="post_user_community_article_col_title">
  <a href="">{{ $p->title }}</a>  
  <span>{{ $p->postwrapper }} Member | {{ $p->created_at->diffForHumans() }}</span>
  <div class="post_user_community_article_col_name">{{ $p->name }} {{ $p->surname }}</div>
</div>
