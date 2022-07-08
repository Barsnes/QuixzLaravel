<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TournamentMatch extends Model
{
    public function tournament()
    {
        return $this->hasOne('App\Tournament');
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
