<?php
namespace App\Http\Controllers;



use App\Models\Course;
use App\Models\RegularCourse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{

    public function index()
    {
        $courses = RegularCourse::all();

        return view('index', [ 'courses' => $courses ]);
    }


}