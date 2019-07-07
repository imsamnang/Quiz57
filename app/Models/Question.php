<?php

namespace App\Models;

use App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $dates = ['created_at'];
	protected $primaryKey = 'questionid';
	
	public function quiz()
	{
		return $this->belongsTo(Quiz::class);
	}
}
