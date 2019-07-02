<?php

namespace App\Http\Controllers\Course;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CourseLecturerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {

        $lecturer = $course->lecturers;

        return $this->showOne($lecturer);

    }

    
}
