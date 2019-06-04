<?php

namespace App;

use App\Course;
use App\Student;
use Illuminate\Database\Eloquent\Model;

class LevelD extends Model
{
	protected $table = 'levels_department';
	protected $primaryKey = 'leveld_id';



    public function students()
    {
    	return $this->hasMany(Student::class);
    }

    public function courses()
    {
    	return $this->hasMany(Course::class);
    }
}
