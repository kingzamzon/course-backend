<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    public function courses()
    {
    	return $this->belongsTo(Course::class);
    }
}
