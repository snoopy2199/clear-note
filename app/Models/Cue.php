<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cue extends Model
{
    public $timestamps = false;
    protected $fillable = ['note_id', 'title', 'content'];

    public function note()
    {
        return $this->belongsTo('App\Models\Note');
    }
}
