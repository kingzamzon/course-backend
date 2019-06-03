<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
	protected $table = 'timetable';
    public function courses()
    {
    	return $this->belongsTo(Course::class);
    }
}
