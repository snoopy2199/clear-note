<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    public $timestamps = false;
    protected $fillable = ['help_topic_id', 'title', 'content'];

    public function helpTopic()
    {
        return $this->belongsTo('App\Models\HelpTopic');
    }

    public function helpRelations()
    {
        return $this->hasMany('App\Models\HelpRelation');
    }
}
