<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecturer extends Model
{
	use SoftDeletes;



    protected $primaryKey = 'lecturer_id';

      protected $table = 'lecturers';

    protected $dates = ['deleted_at'];

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
    	return $this->hasMany(Course::class, 'lecturer_id', 'lecturer_id');
    }

    protected $hidden = [
    	'password'
    ];
}
