<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class News extends Model implements ViewableContract
{
	use Viewable;

	protected $fillable = [
  	'writer_id',

    'flag',
    'country',
    'region',
    'city',
    
    'section',
    'article_img',
    'title',
    'full_article',
    'status',
	];


    public function news(){
		return $this->belongsTo(News::class);
	}

	public function writer(){
		return $this->hasMany(Writer::class);
	}

	public function admin(){
		return $this->hasMany(Admin::class);
	}
}
