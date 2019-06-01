<?php

namespace App;

use App\Timetable;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function timetables()
    {
    	return $this->hasMany(Timetable::class);
    }
    public function leveld()
    {
    	return $this->belongsTo(LevelD::class);
    }
}
