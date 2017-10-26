<?php

namespace App\Console\Commands;

use App\Models\Course;
use App\Models\RegularCourse;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'tet Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $newxtMonday = Carbon::now()->startOfWeek()->addWeek(1);

        $reg = array_unique( array_map(function( $el ){
            return $el['course_id'];
        }, RegularCourse::where( 'date_start', '>=', $newxtMonday )->select('course_id')->get()->toArray()) );

        $courses = Course::whereNotIn('id', $reg )->where(['active' => true])->get();
        if( !$courses ) return;

        foreach ($courses as $course) {

            $course->regular()->create([
                'date_start' => $newxtMonday
            ]);
        }
    }
}
