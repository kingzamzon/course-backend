<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('course_id');
            $table->string('course_code');
            $table->integer('lecturer_id')->unsigned();
            $table->integer('leveld_id')->unsigned();
            $table->timestamps();

            $table->foreign('lecturer_id')->references('lecturer_id')->on('lecturers');
            $table->foreign('leveld_id')->references('leveld_id')->on('levels_department');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
