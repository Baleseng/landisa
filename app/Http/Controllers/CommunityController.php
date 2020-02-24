<?php

namespace App\Http\Controllers;

use Victorybiz\GeoIPLocation\GeoIPLocation;
use App\Illuminate\Support\Carbon;
use App\Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Community;
use App\Comment;
use App\Media;
use App\News;
use App\User;
use App\Post;
use Auth;

class CommunityController extends Controller{

	/**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct(){
    $this->middleware('auth');
  }
   
  public function default(){

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
    
    $stories = Community::latest()->where('status', '=', 'publish')->get();

    $content = Media::all();
    
    return view('community.default', compact(
      'user', 
      'stories',
      'content',
      'geoip',
      'section1',
      'section2',
      'section3',
      'section4'
      )
  );
  }

  public function news(Community $stories, Comment $pageId){

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

    views($stories)->record();
    
    return view('community.news', ['pageId' => $pageId], compact(
      'user',
      'stories',
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

    $user = User::get();
  	return view('community.gallery', compact(
      'user',
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

    $user = User::get();
    return view('community.video', compact(
      'user',
      'geoip',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  }

  public function story(){
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
    return view('community.story', compact(
      'user',
      'geoip',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  }

  public function store(Request $request, Community $stories){
    $geoip = new GeoIPLocation();
    // Create an input & Save to database
    Community::create(request([
      'user_id',
      'title',
      'story',
      'status',
      'engagement',
      'commentblock', 
      'moodblock', 
      'shareblock'
    ]));
    // Redirect
    //return redirect('community/preview');
    return redirect('community');
  }

  public function preview(Community $stories){
    $geoip = new GeoIPLocation();

    $stories = Community::all();
    $user = User::get();
    return view('community/preview',compact('user','stories','geoip'));
  }

  public function edit(Community $stories){ 
    $geoip = new GeoIPLocation();
    $stories = Community::all();
    $user = User::get();
    return view('community.edit', compact('user','stories','geoip'));
  }

  public function update(Request $request, Community $stories){ 
    $geoip = new GeoIPLocation();
    Community::find($stories);
    $stories->title = $request->get('title');
    $stories->news = $request->get('story');
    $stories->save();
    return redirect('/community/preview');
  }

}
