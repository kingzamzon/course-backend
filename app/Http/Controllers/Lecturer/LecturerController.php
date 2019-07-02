<?php

namespace App\Http\Controllers\Lecturer;

use App\Lecturer;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class LecturerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::all();
        $total_lecturers = Lecturer::all()->count();

        return $this->showAll($lecturers);
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
            'username' => 'required|min:5',
            'password' => 'required:min:6'
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $user = Lecturer::create($data);

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
        $lecturer = Lecturer::findOrFail($id);

        return $this->showOne($lecturer);
    }

 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lecturer = Lecturer::findOrFail($id);

        $rules = [
            'password' => 'min:6'
        ];

        if($request->has('password'))
        {
            $lecturer->password = bcrypt($request->password);
        }

        if(!$lecturer->isDirty()) 
        {
            return $this->errorResponse('you need to specify a different value', 422);
        }

        $lecturer->save();


        return $this->showOne($lecturer, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecturer = Lecturer::findOrFail($id);

        $lecturer->delete();

        return $this->showOne($lecturer, 201);
    }
}
