<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    protected $fillable = ['quiz_id', 'question_id', 'selected_option', 'is_correct'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
