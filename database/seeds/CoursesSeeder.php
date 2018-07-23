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
            'title' => 'Adobe After Effect - Базовый',
            'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов.',
            'active' => true,
            'isDemo' => false,
            'price' => 1250.00,
            'new_price' => 100.00,
        ]);

        $lessons = Lesson::findMany([1,2,3,4,5,6,7,8,9,10]);
        $course->lessons()->saveMany( $lessons );

        $course = Course::create([
            'title' => 'Adobe After Effect - Базовый(Демо)',
            'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов.',
            'active' => true,
            'isDemo' => true,
            'price' => 0,
            'new_price' => 0,
        ]);

        $lessons = Lesson::findMany([1]);
        $course->lessons()->saveMany( $lessons );


//        $course = Course::create([
//            'title' => 'Adobe After Effect. Расширенный',
//            'description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов.<br>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. ',
//            'active' => true,
//            'price' => 200.00,
//            'new_price' => null,
//        ]);
//
//        $lessons = Lesson::findMany([1,2,3,4,5,6,7,8,9,10]);
//        $course->lessons()->saveMany( $lessons );
    }
}
