<?php

namespace App;

use App\LevelD;
use App\Lecturer;
use App\Timetable;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $primaryKey = 'course_id';

    protected $fillable = [
        'course_code','lecturer_id','leveld_id'
    ];

    public function timetables()
    {
    	return $this->hasMany(Timetable::class, 'course_id', 'course_id');
    }

    public function leveld()
    {
    	return $this->belongsTo(LevelD::class);
    }

    public function lecturers()
    {
    	return $this->belongsTo(Lecturer::class, 'lecturer_id', 'lecturer_id');
    }

}
