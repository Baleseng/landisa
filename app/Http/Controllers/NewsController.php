<?php

namespace App\Http\Controllers;

use Victorybiz\GeoIPLocation\GeoIPLocation;
use Carbon\Carbon;

use App\Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Community;
use App\Comment;
use App\Media;
use App\News;
use App\User;
use Auth;

class NewsController extends Controller{

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct(){
    $this->middleware('auth');
  }

  public function news(){

    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    $geoip = new GeoIPLocation();

    $user = User::get();
    
    $news = News::where('status','publish')->orderBy('publish', 'asc')->get();

    $media = Media::where('status','publish')->orderBy('publish', 'asc')->get();

    $stories = Community::all(); 

    return view('news', compact(
      'user',
      'news',
      'media',
      'stories',
      'geoip',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  }  
}
