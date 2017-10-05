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
        $start = Carbon::now();
        $end = Carbon::now()->addDays(5);

        $course = Course::create([
            'title' => 'Первый тестовй курс',
            'description' => 'Описание первого тестового курса',
            'date_start' => $start,
            'date_end' => $end,
            'active' => true,
        ]);

        $lessons = Lesson::find(1);
        $course->lessons()->save( $lessons, [
            'date_start' => $start,
            'date_end' => $end,
        ]);
    }
}
