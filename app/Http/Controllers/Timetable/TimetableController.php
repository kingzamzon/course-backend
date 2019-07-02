<?php

namespace App\Http\Controllers\Timetable;

use App\Course;
use App\Timetable;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Collection;

class TimetableController extends ApiController
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        $timetables = Timetable::all();

        return $this->showAll($timetables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'course_id' => 'required',
            'type' => 'required',
            'start_time' => 'required',
             'end_time' => 'required',
             'day' => 'required',
             'venue' => 'required'
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $timetable = Timetable::create($data);

        return $this->showOne($timetable, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {

        $timetable = Timetable::findOrFail($id);

        return $this->showOne($timetable);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timetable $timetable)
    {
        $timetable->fill($request->only([
            'course_id' ,
            'type',
            'start_time',
             'end_time',
             'day' ,
             'venue' 
        ]));

        if($timetable->isClean()) 
        {
            return $this->errorResponse('you need to specify a different value', 422);
        }

        $timetable->save();

        return $this->showOne($timetable, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timetable = Timetable::findOrFail($id);

        $timetable->delete();

        return $this->showOne($timetable, 201);
    }
}
