<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdOps extends Authenticatable
{
	use Notifiable;

  protected $guard = 'adops';

  protected $fillable = ['name', 'email', 'password',];

  protected $hidden = ['password', 'remember_token',];
}
