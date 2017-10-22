<?php

use App\Models\Course;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = Course::create([
            'title' => 'Первый тестовй курс',
            'description' => 'Описание первого тестового курса',
            'active' => true,
        ]);

        $lessons = Lesson::findMany([1,2,3,4,5,6,7,8,9,10]);
        $course->lessons()->saveMany( $lessons );
    }
}
