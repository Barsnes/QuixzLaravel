<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function player()
    {
        return $this->hasMany(\App\Player::class);
    }

    public function article()
    {
        return $this->hasMany(\App\Article::class);
    }

    public function tournament()
    {
        return $this->hasMany(\App\Tournament::class);
    }

    public function match()
    {
        return $this->hasMany(\App\Match::class);
    }

    public function game()
    {
        return $this->hasOne(\App\Game::class);
    }
}
