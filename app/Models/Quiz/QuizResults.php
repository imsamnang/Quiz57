<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class QuizResults extends Model
{
  protected $table = 'quiz_results';
  protected $guarded = [];
  public $timestamps = false;

  public function user()
  {
      return $this->belongsTo(User::class);
  }
}
