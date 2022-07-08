<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TournamentMatch extends Model
{
    public function tournament()
    {
        return $this->hasOne(\App\Models\Tournament::class);
    }

    public function team()
    {
        return $this->belongsTo(\App\Models\Team::class);
    }
}
