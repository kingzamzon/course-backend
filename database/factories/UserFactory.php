<?php

use App\Course;
use App\LevelD;
use App\Student;
use App\Lecturer;
use App\Timetable;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(LevelD::class, function (Faker $faker) {
    return [
        'level' => $faker->randomElement([100,200,300,400]),
        'department' => $faker->randomElement(['csc','geo','masscom','maths']),
        'faculty' => $faker->randomElement(['science','education','law']),
    ];
});

$factory->define(Student::class, function (Faker $faker) {
    return [
        'username' => $faker->word,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'leveld_id' => LevelD::all()->random()->leveld_id,
    ];
});

$factory->define(Lecturer::class, function (Faker $faker) {
    return [
        'username' => $faker->word,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
    ];
});

$factory->define(Course::class, function (Faker $faker) {
    return [
        'course_code' => $faker->randomElement(['csc101', 'csc201', 'agr101']),
        'lecturer_id' => Lecturer::all()->random()->lecturer_id,
        'leveld_id' => LevelD::all()->random()->leveld_id,
    ];
});

$factory->define(Timetable::class, function (Faker $faker) {
    return [
        'course_id' => Course::all()->random()->course_id,
        'type' => $faker->randomElement(['Emergency','Test','Fixed Class']),
        'start_time' => $faker->randomElement(['2:30pm','7:00AM','4:00PM']),
        'end_time' => $faker->randomElement(['8:00PM', '2:00AM', '7:00PM']),
        'day' => $faker->randomElement(['Monday','Tuesday','Thursday']),
        'venue' => $faker->randomElement(['AWO','INTACON','ETF750']),
    ];
});


