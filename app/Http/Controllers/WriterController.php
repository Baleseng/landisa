<?php

namespace App\Http\Controllers;

use Victorybiz\GeoIPLocation\GeoIPLocation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Charts\HighChart;
use App\MapAfrican;
use App\Writer;
use App\Editor;
use App\Media;
use App\News;
use Auth;
use DB;


class WriterController extends Controller
{

	/**
  * Create a middleware instance.
  *
  * @return void
  */
	public function __construct()
  {
    $this->middleware('auth:writer');
  }

  public function editor_profile(Editor $id){
    $url = 'writer';
    return view('writer.editors.profile', compact('id','url'));
  }

  public function writer_profile(Writer $id){
    $url = 'writer';
    return view('writer.writers.profile', compact('id','url'));
  }

  public function index(){
    $url = 'writer';
    return view('writer.index', compact('url'));
  }

  public function news_add(News $news, Writer $admin){
    $url = 'writer';

    $geoip = new GeoIPLocation();

    return view('writer.news.add', compact('url','news','admin','geoip'));
  }

  public function news_store(News $news, Writer $admin, Request $request){
    $url = 'writer';
    // Create an input & Save to database
    $image = $request->image;
    //list($type, $image) = explode(';', $image);
    //list(, $image)      = explode(',', $image);
    $image = base64_decode($image);
    $image_name= time().'.jpg';
    $path = public_path('/images/articles/'.$image_name);
    
    file_put_contents($path, $image);
    
    News::create(request([
      'writer_id',

      'flag',
      'country',
      'region',
      'city',
      
      'section',
      'article_img',
      'title',
      'full_article',
      'status',
    ]));
    // Redirect
    //return redirect()->to('news/upload');
    return redirect('writer.news');
  }

  public function news_pending(Request $request){ 
    $url = 'writer';

    $counts = News::where('status','pending')->where('writer_id', auth()->id())->get();

    $viewsn = News::latest()
                   ->where('writer_id', auth()->id())
                   ->where('status','publish')->get();

    $id = News::latest()
                  ->where('writer_id', auth()->id())
                  ->where('status', 'pending')
                  ->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('writer.news.pending', compact('url', 'id', 'counts', 'viewsn', 'chartcolumn'));
  }

  public function news_reviewed(Request $request){ 
    $url = 'writer';

    $counts = News::where('status','review')->where('writer_id', auth()->id())->get();

    $viewsn = News::latest()
               ->where('writer_id', auth()->id())->where('status','publish')->get();

    $id = News::latest()->where('writer_id', auth()->id())
                          ->where('status','review')
                          ->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('writer.news.reviewed', compact('url', 'id', 'counts', 'viewsn','chartcolumn'));
  }

  public function news_suspended(Request $request){ 
    $url = 'writer';

    $counts = News::where('status','suspend')->where('writer_id', auth()->id())->get();

    $viewsn = News::latest()
               ->where('writer_id', auth()->id())->where('status','publish')->get();

    $id = News::latest()->where('writer_id', auth()->id())
                          ->where('status','suspend')
                          ->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('writer.news.suspended', compact('url', 'id', 'counts', 'viewsn', 'chartcolumn'));
  }

  public function news_dashboard(News $id){
    $url = 'writer';
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

    return view('writer.news.dashboard', compact('url','id', 'chartrealtime', 'chartpieviewed', 'chartcolumn', 'chartpiedevice','chartbar' ));
  }

  public function upload(Request $request, News $news){   
    $url = 'writer';

    News::find($news);
    
    $news->article_img = $request->get('article_img');
    $news->save();
    
    if ($request->isMethod('get'))
    return view('writer.news.upload',compact('url','news','id'));
    else{
      $image = $request->image;
      //list($type, $image) = explode(';', $image);
      //list(, $image)      = explode(',', $image);
      $image = base64_decode($image);
      $image_name= time().'.jpg';
      $path = public_path('images/articles/'.$image_name);
      
      file_put_contents($path, $image);
      return redirect('news');
      //return response()->json(['status'=>true]);
    }
  }

  public function news_timeline(News $id){
    $url = 'writer';
    return view('writer.news.timeline', compact('url','id'));
  }

  public function news_preview(News $id){
    $url = 'writer';
    return view('writer.news.preview', compact('url','id'));
  }

  public function news_edit(News $news, Writer $admin){ 
    $url = 'writer';
    $geoip = new GeoIPLocation();
    News::find($news);
    $admin = Writer::first();
    return view('writer.news.edit',compact('url','news','id', 'admin','geoip'));
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function gallery(Media $media){
    $url = 'writer';
    $geoip = new GeoIPLocation();
    return view('writer.media.gallery',compact('media','geoip','url'));
  }

  public function video(Media $media){
    $url = 'writer';
    $geoip = new GeoIPLocation();
    return view('writer.media.video',compact('media','geoip','url')); 
  }

  public function vr(Media $media){ 
    $url = 'writer';
    $geoip = new GeoIPLocation();
    return view('writer.media.vr',compact('media','geoip','url')); 
  }

  public function audio(Media $media){ 
    $url = 'writer';
    $geoip = new GeoIPLocation();
    return view('writer.media.audio',compact('media','geoip','url')); 
  }
  
  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */

  public function media_store(Request $request){
    
    $image = $request->image;
    //list($type, $image) = explode(';', $image);
    //list(, $image)      = explode(',', $image);
    $image = base64_decode($image);
    $image_name= time().'.jpg';
    $path = public_path('/images/articles/'.$image_name);
    file_put_contents($path, $image);
    
    
    $this->validate($request, [
      'file_name' => 'required',
      'file_name.*' => 'mimes:jpg,jpeg,png,gif'
    ]);

    if($request->hasfile('file_name')){
      foreach($request->file('file_name') as $media){
        
        $name = $media->getClientOriginalName();
        $media->move(public_path().'images/multimedia', $name);

        $data[] = $name;
        
      }
    }

    $media = new Media();

    $media->file_name=json_encode($data);
    
    $media->category= $request->get('category');
    $media->section = $request->get('section');
    $media->subsection = $request->get('subsection');
    $media->status = $request->get('status');
    $media->title = $request->get('title');
    $media->title = $request->get('synopsis');
    $media->article_img = $request->get('article_img');

    $media->writer_id = $request->get('writer_id');

    $media->country = $request->get('country');
    $media->region = $request->get('region');
    $media->city = $request->get('city');
    $media->flag = $request->get('flag');  
    
    $media->save();
    return redirect('media');
  }

  public function media_pending(Request $request){ 
    $url = 'writer';
    
    $counts = Media::where('writer_id', auth()->id())->where('status','pending')->get();

    $viewsm = Media::latest()
                   ->where('writer_id', auth()->id())
                   ->where('status','publish')->get();

    $id = Media::latest()->where('writer_id', auth()->id())
                            ->where('status', 'pending')->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('writer.media.pending', compact('url','id','counts','viewsm','chartcolumn'));
  }

  public function media_reviewed(Request $request){
    $url = 'writer';

    $counts = Media::where('writer_id', auth()->id())
                    ->where('status','review')->get();

    $viewsm = Media::latest()
                   ->where('writer_id', auth()->id())
                   ->where('status','publish')->get();

    $id = Media::latest()
                    ->where('writer_id', auth()->id())
                    ->where('status','review')->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('writer.media.reviewed', compact('url','id','counts','viewsm','chartcolumn'));
  }

  public function media_suspended(Request $request){ 
    $url = 'writer';

    $counts = Media::where('writer_id', auth()->id())
                    ->where('status','suspend')->get();

    $viewsm = Media::latest()
                   ->where('writer_id', auth()->id())
                   ->where('status','publish')->get();

    $id = Media::latest()
                    ->where('writer_id', auth()->id())
                    ->where('status','suspend')->Paginate(10);

    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Views', 'Comments', 'Posts', 'Messages', 'Moods', 'Emails', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [10, 3, 5, 5, 10, 1, 5])->color('rgba(242,101,34,.85)');

    return view('writer.media.suspended', compact('url','id','counts','viewsm','chartcolumn'));
  }

  public function media_preview(Media $id){
    $url = 'writer';
    return view('writer.media.preview', compact('url','id'));
  }

  public function media_timeline(Media $id){
    $url = 'writer';
    return view('writer.media.timeline', compact('url','id'));
  }

  public function media_dashboard(Media $id){
    $url = 'writer';

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

    return view('writer.media.dashboard', compact('url','id', 'chartrealtime','chartpieviewed','chartcolumn', 'chartpiedevice','chartbar' ));
  }

  public function update(Request $request, News $news){
    $url = 'writer';

    News::find($news);

    $news->admin_id = $request->get('admin_id');

    $news->synopsis = $request->get('synopsis');

    $news->section = $request->get('section');
    $news->subsection = $request->get('subsection');

    $news->keywords = $request->get('keywords');
    $news->description = $request->get('description');

    $news->commentblock = $request->get('commentblock');

    $news->publish = $request->get('publish');
    $news->archive = $request->get('archive');
    $news->status = $request->get('status');
    $news->save();

    return back();
    
  }

  public function delete(News $news){
    $url = 'writer';
    // Create an input & Save to database
    News::find($news);
    $news->delete();
    // Redirect
    return back();
  }
}
