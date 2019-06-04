<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
	protected $primaryKey = 'lecturer_id';

    public function setUsernameAttribute($username)
    {
        $this->attributes['username'] = strtolower($username);
    }

    public function getUsernameAttribute($username)
    {
        return strtolower($username);
    }

	protected $fillable = [
		'username','password'
	];

    public function courses()
    {
    	return $this->hasMany(Course::class);
    }

    protected $hidden = [
    	'password'
    ];
}
