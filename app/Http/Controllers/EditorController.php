<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use App\Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Charts\HighChart;

use App\AfricanCountries;
use App\Africa;

use App\Media;
use App\News;

use App\Editor;
use App\Writer;
use App\User;

use App\Community;
use App\Download;
use App\Messages;
use App\Comment;
use App\Moods;
use App\Email;
use App\Post;

class EditorController extends Controller
{

	/**
  * Create a middleware instance.
  *
  * @return void
  */
	public function __construct(){
    $this->middleware('auth:editor');
  }

  public function default(){
    $url = 'editor';

    $users = User::get();
    $news = News::latest()->where('status','publish')->get();
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartrealtime = new HighChart;
    $chartpieviewed = new HighChart;
    $chartpiedevice = new HighChart;
    $chartbarview = new HighChart;
    $chartcolumn = new HighChart;
    $chartspline = new HighChart;
   
    $chartrealtime->labels(['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00','07:00', '08:00', '09:00', '10:00', '11:00', '12:00']);
    $chartrealtime->dataset('Real Time Live', 'spline', [1000, 1000, 900, 950, 1030, 1040, 900, 1000, 1300, 1350, 1310, 1360, 1500])->color('rgba(242,101,34,.85)');

    $chartspline->labels(['Mon', 'Tue', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun']);
    $chartspline->dataset('Last Week', 'areaspline', [15, 10, 13, 13, 12, 17, 15])
    ->color('rgba(204,204,204,.5)');
    $chartspline->dataset('This Week', 'areaspline', [10])
    ->color('rgba(242,101,34,.5)');

    $chartcolumn->labels(['Signed In', 'Active', 'Inactive', 'Signed Out']);
    $chartcolumn->dataset('Registered Users', 'column', [10, 3, 5, 5])->color('rgba(242,101,34,.85)');

    $chartpieviewed->labels(['', '']);
    $chartpieviewed->dataset('Number of Users', 'pie', [45, 35])
             ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)']);

    $chartbarview->labels(['18-24', '25-34', '35-44', '45-55', '55+']);
    $chartbarview->dataset('Female', 'bar', [30, 50, 35, 10, 5])->color('rgba(242,101,34,.85)');
    $chartbarview->labels(['18-24', '25-34', '35-44', '45-55', '55+']);
    $chartbarview->dataset('Male', 'bar', [35, 45, 28, 105, 2])->color('rgba(64,83,101,.85)');

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
             ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('editor.default', compact(
        
        'url',
        'users',
        'africa',
        'country', 
        'chartrealtime', 
        'chartpieviewed', 
        'chartpiedevice',
        'chartcolumn',
        'chartbarview', 
        'chartspline' 
    ));
  }

/*
  |--------------------------------------------------------------------------
  | Editor Controller Functions
  |--------------------------------------------------------------------------
*/
  public function profile(Editor $id){
    $url = 'editor';
    return view('editor.editors.profile', compact('id','url'));
  }

/*
  |--------------------------------------------------------------------------
  | News Controller Functions
  |--------------------------------------------------------------------------
*/
  public function news_pending(Request $request, News $d){
    $url = 'editor'; 
    
    $counts = News::where('status','pending')->get();

    $viewsn = News::latest()->where('status','publish')->get();

    $id = News::latest()->where('status', 'pending')->Paginate(10);

    $writer = Writer::find($d->writer_id);
    $editor = Editor::find($d->editor_id);

    $chartcolumn = new HighChart;
    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('editor.news.pending', compact(
      'url', 
      'id', 
      'counts', 
      'viewsn',
      'writer',
      'editor',
      'chartcolumn'
    ));
  }

  public function news_reviewed(Request $request){
    $url = 'editor'; 
    
    $counts = News::where('status','review')->where('editor_id', auth()->id())->get();

    $viewsn = News::latest()
               ->where('editor_id', auth()->id())->where('status','publish')->get();

    $id = News::latest()->where('editor_id', auth()->id())
                          ->where('status','review')
                          ->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('editor.news.reviewed', compact('url', 'id', 'counts', 'viewsn','chartcolumn'));
  }

  public function news_suspended(Request $request){
    $url = 'editor'; 

    $counts = News::where('status','suspend')->where('editor_id', auth()->id())->get();

    $viewsn = News::latest()
               ->where('editor_id', auth()->id())->where('status','publish')->get();

    $id = News::latest()->where('editor_id', auth()->id())
                          ->where('status','suspend')
                          ->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('editor.news.suspended', compact('url', 'id', 'counts', 'viewsn', 'chartcolumn'));
  }

  public function news_archived(Request $request){
    $url = 'editor'; 

    $counts = News::where('status','archive')->where('editor_id', auth()->id())->get();

    $viewsn = News::latest()
               ->where('editor_id', auth()->id())->where('status','publish')->get();

    $id = News::latest()->where('editor_id', auth()->id())
                          ->where('status','archive')
                          ->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('editor.news.archived', compact('url', 'id', 'counts', 'viewsn', 'chartcolumn'));
  }

  public function news_dashboard(News $id){
    $url = 'editor';
    $chartrealtime = new HighChart;
    $chartpieviewed = new HighChart;
    $chartcolumn = new HighChart;
    $chartpiedevice = new HighChart;
    $chartbar = new HighChart;

    $chartrealtime->labels(['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00','07:00', '08:00', '09:00', '10:00', '11:00', '12:00']);
    $chartrealtime->dataset('Real Time Live', 'spline', [5, 10, 15, 20, 25, 10, 15])
    ->color('rgba(242,101,34,.85)');

    $chartbar->labels(['18-24', '25-34', '35-44', '45-55', '55+']);
    $chartbar->dataset('Female', 'bar', [1, 3, 50, 35, 8])->color('rgba(242,101,34,.75)');
    $chartbar->labels(['18-24', '25-34', '35-44', '45-55', '55+']);
    $chartbar->dataset('Male', 'bar', [2, 1, 45, 28, 10])->color('rgba(64,83,101,.75)');

    $chartpieviewed->labels(['', '']);
    $chartpieviewed->dataset('Number of Users', 'pie', [45, 35])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)']);

    $chartcolumn->labels(['Comment', 'Sharing', 'Mood Button', 'Messaging', 'Downloads']);
    $chartcolumn->dataset('Female', 'column', [10, 3, 5, 2, 5])->color('rgba(242,101,34,.75)');
    $chartcolumn->labels(['Comment', 'Sharing', 'Mood Button', 'Messaging', 'Downloads']);
    $chartcolumn->dataset('Male', 'column', [3, 5, 10, 3, 1])->color('rgba(64,83,101,.75)');

    $chartpiedevice->labels(['','','']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('editor.news.dashboard', compact('url','id', 'chartrealtime', 'chartpieviewed', 'chartcolumn', 'chartpiedevice','chartbar' ));
  }

  public function update(Request $request, News $id){
    
    News::find($id);

    $id->editor_id = $request->get('editor_id');

    $id->synopsis = $request->get('synopsis');

    $id->section = $request->get('section');
    
    $id->subsection = $request->get('subsection');

    $id->keywords = $request->get('keywords');
    $id->description = $request->get('description');

    $id->commentblock = $request->get('commentblock');

    $id->publish = $request->get('publish');
    
    $id->archive = $request->get('archive');
    
    $id->status = $request->get('status');

    $id->save();

    return back();
  }

  public function news_preview(News $id){
    $url = 'editor';
    return view('editor.news.preview', compact('url','id'));
  }

  public function news_timeline(News $id){
    $url = 'editor';
    return view('editor.news.timeline', compact('url','id'));
  }

  public function news_publish(News $id){
    $url = 'editor'; 
    News::find($id);
    return view('editor.news.publish',compact('url','id'));
  }


/*
  |--------------------------------------------------------------------------
  | Media Controller Functions
  |--------------------------------------------------------------------------
*/
  public function media_pending(Request $request){ 
    $url = 'editor';
    
    $counts = Media::where('editor_id', auth()->id())->where('status','pending')->get();

    $viewsm = Media::latest()
                   ->where('editor_id', auth()->id())
                   ->where('status','publish')->get();

    $id = Media::latest()->where('editor_id', auth()->id())
                            ->where('status', 'pending')->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('editor.media.pending', compact( 'url', 'id','counts','viewsm','chartcolumn'));
  }

  public function media_reviewed(Request $request){
    $url = 'editor';

    $counts = Media::where('editor_id', auth()->id())
                    ->where('status','review')->get();

    $viewsm = Media::latest()
                   ->where('editor_id', auth()->id())
                   ->where('status','publish')->get();

    $id = Media::latest()
                    ->where('editor_id', auth()->id())
                    ->where('status','review')->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('editor.media.reviewed', compact( 'url','id','counts','viewsm','chartcolumn'));
  }

  public function media_suspended(Request $request){ 
    $url = 'editor';

    $counts = Media::where('editor_id', auth()->id())
                    ->where('status','suspend')->get();

    $viewsm = Media::latest()
                   ->where('editor_id', auth()->id())
                   ->where('status','publish')->get();

    $id = Media::latest()
                    ->where('editor_id', auth()->id())
                    ->where('status','suspend')->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('editor.media.suspended', compact( 'url','id','counts','viewsm','chartcolumn'));
  }

  public function media_archived(Request $request){ 
    $url = 'editor';

    $counts = Media::where('editor_id', auth()->id())
                    ->where('status','suspend')->get();

    $viewsm = Media::latest()
                   ->where('editor_id', auth()->id())
                   ->where('status','publish')->get();

    $id = Media::latest()
                    ->where('editor_id', auth()->id())
                    ->where('status','suspend')->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('editor.media.archived', compact( 'url','id','counts','viewsm','chartcolumn'));
  }

  public function media_preview(Media $id){
    $url = 'editor';
    return view('editor.media.preview', compact( 'url','id'));
  }

  public function media_timeline(Media $id){
    $url = 'editor';
    return view('editor.media.timeline', compact( 'url','id'));
  }

  public function media_dashboard(Media $id){
    $url = 'editor';

    $chartrealtime = new HighChart;
    $chartpieviewed = new HighChart;
    $chartcolumn = new HighChart;
    $chartpiedevice = new HighChart;
    $chartbar = new HighChart;

    $chartrealtime->labels(['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00','07:00', '08:00', '09:00', '10:00', '11:00', '12:00']);
    $chartrealtime->dataset('Real Time Live', 'spline', [5, 10, 15, 20, 25, 10, 15])
    ->color('rgba(242,101,34,.85)');

    $chartbar->labels(['18-24', '25-34', '35-44', '45-55', '55+']);
    $chartbar->dataset('Female', 'bar', [1, 3, 50, 35, 8])->color('rgba(242,101,34,.75)');
    $chartbar->labels(['18-24', '25-34', '35-44', '45-55', '55+']);
    $chartbar->dataset('Male', 'bar', [2, 1, 45, 28, 10])->color('rgba(64,83,101,.75)');

    $chartpieviewed->labels(['', '']);
    $chartpieviewed->dataset('Number of Users', 'pie', [45, 35])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)']);

    $chartcolumn->labels(['Comment', 'Sharing', 'Mood Button', 'Messaging', 'Downloads']);
    $chartcolumn->dataset('Female', 'column', [10, 3, 5, 2, 5])->color('rgba(242,101,34,.75)');
    $chartcolumn->labels(['Comment', 'Sharing', 'Mood Button', 'Messaging', 'Downloads']);
    $chartcolumn->dataset('Male', 'column', [3, 5, 10, 3, 1])->color('rgba(64,83,101,.75)');

    $chartpiedevice->labels(['','','']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('editor.media.dashboard', compact( 'url','id', 'chartrealtime','chartpieviewed','chartcolumn', 'chartpiedevice','chartbar' ));
  }

/*
  |--------------------------------------------------------------------------
  | Writer Controller Functions
  |--------------------------------------------------------------------------
*/
  public function writer(){
    $url = 'editor';
    $writers = Writer::Paginate(10);
    $africa = Africa::get();
    $country = AfricanCountries::get();
    return view('editor.writers.index', compact('url','writers','africa', 'country'));
  }
  public function writer_profile(Writer $id){
    $url = 'editor';
    return view('editor.writers.profile', compact('id','url'));
  }

/*
  |--------------------------------------------------------------------------
  | User Controller Functions
  |--------------------------------------------------------------------------
*/
  public function user(){
    $url = 'editor';
    $users = User::Paginate(10);
    $africa = Africa::get();
    $country = AfricanCountries::get();
    return view('editor.users.index', compact('url','users','africa', 'country'));
  }

  public function user_profile(User $id){
    $url = 'editor';
    
    $json1 = User::find($id->section1);
    $section1 = json_decode($json1);

    $json2 = User::find($id->section2);
    $section2 = json_decode($json2);

    $json3 = User::find($id->section3);
    $section3 = json_decode($json3);

    $json4 = User::find($id->section4);
    $section4 = json_decode($json4);

    return view('editor.users.profile', compact(
      'url',
      'id',
      'section1',
      'section2',
      'section3',
      'section4'
    ));
  }

/*
  |--------------------------------------------------------------------------
  | Community Controller Functions
  |--------------------------------------------------------------------------
*/
  public function story(){
    $url = 'editor';
    $users = User::get();
    $stories = Community::Paginate(10);
    return view('editor.community.index', compact('url','stories','users'));
  }

  public function user_story(Community $id){
    $url = 'editor'; 
    $stories = Community::latest()->get();
    return view('editor.community.dashboard', compact('url','id'));
  }

  public function preview_story(Community $id){
    $url = 'editor';
    return view('editor.community.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Posts Controller Functions
  |--------------------------------------------------------------------------
*/
  public function post(){
    $url = 'editor';
    $users = User::get();
    $posts = Post::Paginate(10);
    return view('editor.posts.index', compact('url','posts','users'));
  }

  public function user_post(Post $id){
    $url = 'editor'; 
    $posts = Post::latest()->get();
    return view('editor.posts.dashboard', compact('url','id'));
  }

  public function preview_post(Post $id){
    $url = 'editor';
    return view('editor.posts.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Comments Controller Functions
  |--------------------------------------------------------------------------
*/
  public function comment(){
    $url = 'editor';
    $users = User::get();
    $comments = Comment::Paginate(10);
    return view('editor.comments.index', compact('url','comments','users'));
  }

  public function user_comment(Comment $id){
    $url = 'editor'; 
    $id = Comment::latest()->get();
    return view('editor.comments.dashboard', compact('url','id'));
  }

  public function preview_comment(Comment $id){
    $url = 'editor';
    return view('editor.comments.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Moods Controller Functions
  |--------------------------------------------------------------------------
*/
  public function mood(){
    $url = 'editor';
    $users = User::get();
    $moods = Moods::Paginate(10);
    return view('editor.moods.index', compact('url','moods','users'));
  }

  public function user_mood(Moods $id){
    $url = 'editor'; 
    $moods = Moods::latest()->get();
    return view('editor.moods.dashboard', compact('url','id'));
  }

  public function preview_mood(Moods $id){
    $url = 'editor';
    return view('editor.moods.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Messages Controller Functions
  |--------------------------------------------------------------------------
*/
  public function message(){
    $url = 'editor';
    $users = User::get();
    $messages = Messages::Paginate(10);
    return view('editor.messages.index', compact('url','messages','users'));
  }

  public function user_message(Messages $id){
    $url = 'editor'; 
    $id = Messages::latest()->get();
    return view('editor.messages.dashboard', compact('url','id'));
  }

  public function preview_message(Messages $id){
    $url = 'editor';
    return view('editor.messages.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Email Controller Functions
  |--------------------------------------------------------------------------
*/
  public function email(){
    $url = 'editor';
    $users = User::get();
    $emails = Email::Paginate(10);
    return view('editor.emails.index', compact('url','emails','users'));
  }

  public function user_email(Email $id){
    $url = 'editor'; 
    $id = Email::latest()->get();
    return view('editor.emails.dashboard', compact('url','id'));
  }

  public function preview_email(Email $id){
    $url = 'editor';
    return view('editor.emails.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Download Controller Functions
  |--------------------------------------------------------------------------
*/
  public function load(){
    $url = 'editor';
    $users = User::get();
    $loads = Download::Paginate(10);
    return view('editor.downloads.index', compact('url','loads','users'));
  }

  public function user_load(Download $id){
    $url = 'editor'; 
    $id = Download::latest()->get();
    return view('editor.downloads.dashboard', compact('url','id', 'chartcolumn'));
  }

  public function preview_load(Download $id){
    $url = 'editor';
    return view('editor.downloads.preview',compact('url','id'));
  }

}
