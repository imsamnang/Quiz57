<?php

namespace App\Models\Quiz;

use App\Models\Quiz\Answer;
use App\Models\Quiz\QuizResults;
use App\User;
use Illuminate\Database\Eloquent\Model;

class SubjectQuiz extends Model
{
  protected $table ='subjects_quizzes';
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

    public function scopehasQuestions(){
      if($this->questions()->get()->count()){
        return true;
      }
      else{
        return false;
      }
    }

    public function answers(){
      return $this->hasMany(QuizResults::class,'subject_id');
    }

    public function scopeisExamined(){
      if($this->answers()->get()->count()){
        return false;
      }
      return true;
    }

    public function Users(){
      return $this->belongsTo(User::class,'user_id');
    }

    public function scopeisUsered(){
      if($this->Users()->get()->count()){
        return false;
      }
      return true;
    }     
}
