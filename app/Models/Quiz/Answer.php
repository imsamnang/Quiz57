<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
 	public function question()
  {
    return $this->belongsTo(Question::class);
  }

  public function option()
  {
    return $this->belongsTo(Option::class);
  }
}
