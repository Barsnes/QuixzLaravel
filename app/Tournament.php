<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function match()
    {
        return $this->hasMany('App\Match');
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
