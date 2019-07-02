<?php

namespace App\Http\Controllers\Course;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CourseController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();

        return $this->showAll($courses);
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
            'course_code' => 'required',
            'lecturer_id' => 'required',
            'leveld_id' => 'required'
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $course = Course::create($data);

        return $this->showOne($course, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);

        return $this->showOne($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->fill($request->only([
            'course_code',
            'lecturer_id',
            'leveld_id'
        ]));

        if($course->isClean()) {
            return $this->errorResponse('you need to specify a different value', 422);
        }

        $course->save();

        return $this->showOne($course, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return $this->showOne($course, 201);
    }
}
