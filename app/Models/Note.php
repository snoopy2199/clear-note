<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hashids\Hashids;

class Note extends Model
{
    use SoftDeletes;

    protected $fillable = ['book_id', 'title'];
    protected $dates = [
        'created_at',
        'updated_at',
        'invalided_at',
        'deleted_at'
    ];

    public function hashId()
    {
        $hashids = new Hashids('Clear Note', 6);
        $hashid = $hashids->encode($this->id);
        return $hashid;
    }

    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }

    public function cues()
    {
        return $this->hasMany('App\Models\Cue');
    }

    public function tags()
    {
        return $this->hasMany('App\Models\Tag');
    }
}
