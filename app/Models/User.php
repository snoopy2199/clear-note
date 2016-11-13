<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['email'];

    public function verification()
    {
        return $this->hasOne('App\Models\Verification');
    }

    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }
}
