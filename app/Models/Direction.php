<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Direction extends Model
{
    protected $fillable = [ 'name', 'role'];

    public function users()
{
    return $this->hasMany(User::class);
}
}
