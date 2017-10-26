<?php
namespace App\Http\Controllers;



use App\Models\Course;
use Carbon\Carbon;


class IndexController extends Controller
{

    public function index()
    {
        $coursesCount = 2;

        $newxtMonday = Carbon::now()->startOfWeek()->addWeek(1);
        $seconds = $newxtMonday->diffInSeconds(Carbon::now());


        $courses = Course::with(['regular'=>function($q){
            $q->orderBy( 'date_start', 'desc' );
        }])->with('lessons')->take($coursesCount)->get();


        Carbon::setLocale('ru');


        return view('index', [ 'seconds' => $seconds, 'courses' => $courses ]);
    }


}