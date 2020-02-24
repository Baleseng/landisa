<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\News;
use App\Media;
 
class PostController extends Controller
{
    /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct(){
    $this->middleware('auth');
  }

  public function post(){
    $user = User::get();

    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    $post = Post::latest()
    ->with('post', 'post.user')
    ->where('user_id', '=', Auth::user()->id)
    ->get();
    $news = News::get();

    return view('post', compact(
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
  
  public function default(){
    $post = Post::get();
    return response()->json($post);
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

    return redirect('wall/timeline'.Auth::user()->id . '-' . Auth::user()->name. '-' . Auth::user()->surname);
  }

  public function store(Request $request){
    $post = new Post();
    $post->user_id = $request->auth()->id();
    $post->postcard = $request->postcard;
    $post->post = $request->post;

    $postcard->save();
    return response()->json(['success'=>'Data is successfully added']);
  }

}