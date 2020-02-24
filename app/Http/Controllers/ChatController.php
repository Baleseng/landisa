<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class ChatController extends Controller
{
    /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct(){
    $this->middleware('auth');
  }

  public function chat(){
    $user = User::get();

    $json = Auth::user()->section1;
    $section1 = json_decode($json);

    $json2 = Auth::user()->section2;
    $section2 = json_decode($json2);

    $json3 = Auth::user()->section3;
    $section3 = json_decode($json3);

    $json4 = Auth::user()->section4;
    $section4 = json_decode($json4);

    return view('chatroom', compact(
      'user',
      'section1',
      'section2',
      'section3',
      'section4'
      )
    );
  }
}
