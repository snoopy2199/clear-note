<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['user_id', 'score', 'content'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
