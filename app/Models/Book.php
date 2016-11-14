<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'title'];
    protected $dates = [
        'created_at',
        'updated_at',
        'invalided_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function notes()
    {
        return $this->hasMany('App\Models\Note');
    }
}
