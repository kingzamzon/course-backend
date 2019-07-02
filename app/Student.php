<?php

namespace App;

use App\LevelD;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{	
	protected $primaryKey = 'id';


	protected $fillable = [
		'username','password','leveld_id'
	];



    public function leveld()
    {
    	return $this->belongsTo(LevelD::class, 'leveld_id', 'leveld_id');
    }

    protected $hidden = [
    	'password'
    ];
}
