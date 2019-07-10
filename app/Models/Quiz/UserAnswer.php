<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
	protected $table = 'user_answers';
	protected $dates = ['created_at'];
}
