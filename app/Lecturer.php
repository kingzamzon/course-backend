<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
	protected $primaryKey = 'lecturer_id';

	protected $fillable = [
		'username','password'
	];

    public function courses()
    {
    	return $this->hasMany(Course::class);
    }
}
