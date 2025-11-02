<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Objective extends Model
{
    protected $fillable = ['title', 'description', 'date_debut', 'date_fin', 'weight', 'value', 'metric'];

  public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function evaluation()
{
    return $this->hasOne(Evaluation::class);
}


}
