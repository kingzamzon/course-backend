<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    public function courses()
    {
    	return $this->hasMany(Course::class);
    }
}
