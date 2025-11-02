<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordCode extends Model
{
    protected $fillable = ['email', 'code', 'expires_at'];

    public $timestamps = true;

    protected $dates = ['expires_at'];
}
