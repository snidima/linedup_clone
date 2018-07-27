<?php

namespace App\Console\Commands;

use App\Models\Course;
use App\Models\RegularCourse;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;


class RegularsCoursesCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'course:create {--demo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создать курсы на новую дату';

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
        $newxtMonday = Carbon::now()->addHours(2);


        $reg = array_unique( array_map(function( $el ){
            return $el['course_id'];
        }, RegularCourse::where( 'date_start', '>=', $newxtMonday )
            ->select('course_id')
            ->get()
            ->toArray())
        );

        $demo = false;
        if( $this->option('demo') )
            $demo = true;
        $courses = Course::whereNotIn('id', $reg )
            ->where([
                'active' => true,
                'isDemo' => $demo
            ])
            ->get();
        if( !$courses ) return;

        foreach ($courses as $course) {
            $course->regular()->create([
                'date_start' => $newxtMonday,
                'price' => $course->price,
                'new_price' => $course->new_price,
            ]);
        }
    }
}
