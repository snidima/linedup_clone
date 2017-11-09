<?php
namespace App\Http\Controllers;


use App\Events\ChatEvent;
use App\Models\Course;
use App\Models\Lesson;

use App\Models\RegularCourse;
use App\Models\TmpFiles;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Faker;

class TestController extends Controller
{

    public function index()
    {

        $to = User::find(5);
        $from = User::find(1);
        $message = 'message message message';
        $r = event( new ChatEvent($to, $from, $message) );

        dd($r);


    }
}