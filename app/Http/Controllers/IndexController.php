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
        if( Auth::check() ){

            //Оплаченные регулярные и статические курсы
            $payed = Auth::user()->billings()->with('regular')->get();
            $payedCourses = $payed->pluck('regular.course_id')->toArray();
            $payedRegulars = $payed->pluck('regular.id')->toArray();


            //созданные курсы, не включающие купленные статические курсы
            $new = RegularCourse::where('date_start', '>', Carbon::now()->toDateTimeString())
                ->whereNotIn( 'course_id', $payedCourses )
                ->whereHas('course', function($q){ $q->where('isDemo', false); })
                ->get()->pluck('id')->toArray();

            $payed = RegularCourse::whereIn('id', $payedRegulars)->get()->pluck('id')->toArray();


            $demo = Course::where('isDemo', true)->with(
                [
                    'regular' => function($q){
                        $q->orderBy('date_start', 'DESC');
                    },

                ]
            )->get()->transform(function($el){
                return $el->regular->get(0)->id;
            })->toArray();





            $courses = RegularCourse::whereIn('id', array_unique(array_merge([],$new,$payed,$demo)))->get();

        } else {

            $courses = RegularCourse::where('date_start', '>', Carbon::now()->toDateTimeString())
                ->get();
        }


        $lessons = Course::where('id',1)->with(['lessons'=>function($q){
            $q->orderBy('course_lesson.id', 'asc');
        }])->first()->lessons;

        return view('index', [ 'courses' => $courses, 'lessons' => $lessons ]);
    }


}