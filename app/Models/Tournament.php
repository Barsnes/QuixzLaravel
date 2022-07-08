<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    public function team()
    {
        return $this->belongsTo(\App\Models\Team::class);
    }

    public function match()
    {
        return $this->hasMany(\App\Models\Match::class);
    }

    public function getFinished()
    {
        if ($this->finished == '0') {
            return 'Upcoming';
        } elseif ($this->finished == '1') {
            return 'Finished';
        } else {
            return 'Ongoing';
        }
    }
}
