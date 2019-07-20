<?php

namespace App\Models\Quiz;

use App\Models\Quiz\Answer;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
	protected $table = 'user_answers';
	protected $dates = ['created_at'];

	public function answer()
  {
    return $this->belongsTo(Answer::class,'question_id');
  }
}
