<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['user_id', 'question', 'options', 'correct_option'];
    protected $casts = ['options' => 'array'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
