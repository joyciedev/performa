<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['objective_id', 'score', 'comments', ];

    public function objective()
{
    return $this->belongsTo(Objective::class, 'objective_id');
}

public function user()
    {
        return $this->belongsTo(User::class);
    }

}
