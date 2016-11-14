<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = ['email'];
    protected $hidden = ['password', 'remember_token'];

    public function verification()
    {
        return $this->hasOne('App\Models\Verification');
    }

    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }

    public function feedback()
    {
        return $this->hasMany('App\Models\Feedback');
    }
}
