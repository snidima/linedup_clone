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

}