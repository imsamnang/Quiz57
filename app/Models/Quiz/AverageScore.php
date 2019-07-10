<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class AverageScore extends Model
{
    protected $dates = ['created_at'];
	protected $primaryKey = 'avgid';
}
