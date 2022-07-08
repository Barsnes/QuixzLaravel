<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function team()
    {
        return $this->hasMany('App\Team');
    }
}
