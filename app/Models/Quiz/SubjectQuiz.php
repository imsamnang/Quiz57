<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class SubjectQuiz extends Model
{
  // protected $table ='subjects_quizzes';
	protected $fillable=[
                      'title',
                      'slug',
                      'reference',
                      'max_attempts',
                      'pass_percentage',
                      'question_duration'
                      // 'status',
                    ];

    public function setReferenceAttribute()
    {
      return $this->attributes['reference'] = '#'.str_random(10);
    }

    public function questions()
    {
      return $this->belongsToMany(Question::class);
    }
}
