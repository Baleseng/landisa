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

use App\AfricanCountries;
use App\MapAfrican;
use App\Africa;

use App\Moderator;
use App\User;
use App\News;
use Auth;
use DB;

use App\Post;
use App\Email;
use App\Moods;
use App\Comment;
use App\Messages;
use App\Download;
use App\Community;

class ModeratorController extends Controller
{
	/**
  * Create a middleware instance.
  *
  * @return void
  */
	public function __construct()
  {
    $this->middleware('auth:moderator');
  }

  public function index(){

    $url = 'moderator';

    return view('moderator.index', compact('url'));
  }

  /*
  |--------------------------------------------------------------------------
  | User Controller Functions
  |--------------------------------------------------------------------------
*/
  public function user(){

    $url = 'moderator';

    $users = User::Paginate(10);
    $africa = Africa::get();
    $country = AfricanCountries::get();
    return view('moderator.users.index', compact('url','users','url','africa', 'country'));
  }


  public function user_profile(User $id){

    $url = 'moderator';
    
    $json1 = User::find($id->section1);
    $section1 = json_decode($json1);

    $json2 = User::find($id->section2);
    $section2 = json_decode($json2);

    $json3 = User::find($id->section3);
    $section3 = json_decode($json3);

    $json4 = User::find($id->section4);
    $section4 = json_decode($json4);

    return view('moderator.users.profile', compact('url',
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
    $url = 'moderator';
    $users = User::get();
    $stories = Community::Paginate(10);
    return view('moderator.community.index', compact('url','stories','users'));
  }

  public function user_story(Community $id){   
    $url = 'moderator';
    $stories = Community::latest()->get();
    return view('moderator.community.profile', compact('url', 'id'));
  }

  public function preview_story(Community $id){
    $url = 'moderator';
    return view('moderator.community.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Posts Controller Functions
  |--------------------------------------------------------------------------
*/
  public function post(){
    $url = 'moderator';
    $users = User::get();
    $posts = Post::Paginate(10);
    return view('moderator.posts.index', compact('url','posts','users'));
  }

  public function user_post(Post $id){
    $url = 'moderator';
    $posts = Post::latest()->get();
    return view('moderator.posts.profile', compact('url','id'));
  }

  public function preview_post(Post $id){
    $url = 'moderator';
    return view('moderator.posts.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Comments Controller Functions
  |--------------------------------------------------------------------------
*/
  public function comment(){
    $url = 'moderator';
    $users = User::get();
    $comments = Comment::Paginate(10);
    return view('moderator.comments.index', compact('url','comments','users'));
  }

  public function user_comment(Comment $id){
    $url = 'moderator';
    $id = Comment::latest()->get();
    return view('moderator.comments.profile', compact('url','id'));
  }

  public function preview_comment(Comment $id){
    $url = 'moderator';
    return view('moderator.comments.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Moods Controller Functions
  |--------------------------------------------------------------------------
*/
  public function mood(){
    $url = 'moderator';
    $users = User::get();
    $moods = Moods::Paginate(10);
    return view('moderator.moods.index', compact('url','moods','users'));
  }

  public function user_mood(Moods $id){
    $url = 'moderator';
    $moods = Moods::latest()->get();
    return view('moderator.moods.profile', compact('url','id'));
  }

  public function preview_mood(Moods $id){
    $url = 'moderator';
    return view('moderator.moods.preview',compact('url','id'));
  }

  /*
  |--------------------------------------------------------------------------
  | Messages Controller Functions
  |--------------------------------------------------------------------------
*/
  public function message(){
    $url = 'moderator';
    $users = User::get();
    $messages = Messages::Paginate(10);
    return view('moderator.messages.index', compact('url','messages','users'));
  }

  public function user_message(Messages $id){
    $url = 'moderator';
    $id = Messages::latest()->get();
    return view('moderator.messages.profile', compact('url','id'));
  }

  public function preview_message(Messages $id){
    $url = 'moderator';
    return view('moderator.messages.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Email Controller Functions
  |--------------------------------------------------------------------------
*/
  public function email(){
    $url = 'moderator';
    $users = User::get();
    $emails = Email::Paginate(10);
    return view('moderator.emails.index', compact('url','emails','users'));
  }

  public function user_email(Email $id){
    $url = 'moderator';
    $id = Email::latest()->get();
    return view('moderator.emails.profile', compact('url','id'));
  }

  public function preview_email(Email $id){
    $url = 'moderator';
    return view('moderator.emails.preview',compact('url','id'));
  }

/*
  |--------------------------------------------------------------------------
  | Download Controller Functions
  |--------------------------------------------------------------------------
*/
  public function load(){
    $url = 'moderator';
    $users = User::get();
    $loads = Download::Paginate(10);
    return view('moderator.downloads.index', compact('url','loads','users'));
  }

  public function user_load(Download $id){
    $url = 'moderator';
    $id = Download::latest()->get();
    return view('moderator.downloads.profile', compact('url','id'));
  }

  public function preview_load(Download $id){
    $url = 'moderator';
    return view('moderator.downloads.preview',compact('url','id'));
  }
}
