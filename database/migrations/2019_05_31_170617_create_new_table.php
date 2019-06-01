<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('timetable', function (Blueprint $table) {
            $table->increments('table_id');
            $table->integer('course_id')->unsigned();
            $table->string('type');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('day');
            $table->string('venue');
            $table->timestamps();

            $table->foreign('course_id')->references('course_id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timetable');
    }
}
