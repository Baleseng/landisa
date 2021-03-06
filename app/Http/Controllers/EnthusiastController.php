<?php

namespace App\Http\Controllers;

use Victorybiz\GeoIPLocation\GeoIPLocation;
use App\Illuminate\Http\Response;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Comment;
use App\Media;
use App\Section;
use App\News;
use App\Writer;
use App\User;
use App\Post;
use Auth;


class EnthusiastController extends Controller{

	/**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct(){
    $this->middleware('auth');
  }
   
  public function index(){
    $geoip = new GeoIPLocation();
    $user = User::get();
    $news = News::where('status','publish')
                  ->where('section','enthusiast')
                  ->orderBy('publish', 'asc')->get();
    $content = Media::where('status','publish')
                  ->where('subsection','enthusiast')
                  ->orderBy('publish', 'asc')->get();

    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    return view('enthusiast.index', compact(
      'user',
      'news',
      'content',
      'geoip',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  }

  public function news(News $id, Comment $pageId){
    
    $geoip = new GeoIPLocation();
   
    $user = User::get();

    $writer = Writer::find($id->writer_id);

    $related = News::get();

    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    views($id)->record();

    return view('enthusiast.news', ['pageId' => $pageId], compact(
      'user',
      'id',
      'writer',
      'related',
      'geoip',
      'section1',
      'section2',
      'section3',
      'section4'
    ));
  }
 
}
