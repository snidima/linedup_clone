<?php
namespace App\Http\Controllers;



use App\Models\Course;
use App\Models\RegularCourse;
use Carbon\Carbon;


class BuyCourseController extends Controller
{

    public function index( $id )
    {
        $course = RegularCourse::with(['course'=>function( $q ){
            $q->with('lessons');
        }])->find($id);

        return view('buy-course', ['regular' => $course]);
    }


}