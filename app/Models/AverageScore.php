<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AverageScore extends Model
{
    protected $dates = ['created_at'];
	protected $primaryKey = 'avgid';
}
