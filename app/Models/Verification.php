<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $fillable = ['user_id', 'token'];

    public $timestamps = false;
}
