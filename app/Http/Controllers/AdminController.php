<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Illuminate\Support\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Charts\HighChart;

use App\Africa;
use App\AfricanCountries;

use App\News;
use App\Media;
use App\Campaign;
use App\Section;

use App\Post;
use App\Email;
use App\Moods;
use App\Comment;
use App\Messages;
use App\Download;
use App\Community;

use App\User;
use App\Admin;
use App\AdOps;
use App\Editor;
use App\Writer;
use App\Moderator;

class AdminController extends Controller
{

	/**
  * Create a middleware instance.
  *
  * @return void
  */
	public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function admin_profile(Admin $id){
    $url = 'admin';
    return view('admin.profile', compact('id','url'));
  }

  public function index(){
    $url = 'admin';
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

    return view('admin.index', compact('url',
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

  public function news_pending(News $d, Request $request){
    $url = 'admin';

    $counts = News::where('status','pending')->get();
    
    $id = News::latest()->where('status','pending')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();

    $editor = Editor::find($d->editor_id);
    $writer = Writer::find($d->writer_id);

    $chartcolumn = new HighChart;
    $chartcolumn->labels(['Viewed', 'Commented', 'Shared', 'Messages', 'Moods']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10])->color('rgba(242,101,34,.85)');

    return view('admin.news.pending', compact('url','id','viewsn','editor','counts','chartcolumn'));
  }

  public function news_reviewed(Request $request){ 
    $url = 'admin';
    
    $counts = News::where('status','review')->get();
    
    $id = News::latest()->where('status','review')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();

    $chartcolumn = new HighChart;
    $chartcolumn->labels(['Viewed', 'Commented', 'Shared', 'Messages', 'Moods']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10])->color('rgba(242,101,34,.85)');

    return view('admin.news.reviewed', compact('url','id','viewsn','counts','chartcolumn'));
  }

  public function news_suspended(Request $request){  
    $url = 'admin';
    
    $counts = News::where('status','suspend')->get();
    
    $id = News::latest()->where('status','suspend')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Viewed', 'Commented', 'Shared', 'Messages', 'Moods']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10])->color('rgba(242,101,34,.85)');

    return view('admin.news.suspended', compact('url','id','viewsn','counts','chartcolumn'));
  }

  public function news_archived(Request $request){  
    $url = 'admin';
    
    $counts = News::where('status','archive')->get();
    
    $id = News::where('status','archive')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Viewed', 'Commented', 'Shared', 'Messages', 'Moods']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10])->color('rgba(242,101,34,.85)');

    return view('admin.news.archived', compact('url','id','viewsn','counts','chartcolumn'));
  }

  public function news_dashboard(News $id){
    $url = 'admin';
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

    return view('admin.news.dashboard', compact('url','id', 'chartrealtime', 'chartpieviewed', 'chartcolumn', 'chartpiedevice','chartbar' ));
  }

  public function news_preview(News $id){
    $url = 'admin';
    return view('admin.news.preview', compact('url','id'));
  }

  public function news_timeline(News $id){
    $url = 'admin';
    return view('admin.news.timeline', compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Media Controller Functions
  |--------------------------------------------------------------------------
*/

  public function media_pending(Request $request){ 
    $url = 'admin';
    
    $counts = Media::where('status','pending')->get();

    $viewsm = Media::latest()->where('status','publish')->get();

    $id = Media::latest()->where('status', 'pending')->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('admin.media.pending', compact('url','id','counts','viewsm','chartcolumn'));
  }

  public function media_reviewed(Request $request){
    $url = 'admin';

    $counts = Media::where('status','review')->get();

    $viewsm = Media::latest()->where('status','publish')->get();

    $id = Media::latest()->where('status','review')->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('admin.media.reviewed', compact('url','id','counts','viewsm','chartcolumn'));
  }

  public function media_suspended(Request $request){ 
    $url = 'admin';

    $counts = Media::where('status','suspend')->get();

    $viewsm = Media::latest()->where('status','publish')->get();

    $id = Media::latest()->where('status','suspend')->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('admin.media.suspended', compact('url','id','counts','viewsm','chartcolumn'));
  }

  public function media_archived(Request $request){ 
    $url = 'admin';

    $counts = Media::where('status','archive')->get();

    $viewsm = Media::latest()->where('status','publish')->get();

    $id = Media::latest()->where('status','archive')->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('admin.media.archived', compact('url','id','counts','viewsm','chartcolumn'));
  }

  public function media_preview(Media $id){
    $url = 'admin';
    return view('admin.media.preview', compact('url','id'));
  }

  public function media_timeline(Media $id){
    $url = 'admin';
    return view('admin.media.timeline', compact('url','id'));
  }

  public function media_dashboard(Media $id){
    $url = 'admin';

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

    return view('admin.media.dashboard', compact('url','id', 'chartrealtime','chartpieviewed','chartcolumn', 'chartpiedevice','chartbar' ));
  }

/*
  |--------------------------------------------------------------------------
  | Admin, Editor, Writer & Moderator Controller Functions
  |--------------------------------------------------------------------------
*/
  public function adop(){
    $url = 'admin';
    $adops = AdOps::Paginate(10);
    $africa = Africa::get();
    $country = AfricanCountries::get();
    return view('admin.adops.index', compact('url','adops','africa', 'country'));
  }
  public function adop_profile(AdOps $id){
    $url = 'admin';
    return view('admin.adops.profile', compact('id','url'));
  }
  /*------------------------------------------------------------------------*/
  public function editor(){
    $url = 'admin';
    $editors = Editor::Paginate(10);
    $africa = Africa::get();
    $country = AfricanCountries::get();
    return view('admin.editors.index', compact('url','editors','africa', 'country'));
  }
  public function editor_profile(Editor $id){
    $url = 'admin';
    return view('admin.editors.profile', compact('id','url'));
  }
/*------------------------------------------------------------------------*/
  public function moderator(){
    $url = 'admin';
    $moderators = Moderator::Paginate(10);
    $africa = Africa::get();
    $country = AfricanCountries::get();
    return view('admin.moderators.index', compact('url','moderators','africa', 'country'));
  }
  public function moderator_profile(Moderator $id){
    $url = 'admin';
    return view('admin.moderators.profile', compact('id','url'));
  }
/*------------------------------------------------------------------------*/
  public function writer(){
    $url = 'admin';
    $writers = Writer::Paginate(10);
    $africa = Africa::get();
    $country = AfricanCountries::get();
    return view('admin.writers.index', compact('url','writers','africa', 'country'));
  }
  public function writer_profile(Writer $id){
    $url = 'admin';
    return view('admin.writers.profile', compact('id','url'));
  }

/*
  |--------------------------------------------------------------------------
  | User Controller Functions
  |--------------------------------------------------------------------------
*/
  public function user(){

    $url = 'admin';

    $users = User::Paginate(10);
    $africa = Africa::get();
    $country = AfricanCountries::get();
    return view('admin.users.index', compact('url','users','url','africa', 'country'));
  }

  public function user_profile(User $id){

    $url = 'admin';
    
    $json1 = User::find($id->section1);
    $section1 = json_decode($json1);

    $json2 = User::find($id->section2);
    $section2 = json_decode($json2);

    $json3 = User::find($id->section3);
    $section3 = json_decode($json3);

    $json4 = User::find($id->section4);
    $section4 = json_decode($json4);

    return view('admin.users.profile', compact('url',
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
    $url = 'admin';
    $users = User::get();
    $stories = Community::Paginate(10);
    return view('admin.community.index', compact('url','stories','users'));
  }
  public function profile_story(Community $id){
    $url = 'admin'; 
    $stories = Community::latest()->get();
    return view('admin.community.profile', compact('url','id'));
  }
  public function preview_story(Community $id){
    $url = 'admin';
    return view('admin.community.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Posts Controller Functions
  |--------------------------------------------------------------------------
*/
  public function post(){
    $url = 'admin';
    $users = User::get();
    $posts = Post::Paginate(10);
    return view('admin.posts.index', compact('url','posts','users'));
  }
  public function profile_post(Post $id){
    $url = 'admin'; 
    $posts = Post::latest()->get();
    return view('admin.posts.profile', compact('url','id'));
  }
  public function preview_post(Post $id){
    $url = 'admin';
    return view('admin.posts.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Comments Controller Functions
  |--------------------------------------------------------------------------
*/
  public function comment(){
    $url = 'admin';
    $users = User::get();
    $comments = Comment::Paginate(10);
    return view('admin.comments.index', compact('url','comments','users'));
  }

  public function profile_comment(Comment $id){
    $url = 'admin'; 
    $id = Comment::latest()->get();
    return view('admin.comments.profile', compact('url','id'));
  }

  public function preview_comment(Comment $id){
    $url = 'admin';
    return view('admin.comments.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Moods Controller Functions
  |--------------------------------------------------------------------------
*/
  public function mood(){
    $url = 'admin';
    $users = User::get();
    $moods = Moods::Paginate(10);
    return view('admin.moods.index', compact('url','moods','users'));
  }

  public function profile_mood(Moods $id){
    $url = 'admin'; 
    $moods = Moods::latest()->get();
    return view('admin.moods.profile', compact('url','id'));
  }

  public function preview_mood(Moods $id){
    $url = 'admin';
    return view('admin.moods.preview',compact('url','id'));
  }

  /*
  |--------------------------------------------------------------------------
  | Messages Controller Functions
  |--------------------------------------------------------------------------
*/
  public function message(){
    $url = 'admin';
    $users = User::get();
    $messages = Messages::Paginate(10);
    return view('admin.messages.index', compact('url','messages','users'));
  }

  public function profile_message(Messages $id){
    $url = 'admin'; 
    $id = Messages::latest()->get();
    return view('admin.messages.profile', compact('url','id'));
  }

  public function preview_message(Messages $id){
    $url = 'admin';
    return view('admin.messages.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Email Controller Functions
  |--------------------------------------------------------------------------
*/
  public function email(){
    $url = 'admin';
    $users = User::get();
    $emails = Email::Paginate(10);
    return view('admin.emails.index', compact('url','emails','users'));
  }

  public function profile_email(Email $id){
    $url = 'admin'; 
    $id = Email::latest()->get();
    return view('admin.emails.profile', compact('url','id'));
  }

  public function preview_email(Email $id){
    $url = 'admin';
    return view('admin.emails.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Download Controller Functions
  |--------------------------------------------------------------------------
*/
  public function load(){
    $url = 'admin';
    $users = User::get();
    $loads = Download::Paginate(10);
    return view('admin.downloads.index', compact('url','loads','users'));
  }

  public function profile_load(Download $id){
    $url = 'admin'; 
    $id = Download::latest()->get();
    return view('admin.downloads.profile', compact('url','id', 'chartcolumn'));
  }

  public function preview_load(Download $id){
    $url = 'admin';
    return view('admin.downloads.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Campaign Controller Functions
  |--------------------------------------------------------------------------
*/
  public function admin_active(){ 
    $url = 'admin';
    $ads = Campaign::where('status','active')->Paginate(10);
    
    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $sections = Section::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('admin.campaigns.active', compact(
      'url',
      'ads',
      'viewsn',
      'viewsm',
      'users',
      'sections',
      'africa',
      'country',
      'chartpiedevice'
    ));
  }

  public function admin_inactive(){
    $url = 'admin';
    $ads = Campaign::where('status','inactive')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('admin.campaigns.inactive', compact('url','ads','viewsn','viewsm','sections','users','africa','country','chartpiedevice'));
  }

  public function admin_archive(){
    $url = 'admin';
    $ads = Campaign::where('status','archive')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('admin.campaigns.archive', compact('url','ads','viewsn','viewsm','sections','users','africa','country','chartpiedevice'));
  }

  public function admin_programmatic(){
    $url = 'admin';
    $ads = Campaign::where('status','archive')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('admin.campaigns.programmatic', compact('url','ads','viewsn','viewsm','sections','users','africa','country','chartpiedevice'));
  }

  public function admin_order(){
    $url = 'admin';
    $ads = Campaign::where('status','archive')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('admin.campaigns.order', compact('url','ads','viewsn','viewsm','sections','users','africa','country','chartpiedevice'));
  }

  public function admin_inventory(){
    $url = 'admin';
    $ads = Campaign::where('status','archive')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('admin.campaigns.inventory', compact('url','ads','viewsn','viewsm','sections','users','africa','country','chartpiedevice'));
  }

  public function admin_reporting(){
    $url = 'admin';
    $ads = Campaign::where('status','archive')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('admin.campaigns.reporting', compact('url','ads','viewsn','viewsm','sections','users','africa','country','chartpiedevice'));
  }

  public function admin_advertiser(){
    $url = 'admin';
    $ads = Campaign::where('status','archive')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('admin.campaigns.advertiser', compact('url','ads','viewsn','viewsm','sections','users','africa','country','chartpiedevice'));
  }

  public function admin_agency(){
    $url = 'admin';
    $ads = Campaign::where('status','archive')->Paginate(10);

    $viewsn = News::latest()->where('status','publish')->get();
    $viewsm = Media::latest()->where('status','publish')->get();

    $sections = Section::get();

    $users = User::Paginate(11);
    $africa = Africa::get();
    $country = AfricanCountries::get();

    $chartpiedevice = new HighChart;

    $chartpiedevice->labels(['Mobile','Desktop','Tablet']);
    $chartpiedevice->dataset('Devices Used', 'pie', [45, 35, 15])
    ->color(['rgba(64,83,101,.85)','rgba(242,101,34,.85)','rgba(204,204,204,.85)']);

    return view('admin.campaigns.advert', compact('url','ads','viewsn','viewsm','sections','users','africa','country','chartpiedevice'));
  }

}
