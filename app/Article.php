<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function category(){
      return $this->belongsTo('App\Category');
    }
}
