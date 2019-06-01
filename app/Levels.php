<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{
	protected $table = 'levels';
    protected $primaryKey = 'id';
    
    public function TimeTable(){
        return $this->hasMany('App\TimeTable');
    }
}
