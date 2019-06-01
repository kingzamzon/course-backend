<?php

namespace App\Http\Controllers;

use App\TimeTable;
use App\Levels;
use DB;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function newLevel(Request $request){
        $level = new Levels;
        $level->department = $request->input('department');
        $level->faculty = $request->input('faculty');
        $level->level = $request->input('level');
        $level->save();
        return response()->json(['data'=>$level], 201);
    }

    public function deleteLevel($levelid)
    {   
        $timetable = Levels::find($levelid);
        $timetable->delete();
        return response()->json(['data' => $table], 200);
    }
}
