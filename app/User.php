<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'player_id', 'team_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function player(){
      return $this->belongsTo('App\Player');
    }
}
