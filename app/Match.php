<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
  public function game(){
    return $this->belongsTo('App\Game');
  }

  public function tournament(){
    return $this->belongsTo('App\Tournament');
  }
}
