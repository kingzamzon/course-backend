<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;
use App\Transformers\TimetableTransformer;

class Timetable extends Model
{
	protected $table = 'timetable';

	protected $primaryKey = 'table_id';

	public $transformer = TimetableTransformer::class;
	protected $fillable = [
		'course_id', 'type', 'start_time', 'end_time','day', 'venue'
	];

    public function courses()
    {
    	return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

 

}
