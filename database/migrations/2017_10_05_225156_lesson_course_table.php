<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LessonCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_course', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lesson_id');
            $table->string('course_id');
            $table->timestamp('date_start');
            $table->timestamp('date_end');
            $table->unique(['lesson_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_course');
    }
}
