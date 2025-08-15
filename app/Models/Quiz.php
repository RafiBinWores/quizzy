<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['user_id'];

    public function answers()
    {
        return $this->hasMany(QuizAnswer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
