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


        $message = 'message message message';
//        $r = event( new ChatEvent($message) );

            dump( Config::get('app.timezone') );
        dump( Carbon::now()->timestamp);
        dump( time());

        $options = array(
            'cluster' => 'eu',
            'encrypted' => false,
            'auth_timestamp' =>  Carbon::now()->addHours(-4)->timestamp
        );
        $pusher = new \Pusher\Pusher(
            '5d4e984fb91da94cfc38',
            '3b95718a1ed621929c78',
            '428783',
            $options
        );

        dd(  $pusher->trigger( [ 'channel-1', 'channel-2' ], 'my_event', 'hello world' ) );
    }
}