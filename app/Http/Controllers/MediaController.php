<?php

namespace App\Http\Controllers;

use Victorybiz\GeoIPLocation\GeoIPLocation;
use App\Illuminate\Support\Carbon;
use App\Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Community;
use App\Comment;
use App\Writer;
use App\Media;
use App\News;
use App\User;
use App\Post;
use Auth;

class MediaController extends Controller
{
	  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct(){

    $this->middleware('auth');

  }
  
  public function index(){

    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    $geoip = new GeoIPLocation();
    $user = User::all();
    $content = Media::where('status','publish')
                    ->orderBy('publish', 'asc')->get();
    return view('media.index', compact(
      'user',
      'content',
      'geoip',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  }


  public function video(){

    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    $geoip = new GeoIPLocation();
    $user = User::all();
    $content = Media::where('status','publish')
                    ->where('section','video')
                    ->orderBy('publish', 'asc')->get();
    return view('video', compact(
      'user',
      'content',
      'geoip',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  }

  public function embed(){

    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    $geoip = new GeoIPLocation();
    $user = User::all();
    $content = Media::where('status','publish')
                    ->where('section','embed')
                    ->orderBy('publish', 'asc')->get();
    return view('embed', compact(
      'user',
      'content',
      'geoip',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  }

  public function vr360(){

    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    $geoip = new GeoIPLocation();
    $user = User::all();
    $content = Media::where('status','publish')
                    ->where('section','vr360')
                    ->orderBy('publish', 'asc')->get();
    return view('vr360', compact(
      'user',
      'content',
      'geoip',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  }

  public function audio(){

    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    $geoip = new GeoIPLocation();
    $user = User::all();
    $content = Media::where('status','publish')
                    ->where('section','audio')
                    ->orderBy('publish', 'asc')->get();
    return view('audio', compact(
      'user',
      'content',
      'geoip',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  }

  public function gallery(){

    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    $geoip = new GeoIPLocation();
    $user = User::all();
    $content = Media::where('status','publish')
                    ->where('section','gallery')
                    ->orderBy('publish', 'asc')->get();
    return view('gallery', compact(
      'user',
      'content',
      'geoip',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  }

  public function content(Media $content, Comment $pageId){
  
    $json1 = Auth::user()->section1;
    $section1 = json_decode($json1);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);
    
    $geoip = new GeoIPLocation();
    $user = User::get();  
    $related = News::get();

    $writer = Writer::find($content->writer_id);

    views($content)->record();

    return view('media.content',['pageId' => $pageId], compact(
      'user',
      'writer',
      'content',
      'geoip',
      'related',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  } 
}
