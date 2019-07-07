<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
  protected $dates = ['created_at'];
	protected $primaryKey = 'quizid';

    public function questions()
    {
    	return $this->hasMany(Question::class);
    }
}
