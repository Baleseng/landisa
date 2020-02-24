<?php

namespace App\Http\Controllers;

use App\Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Charts\HighChart;

use App\User;
use App\News;
use App\Post;
use App\Community;
use Auth;


class WallController extends Controller{

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct(){
    $this->middleware('auth');
  }

  public function timeline(User $user){ 
    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    User::find($user);
    $user = User::get();
    $post = Post::latest()->with('post', 'post.user')->where('user_id', '=', Auth::user()->id)->get();
    $news = News::get();
    
    return view('wall.timeline', compact(
      'user',
      'post',
      'news',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  }

    public function create(){
    
    // Create an input & Save to database
    Post::create([ 
      'user_id' => auth()->id(),

      'news_id' => request('news_id'),
      'postwrapper' => request('postwrapper'),
      'postsection' => request('postsection'),
      'section' => request('section'),
      'article_img' => request('article_img'),
      'title' => request('title'),

      'postcard' => request('postcard'),
      'post' => request('post'),

      'status' => request('status'),
      
    ]);
    // Redirect

    return redirect('wall/timeline?'.Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname);
  }

  public function store(Request $request){
    $post = new Post();
    $post->user_id = $request->auth()->id();
    $post->postcard = $request->postcard;
    $post->post = $request->post;

    $postcard->save();
    return response()->json(['success'=>'Data is successfully added']);
  }

  public function user(User $user){
    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    $user = User::get();
    $post = Post::latest()->with('post', 'post.user')->where('user_id', '=', Auth::user()->id)->get();
    $stories = Community::latest()->with('community', 'community.user')->where('user_id', '=', Auth::user()->id)->get();
    $news = News::get();
    
    return view('user', compact(
      'user',
      'post',
      'stories',
      'news',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  }

  public function multimedia(User $user){ 
    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    User::find($user);
    $user = User::get();
    
    $stories = Community::latest()->with('community', 'community.user')->where('user_id', '=', Auth::user()->id)->get();
    
    return view('wall.multimedia', compact(
      'user',
      'stories',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  }

  public function stories(User $user, Community $stories){ 
    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    $user = User::get();

    $stories = Community::latest()->with('community', 'community.user')->where('user_id', '=', Auth::user()->id)->get();

    return view('wall.stories', compact(
      'user',
      'stories',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  }


  public function activity(User $user){ 
    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    User::find($user);
    $user = User::get();
    $post = Post::latest()->with('post', 'post.user')->where('user_id', '=', Auth::user()->id)->get();
    $stories = Community::latest()->with('community', 'community.user')->where('user_id', '=', Auth::user()->id)->get();
    $news = News::get();

    $chartspline = new HighChart;

    $chartspline->labels(['Mon', 'Tue', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun']);
    $chartspline->dataset('Last Week', 'areaspline', [5,2,3,0,0,1,5])
    ->color('rgba(208,218,222,.5)');
    $chartspline->dataset('This Week', 'areaspline', [0,0,3,1,0,1,1])
    ->color('rgba(64,83,101,.75)');
    
    return view('wall.activity', compact(
      'user',
      'post',
      'news',
      'stories',
      'section1',
      'section2',
      'section3',
      'section4',
      'chartspline'
      )
    );
  }

  public function about(User $user){ 
    
    $chartcolumn = new HighChart;

    $chartcolumn->labels(['Shared', 'Emailed', 'Downloads']);
    $chartcolumn->dataset('Performance', 'column', [5, 5, 100])
                ->color('rgba(242,101,34,.85)');

    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    User::find($user);
    $user = User::get();
    $news = News::get();
    
    return view('wall.about', compact(
      'chartcolumn',
      'user',
      'news',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  }

  public function upload_profile(Request $request, User $user){     
    $user = User::get();

    $json1 = Auth::user()->section1;
    $section1 = json_decode($json1);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);
    
    User::find($user);
    if ($request->isMethod('get'))
    return view('wall.upload.index',compact('user'));
    else{
      $validator = Validator::make($request->all(),
      [
        'file' => 'image',
      ],
      [
        'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
      ]);
      if ($validator->fails())
      return array(
        'fail' => true,
        'errors' => $validator->errors()
      );
      $extension = $request->file('file')->getClientOriginalExtension();
      $dir = 'images/profile/users/';
      $user = uniqid() . '_' . time() . '.' . $extension;
      $request->file('file')->move($dir, $user);
      
      return view('wall.upload',compact(
        'section1',
        'section2',
        'section3',
        'section4'
        )
      );
    }
  }

  public function upload_cover(Request $request, User $user){ 
    
    $json1 = Auth::user()->section1;
    $section1 = json_decode($json1);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    $user = User::get();
    $post = Post::latest()->with('post', 'post.user')->where('user_id', '=', Auth::user()->id)->get();
    $stories = Community::latest()->with('community', 'community.user')->where('user_id', '=', Auth::user()->id)->get();
    $news = News::get();
    
    User::find($user);
    if ($request->isMethod('get'))
    return view('wall.index',compact(
      'user',
      'post',
      'stories',
      'news',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
    
    else{
      $validator = Validator::make($request->all(),
      [
        'file' => 'image',
      ],
      [
        'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
      ]);
      if ($validator->fails())
      return array(
        'fail' => true,
        'errors' => $validator->errors()
      );
      $extension = $request->file('file')->getClientOriginalExtension();
      $dir = 'images/profile/users/';
      $user = uniqid() . '_' . time() . '.' . $extension;
      $request->file('file')->move($dir, $user);
      return $user;
    }
  }

  public function update(Request $request, User $user){
    User::find($user);
    $user->avator = $request->get('avator');
    $user->coverimg = $request->get('coverimg');
    $user->save();
    return redirect()->to('wall/' . Auth::user()->id .'-'. Auth::user()->name .'-'. Auth::user()->surname);
    // return redirect('wall'.);
  }


  public function deleteImageProfile($user){
    File::delete('images/profile/users/' . $user);
  }


  public function delete(User $user){
    // Create an input & Save to database
    User::find($user);
    $user->delete();
    // Redirect
    return redirect('/wall');
  }

}