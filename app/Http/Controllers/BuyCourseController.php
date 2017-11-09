<?php
namespace App\Http\Controllers;



use App\Models\Course;
use App\Models\RegularCourse;
use Carbon\Carbon;


class BuyCourseController extends Controller
{

    public function index( $id )
    {
        $course = RegularCourse::where('id',$id)->with(['course'=>function( $q ){
            $q->with('lessons');
        }])->first();


        return view('buy-course', ['regular' => $course]);
    }


}