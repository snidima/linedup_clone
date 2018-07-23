<?php
namespace App\Http\Controllers;



use App\Models\Course;
use Carbon\Carbon;


class IndexController extends Controller
{

    public function index()
    {




        $courses = Course::with(['regular'=>function($q){
            $q->orderBy( 'date_start', 'desc' );
        }])->with('lessons')->get();





        return view('index', [ 'courses' => $courses ]);
    }


}