<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cue extends Model
{
    public function note()
    {
        return $this->belongsTo('App\Models\Note');
    }
}
