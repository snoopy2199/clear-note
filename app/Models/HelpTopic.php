<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelpTopic extends Model
{
    public $timestamps = false;
    protected $fillable = ['topic'];

    public function helps()
    {
        return $this->hasMany('App\Models\Help');
    }
}
