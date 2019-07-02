<?php

namespace App\Http\Controllers\Student;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class StudentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = Student::has('leveld')->get();
        $students = Student::all();

        return $this->showAll($students);
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
            'username' => 'required|unique:students',
            'password' => 'required|min:6',
            'leveld_id' => 'required'
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $user = Student::create($data);

        return $this->showOne($user, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);

        return $this->showOne($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, Student $student)
    {
        $student->fill($request->only([
            'password'
        ]));

        if($student->isClean()) {
            return $this->errorResponse('you need to specify a different value', 422);
        }

        $student->save();

        return $this->showOne($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return $this->showOne($student, 201);
    }
}
