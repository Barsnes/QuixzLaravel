<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
  public function tournament(){
    return $this->belongsTo('App\Tournament');
  }

  public function team(){
    return $this->belongsTo('App\Team');
  }
}
