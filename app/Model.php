<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class Model extends Eloquent implements ViewableContract
{

	use Viewable;

	// protected $fillable = [ ];

	// public function news(){
	// 	return $this->belongsTo('App\News');
	// }

	// public function user(){
	// 	return $this->belongsTo('App\User');
	// }

 //  public function admin(){
 //    return $this->belongsTo('App\Admin');
 //  }

	// public function search(Request $request){
 //    if($request->ajax()){
 //      $output="";
 //      $results= News::where('title','LIKE','%'.$request->input.'%')->get();
 //      if($results){
 //        foreach ($results as $key => $result) {
 //          $output.='<li>'.
 //          '<span class="search-img"><img src="https://writer.triwink.africa/images/articles/'.$result->article_img.'"/></span>'.
 //          '<a href="" class="search-title">'.$result->title.'<span class="search-section">'.$result->section.'</span></a>'.
 //          '</li>';
 //        }
 //        return Response($output);
 //      }

 //    }
 //  }

  // public function site(){

  //   $json = Auth::user()->section1;
  //   $section1 = json_decode($json);

  //   $json2 = Auth::user()->section2;
  //   $section2 = json_decode($json2);

  //   return view('news', compact('section1','section2'));
  // }  

  // public function toArray(){
  //   $attributes = parent::toArray();
  //   $array = array();

  //   foreach($attributes as $key => $value){
  //     $newKey = snake_case($key);
  //     $array[$newKey] = $value;
  //   }
  //   return $array;
  // }

}
