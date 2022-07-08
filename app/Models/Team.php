<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function player()
    {
        return $this->hasMany(\App\Models\Player::class);
    }

    public function article()
    {
        return $this->hasMany(\App\Models\Article::class);
    }

    public function tournament()
    {
        return $this->hasMany(\App\Models\Tournament::class);
    }

    public function match()
    {
        return $this->hasMany(\App\Models\Matches::class);
    }

    public function game()
    {
        return $this->hasOne(\App\Models\Game::class);
    }
}
