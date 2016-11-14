<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelpRelation extends Model
{
    public $timestamps = false;
    protected $fillable = ['help_id', 'relative_help_id'];

    public function help()
    {
        return $this->belongsTo('App\Models\Help');
    }

    public function relativeHelp()
    {
        return $this->hasOne('App\Models\Help');
    }
}
