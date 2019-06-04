<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
	protected $table = 'timetable';

	protected $fillable = [
		'course_id', 'type', 'start_time', 'end_time','day', 'venue'
	];

    public function courses()
    {
    	return $this->belongsTo(Course::class);
    }


}
