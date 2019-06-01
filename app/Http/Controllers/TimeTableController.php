<?php

namespace App\Http\Controllers;

use App\TimeTable;
use App\Levels;
use DB;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    public function __construct()
    {
        $this->middleware('client.credentials')->only(['newTimeTable','deleteTime']);
    }
    public function allTImeTable()
    { 
    	//$today = date('w'); //returns the day in the week 0 -6 //echo l //saturday 0
        //date for javascript getDay() 0 -6
    	//dd($today);
        $allTime = TimeTable::all();
        return response()->json(['data'=>$allTime], 200);
    }

    public function todayTimeTable()
    {   $today = date('w'); 
        //dd($today);
        $todayTable = DB::select("select * from create_tables where day = '$today'");
        return response()->json(['data'=>$todayTable], 200);
    }

     public function seachTimeTable(Request $request)
    {   
        $today = date('w'); 
        $department = $request->input('department');
        $level = $request->input('level');
        $findlevel_id = Levels::where(['department'=>$department, 'level'=>$level])->get()->first();
        $levelid = $findlevel_id->id;
        $seachTable = DB::select("select * from create_tables where level_id LIKE '%$levelid%' ORDER BY `create_tables`.`day` ASC");
       
        return response()->json(['data'=>$seachTable], 200);
    }



    public function newTimeTable(Request $request)
    {  
        $timetableid = $request->input('timetableid'); $emptyid = 0;
        if($timetableid == $emptyid){
           createTimeTable($request);
        }else {
            updateTimeTable($request);
        }
        
    }

    public function createTimeTable($request){
            $timetable = new TimeTable;
            $timetable->level_id = $request->input('level_id');
            $timetable->day = $request->input('day');
            $timetable->venue = $request->input('venue');
            $timetable->course_code = $request->input('course_code');
            $timetable->start_time = $request->input('start_time');
            $timetable->end_time = $request->input('end_time');
            $timetable->save();
            return response()->json(['data'=>$timetable], 201);

    }

    public function updateTimeTable($request) {
            $timetableid = $request->input('timetableid');
                $findT = TimeTable::find($timetableid); 
                $findT->level_id = $request->input('level_id');
                $findT->day = $request->input('day');
                $findT->venue = $request->input('venue');
                $findT->course_code = $request->input('course_code');
                $findT->start_time = $request->input('start_time');
                $findT->end_time = $request->input('end_time');
                $findT->save();
                return response()->json(['data'=> $findT], 201);
    }

    public function deleteTime($timetableid)
    {   
        $timetable = TimeTable::find($timetableid);
        $timetable->delete();
        return response()->json(['data' => 'TimeTable Removed'], 200);
    }


}
