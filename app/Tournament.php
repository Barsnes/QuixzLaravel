<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
  public function team(){
    return $this->belongsTo('App\Team');
  }

  public function match(){
    return $this->hasMany('App\TournamentMatch');
  }
}
