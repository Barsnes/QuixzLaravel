<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
  public function tournament(){
    return $this->belongsTo(\App\Models\Tournament::class);
  }

  public function team(){
    return $this->belongsTo(\App\Models\Team::class);
  }
}
