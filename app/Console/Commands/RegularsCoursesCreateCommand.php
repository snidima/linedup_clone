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
        $newxtMonday = Carbon::now()->startOfWeek()->addWeek(1);


        $reg = RegularCourse::where( 'date_start', '>=', Carbon::now())->get();

        if( $reg ) return 'Все курсы( '.count($reg).' ) уже созданы на '.$newxtMonday->toDateString();

        $courses = Course::where([
                'active' => true
            ])
            ->get();

        if( !$courses ) return 'Нет курсов для создания!';

        foreach ($courses as $course) {
            $course->regular()->create([
                'date_start' => $newxtMonday,
                'price' => $course->price,
                'new_price' => $course->new_price,
            ]);
        }
    }
}
