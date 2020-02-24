<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Editor extends Authenticatable
{
	use Notifiable;

  protected $guard = 'editor';

  protected $fillable = ['name', 'email', 'password',];

  protected $hidden = ['password', 'remember_token',];
}
