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
use Illuminate\Support\Facades\Config;
use Pusher\Laravel\Facades\Pusher;

class TestController extends Controller
{

    public function index()
    {

        $from = User::find(1);
        $to = User::find(2);
        $message = 'message message message';
        $r = event( new ChatEvent($from, $to, $message) );


    }
}