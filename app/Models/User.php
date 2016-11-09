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
}
