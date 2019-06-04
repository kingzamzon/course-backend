<?php

namespace App;

use App\Course;
use App\Student;
use Illuminate\Database\Eloquent\Model;

class LevelD extends Model
{
	protected $table = 'levels_department';

	//set a primarykey from 'id' to leveld_id
	protected $primaryKey = 'leveld_id';

	protected $fillable = [
		'level', 'department', 'faculty'
	];



    public function students()
    {
    	return $this->hasMany(Student::class);
    }

    public function courses()
    {
    	return $this->hasMany(Course::class);
    }
}
