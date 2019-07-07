<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
 	protected $table = 'questions';
  protected $fillable = ['title','status','slug'];

  public function subject(){
    return $this->belongsTo(SubjectQuiz::class);
  }

  public function subjects()
  {
    return $this->belongsToMany(SubjectQuiz::class);
  }

  public function options()
  {
  	return $this->hasMany(Option::class);
  }

  public function answers()
  {
    return $this->hasMany(Answer::class);
  }

  public function answerIsSet()
  {
    $count = $this->answers()->count();
    if ($count > 0){
        return true;
    }else{
        return false;
    }
  }    
}
