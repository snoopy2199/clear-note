<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    protected $fillable = ['note_id', 'tag'];

    public function note()
    {
        return $this->belongsTo('App\Models\Note');
    }
}
