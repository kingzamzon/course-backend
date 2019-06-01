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
Route::resource('courses', 'Course\CourseController', ['except' => ['create', 'edit']]);
/*
* Timetables
*/
Route::resource('timetables', 'Timetable\TimetableController', ['except' => ['create', 'edit']]);
/*
* Courses
*/
Route::resource('levels', 'LevelD\LevelDController', ['except' => ['create', 'edit']]);


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
