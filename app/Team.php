<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function player()
    {
        return $this->hasMany('App\Player');
    }

    public function article()
    {
        return $this->hasMany('App\Article');
    }

    public function tournament()
    {
        return $this->hasMany('App\Tournament');
    }

    public function match()
    {
        return $this->hasMany('App\Match');
    }

    public function game()
    {
        return $this->hasOne('App\Game');
    }
}
