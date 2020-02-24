<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
		'user_id',
	
		'news_id',
		'postwrapper',
		'postsection',
		'section',
		'article_img',
		'title',

		'postcard',
		'post',
		
		'status',
		'comment_id'
	];


	public function post(){
		return $this->belongsTo(Post::class);
	}

	public function user(){
		return $this->hasMany(User::class);
	}

	// public function news(){
	// 	return $this->belongsTo(News::class);
	// }
}
