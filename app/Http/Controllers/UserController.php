<?php
namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\PromoCodes;
use App\Models\TmpFiles;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        return view('user.main');
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

//    public function fileUpload( Request $request )
//    {
//        $file = $request->file('file');
//        $title = $file->getClientOriginalName();
//        $ext = $file->getClientOriginalExtension();
//
//        $path = storage_path().'/tmp_files/';
//        $name = uniqid(rand(), true).".$ext";
//
//        $user_id = Auth::user()->id;
//        $tmp_file = new TmpFiles;
//
//        $tmp_file->user_id = $user_id;
//        $tmp_file->path = $name;
//        $tmp_file->title = $title;
//
//        $tmp_file->save();
//
//
//
//        if( $file->move($path, $name) )
//            return response()->json( $tmp_file->id );
//
//    }

    public function userCheck()
    {   $user = Auth::user();

        if( $user )
            return response()->json( Auth::user()->id );
        else
            return response()->json( false );
    }
}