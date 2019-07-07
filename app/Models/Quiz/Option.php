<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
	  protected $table = 'options';
  	protected $fillable = ['question_id','title'];

    public function subject(){
      return $this->belongsTo(SubjectQuiz::class);
    }

    public function question()
    {
      return $this->belongsTo(Question::class);
    }

    public function answers()
    {
      return $this->hasMany(Answer::class);
    }

    public function isCorrect()
    {
      if ($this->answers()->where('option_id', $this->id)->get()->count() > 0){
          return true;
      }else
          return false;
    }
}
