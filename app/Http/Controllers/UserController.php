<?php
namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Homework;
use App\Models\PromoCodes;
use App\Models\RegularCourse;
use App\Models\TmpFiles;
use App\Models\User;
use Carbon\Carbon;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {

        //Оплаченные регулярные и статические курсы
        $payed = Auth::user()->billings()->with('regular')->get();
        $payedCourses = $payed->pluck('regular.course_id')->toArray();
        $payedRegulars = $payed->pluck('regular.id')->toArray();


        //созданные курсы, не включающие купленные статические курсы
        $new = RegularCourse::where('date_start', '>', Carbon::now()->toDateTimeString())
            ->whereNotIn( 'course_id', $payedCourses )
            ->get()->pluck('id')->toArray();

        $payed = RegularCourse::whereIn('id', $payedRegulars)->get()->pluck('id')->toArray();

        $demo = RegularCourse::whereHas('course', function($q){
            $q->where('isDemo', true);
        })->get()->pluck('id')->toArray();






        $courses = RegularCourse::whereIn('id', array_unique(array_merge([],$new,$payed,$demo)))->get();



        //todo дописать логику при оплате. Проверить промокод, курс и т.д.
        //todo считает, что в таблицу billing попадают полностью оплаченные заказы
        //todo если не хватает средств, неичего не пишем в эту таблицу
//
        return view('user.main', ['courses'=>$courses]);
    }


    public function course( $id )
    {
        return view('user.course');
    }

    public function courseInfo()
    {
        $billings = Auth::user()->billings()->where('amount', '>', 0)->with(['course', 'promoCode', 'course.course',
            'course.course.lessons' => function($q){
                $q->orderBy('id','asc');
            }
        ])->get();



        //Взять все оплаченные за раз курсы
        $courses = $billings->filter(function( $billing ){
            $amount = $billing->amount;
            $price = $billing->course->finalPrice;
            $needPrice = $price;
            if( $billing->promoCode ){
                $sale = $billing->promoCode->value;

                $needPrice = $price - ( $price * $sale / 100 );
            }
            return ( $amount>= $needPrice );
        })->transform(function( $billing ){
            $billing->course->course->lessons->transform(function($lesson, $key) use( $billing ){
                $lessonSlice = $billing->course->course->lessons->slice( 0, $key )->sum('duration');
                $date_end = Carbon::parse($billing->course->date_start)->addDays( $lessonSlice + $lesson->duration );
                $current = Carbon::now() > $date_end;
                $lesson['was'] = $current;
                $lesson['date_end'] = $date_end;
                $lesson['date_start'] = Carbon::parse($billing->course->date_start)->addDays( $lessonSlice );
                $lesson['now'] = ( Carbon::now() <= $date_end ) && ( Carbon::now() >= Carbon::parse($billing->course->date_start)->addDays( $lessonSlice ) );
                return $lesson;
            });
            return $billing->course;
        });

        if( !count($courses) ) return response('', 404);
        return $courses;
    }


    public function fileDownload( Request $request )
    {

        try {
            $file = Homework::where('user_id', Auth::user()->id)
                ->where('course_id', $request->input('courseID') )
                ->where('lesson_id', $request->input('lessonID') )->first();

            if( !$file ) throw new \Exception('404');

            return $file;

        } catch ( \Exception $e ) {
            return response()->json(['error' => 'not founf'], 404);
        }

    }


    public function fileDelete( Request $request )
    {
        $file = Homework::find( $request->input('id') );
        $res = Storage::disk('homeworks')->delete($file->path);
        if ( $res ) {
            $file->delete();
            response()->json(['success' => 'success'], 200);
        }
    }

    public function fileUpload( Request $request )
    {
        $courseID = $request->input('courseID');
        $lessonID = $request->input('lessonID');

        $file = $request->file('homeworkFile');
        $ext = $file->getClientOriginalExtension();
        $originName = $file->getClientOriginalName();

        $newName = Auth::user()->id . '_' . $courseID . '_' . $lessonID . '_' . uniqid().'.'.$ext;



        $file = Homework::create([
            'user_id' => Auth::user()->id,
            'course_id' => $courseID,
            'lesson_id' => $lessonID,
            'path' => $newName,
            'origin_name' => $originName,
        ]);


        if( $file ) {
            Storage::disk('homeworks')->put($newName, 'awfawf');
            return response()->json(['success' => 'success', 'file' => $file], 200);
        }



    }

    public function userCheck()
    {   $user = Auth::user();

        if( $user )
            return response()->json( Auth::user()->id );
        else
            return response()->json( false );
    }


    public function lesson( $courseID, $lessonID )
    {
        $regular = RegularCourse::where('id',$courseID)->with([
            'course',
            'course.lessons' => function($q){
                $q->orderBy('id','asc');
            }
        ])->first();


        //начала и окончания каждого урока
        $regular->course->lessons->transform(function ( $lesson, $key ) use( $regular ){
            $lessonSlice = $regular->course->lessons->slice( 0, $key )->sum('duration');
            $date_end = Carbon::parse($regular->date_start)->addDays( $lessonSlice + $lesson->duration );
            $current = Carbon::now() > $date_end;
            $lesson['was'] = $current;
            $lesson['date_end'] = $date_end;
            $lesson['date_start'] = Carbon::parse($regular->date_start)->addDays( $lessonSlice );
            $lesson['now'] = ( Carbon::now() >= $lesson['date_start'] && Carbon::now() <= $lesson['date_end'] );
            $lesson['indays'] =  Carbon::now()->diffInDays( $lesson['date_end'], false );
            return $lesson;
        });



        return view('user.course', [
            'regular' => $regular,
            'lesson' => $regular->course->lessons->get( $lessonID-1 ),
            'prevLesson' => $regular->course->lessons->get( $lessonID-2 ),
            'nextLesson' => $regular->course->lessons->get( $lessonID ),
            'lessonID' => $lessonID,
            'courseID' => $courseID
        ]);

    }


}