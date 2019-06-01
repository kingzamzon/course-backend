<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
	protected $table = 'create_tables';
    protected $primaryKey = 'id';

    public function Levels(){
        return $this->belongsTo('App\Levels');
    }
}
