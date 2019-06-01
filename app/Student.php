<?php

namespace App;

use App\LevelD;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function leveld()
    {
    	return $this->belongsTo(LevelD::class);
    }
}
