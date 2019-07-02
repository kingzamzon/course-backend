<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
* Courses
*/
Route::resource('courses', 'Course\CourseController', ['except' => ['create', 'edit']]
);
Route::resource('courses.lecturers', 'Course\CourseLecturerController', ['only' => ['index']]
);

/*
* Timetables
*/
Route::resource('timetables', 'Timetable\TimetableController', ['except' => ['create', 'edit']]
);

/*
* Levels
*/
Route::resource('levels', 'LevelD\LevelDController', ['except' => ['create', 'edit']]
);
Route::resource('levels', 'LevelD\LevelDController', ['except' => ['create', 'edit']]
);

/*
* Students
*/
Route::resource('students', 'Student\StudentController', ['except' => ['create', 'edit']]
);

/*
*	Lecturers
*/

Route::resource('lecturers', 'Lecturer\LecturerController', ['except' => ['create','edit']]
);
Route::resource('lecturers.courses', 'Lecturer\LecturerCourseController', ['only' => 'index']
);


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('timetables','TimeTableController@allTImeTable');

// Route::get('today','TimeTableController@todayTimeTable'); //timetables/id
// //new timetable
// Route::post('timetables','TimeTableController@newTimeTable');

// Route::post('timetables/search','TimeTableController@seachTimeTable');

// Route::delete('timetables/{timetableid}','TimeTableController@deleteTime');

// Route::post('levels/add','LevelController@newLevel');

// Route::delete('levels/{levelid}','TimeTableController@deleteTime');
