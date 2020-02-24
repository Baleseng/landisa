<div class="post_user_share_article_col_img">
	<div class="post_user_share_article_post">{{ $p->post }}</div>
	<img src="https://cms.mqoqowa.africa/images/articles/{{$p->article_img}}">
	<div class="post_user_share_article_col_title">
		<div class="post_user_share_btn_row">
		  <span class="fa fa-{{ $p->postsection }}"></span>
		  <div class="post_user_share_btn_col">
		  	<a class="post_user_share_heading" href="{{ $p->section }}/{{ $p->news_id }}-{{ $p->publish }}-{{ str_replace(' ', '-', $p->title) }}">{{ $p->title }}</a>
		  	<a class="post_user_share_section" href="{{ $p->section }}">{{ $p->section }}</a>
			</div>
		</div>
	  
	</div>
</div>