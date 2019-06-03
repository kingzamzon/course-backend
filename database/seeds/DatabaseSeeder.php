<?php

use App\Course;
use App\LevelD;
use App\Student;
use App\Lecturer;
use App\Timetable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');

    	LevelD::truncate();
    	Student::truncate();
    	Lecturer::truncate();
       	Course::truncate();
       	Timetable::truncate();

       	$levelsQuantity = 10;
       	$studentsQuantity = 10;
       	$LecturersQuantity = 5;
       	$coursesQuantity = 4;
       	$TimetableQuantity = 6;

       	factory(LevelD::class, $levelsQuantity)->create();

       	factory(Student::class, $studentsQuantity)->create();

       	factory(Lecturer::class, $LecturersQuantity)->create();

       	factory(Course::class, $coursesQuantity)->create();

       	factory(Timetable::class, $TimetableQuantity)->create();
    }
}
