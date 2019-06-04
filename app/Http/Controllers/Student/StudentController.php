<?php

namespace App\Http\Controllers\Student;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return response()->json(['data'=>$students], 200);
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

        return response()->json(['data'=> $user], 201);

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

        return response()->json(['data'=>$student], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $rules = [
            'password' => 'min:6'
        ];

        if($request->has('password') && $student->password != $request->password) {
            $student->password = bcrypt($request->password);
        } 

        if(!$student->isDirty()) {
            return response()->json(['error' => 'you need to specify a different value','code' => 422],422);
        }

        $student->save();

        return response()->json(['data' => $student], 200);
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

        return response()->json(['data' => $student], 201);
    }
}
