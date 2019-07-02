<?php

namespace App\Http\Controllers\Lecturer;

use App\Lecturer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class LecturerCourseController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lecturer $Lecturer)
    {
        $courses = $Lecturer->courses;
        // dd($courses);
        return $this->showAll($courses);
    }

    
}
