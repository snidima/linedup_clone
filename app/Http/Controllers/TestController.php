<?php
namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Faker;

class TestController extends Controller
{

    public function index()
    {

        $course = Course::find(1);

        dd( $course );

//        dd( $course, $lessons );

    }
}