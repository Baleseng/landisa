@foreach ( $news->where('section', '=',  Auth::user()->section2)->take(1) as $articles )
 @include('include.post_user_board_article_section')
@endforeach