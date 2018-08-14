<?php
namespace App\Http\Controllers\Admin\Administrator;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;



class CourseCompositionController extends AdminController
{

    public function index()
    {
        $lessons = Lesson::all();
        $courses = Course::with(['lessons'=>function($q){
            $q->orderBy('course_lesson.id', 'asc');
        }])->get();

        $res = [
            'lessons' => $lessons,
            'courses' => $courses,
        ];



        return response()->json( $res );
    }

    public function save( Request $request )
    {
        $courses = $request->input('courses');

        foreach ($courses as $course){
            $_course = Course::find($course['id']);
            $_course->lessons()->detach();
            foreach ($course['lessons'] as $lesson){
                $_lesson = Lesson::find($lesson['id']);
                $_course->lessons()->save( $_lesson );

            }
        }
        return response()->json();
    }

}