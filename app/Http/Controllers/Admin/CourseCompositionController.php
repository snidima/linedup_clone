<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CourseCompositionController extends AdminController
{

    public function index()
    {
        $lessons = Lesson::all();
        $courses = Course::with('lessons')->get();

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
                $_course->lessons()->save( $_lesson, [
                    'date_start' => Carbon::parse($lesson['pivot']['date_start']),
                    'date_end' => Carbon::parse($lesson['pivot']['date_end']),
                ]);

            }
        }
        return response()->json();
    }

}