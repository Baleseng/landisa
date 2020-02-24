<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model{

	protected $fillable = [
		'user_id',
		'profileimg',
		'name',
		'surname',
		'email',
		'title',
		'story',
		'status',
		'engagement',
		'comment_id',
		'commentblock', 
    'moodblock', 
    'shareblock',
	];

	public function community(){
		return $this->belongsTo(Community::class);
	}

	public function user(){
		return $this->hasMany(User::class);
	}

	public function comment(){
		return $this->belongsTo(Comment::class);
	}
  
}