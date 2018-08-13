<?php
namespace App\Http\Controllers;


use App\Models\Billing;
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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Providers\JWT\JWTInterface;

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
            ->whereHas('course', function ($q){
                $q->where('isDemo', false);
            })
            ->get()->pluck('id')->toArray();

        $payed = RegularCourse::whereIn('id', $payedRegulars)->get()->pluck('id')->toArray();




        $demoCourses = Course::where('isDemo', true)->groupBy('id')->get()->pluck('id')->toArray();


        $demo = RegularCourse::where('date_start', '>',Carbon::now()->toDateTimeString())
            ->whereIn('course_id', $demoCourses)->orderBy('date_start','DESC')->first()->id;


//        $demo = RegularCourse::select(['id','course_id'])->where('date_start', '>',Carbon::now()->toDateTimeString())->whereHas('course', function($q){
//            $q->where('isDemo', true);
//        })->get()->pluck('id')->toArray();





        $courses = RegularCourse::whereIn('id', array_unique(array_merge([],$new,$payed,[$demo])))->get();



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
        $youtubeLink = $request->input('youtubeLink');

        $homework = Homework::where('user_id', Auth::id())->where('course_id', $courseID)->where('lesson_id',$lessonID )->first();

        $data = [
            'user_id' => Auth::user()->id,
            'course_id' => $courseID,
            'lesson_id' => $lessonID,
            'youtube_link' => $youtubeLink,
        ];

        if( $homework ){
            $homework->update( $data );
            return $homework;
        } else {
            return Homework::create( $data );
        }





//        $file = $request->file('homeworkFile');
//        $ext = $file->getClientOriginalExtension();
//        $originName = $file->getClientOriginalName();
//
//        $newName = Auth::user()->id . '_' . $courseID . '_' . $lessonID . '_' . uniqid().'.'.$ext;
//
//
//
//        $file = Homework::create([
//            'user_id' => Auth::user()->id,
//            'course_id' => $courseID,
//            'lesson_id' => $lessonID,
//            'path' => $newName,
//            'origin_name' => $originName,
//        ]);
//
//
//        if( $file ) {
//            Storage::disk('homeworks')->put($newName, 'awfawf');
//            return response()->json(['success' => 'success', 'file' => $file], 200);
//        }



    }

    public function homeworkDownload( $idcourse, $idlesson )
    {
        $youtubeLink = Homework::where('user_id', Auth::id())->where('course_id', $idcourse)->where('lesson_id',$idlesson )->first();

        if( $youtubeLink )
            return response()->json([
                'success' => 'success',
                'youtubeLink' => $youtubeLink->youtube_link
            ], 200);
        else
            return false;
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
        $isDemo = RegularCourse::where('id',$courseID)->first();

        if( $isDemo->finalPrice > 0 ){

            $billings = Billing::where( 'user_id', Auth::id() )->where('course_id', $courseID)->first();

            if( !$billings )
                return view('user.course-access-deny');

        }



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

//        dd($regular->course->lessons->get( $lessonID-1 ), $regular->course->lessons->get( $lessonID ));

        return view('user.course', [
            'regular' => $regular,
            'lesson' => $regular->course->lessons->get( $lessonID-1 ),
            'prevLesson' => $regular->course->lessons->get( $lessonID-2 ),
            'nextLesson' => $regular->course->lessons->get( $lessonID ),
            'lessonID' => $lessonID,
            'courseID' => $courseID,
            'homework' => Homework::where('user_id', Auth::id())->where('lesson_id', $lessonID )->where('course_id', $courseID)->first()
        ]);

    }

    public function account($token = null, JWTInterface $jwt)
    {
        if( !$token ) return view('user.account', ['token' => $token]);

        try {
            $credentials = $jwt->decode( $token );
        } catch( JWTException $exception ){
            return redirect( route('user.account', ['token' => null]) );
        }

        $ttl = env('FORGET_EMAIL_TTL');
        $dateCreated = Carbon::parse( $credentials['created_at'] );
        $dateNow = Carbon::now();
        $diff = $dateNow->diffInMinutes( $dateCreated );

        if( $diff > $ttl )
            return redirect( route('user.account', ['token' => null]) );

        $user = User::where(array_only( $credentials, ['email'] ))->first();

        if( !$user )return redirect( route('user.account', ['token' => null]) );



        return view('user.account', ['token' => $token]);

    }

    public function changePass(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'current_password' => 'bail|required',
            'new_password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('user.account'))
                ->withErrors($validator)
                ->withInput();
        }

        if( $request->input('current_password') == $request->input('new_password') ){
            $validator->getMessageBag()->add('current_password', 'Текущий пароль и новый пароль совпадают');
            return redirect(route('user.account'))->withErrors($validator);
        }

         if( Hash::check($request->input('current_password'), Auth::user()->getAuthPassword()) ){

             Auth::user()->password = $request->input('new_password');
             Auth::user()->save();

             return redirect(route('user.account'))->with('alert', 'Пароль успешно изменен');

         } else {
             $validator->getMessageBag()->add('current_password', 'Неверный пароль');
             return redirect(route('user.account'))->withErrors($validator);
         }

    }

    public function changePassWithToken( $token, Request $request, JWTInterface $jwt )
    {
        $validator = Validator::make($request->all(), [
            'new_password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect(route('user.account', ['token'=>$token]))
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $credentials = $jwt->decode( $token );
        } catch( JWTException $exception ){
            return redirect( route('user.account', ['token' => null]) );
        }

        $ttl = env('FORGET_EMAIL_TTL');
        $dateCreated = Carbon::parse( $credentials['created_at'] );
        $dateNow = Carbon::now();
        $diff = $dateNow->diffInMinutes( $dateCreated );

        if( $diff > $ttl )
            return redirect( route('user.account', ['token' => null]) );

        $user = User::where(array_only( $credentials, ['email'] ))->first();

        if( !$user )return redirect( route('user.account', ['token' => null]) );

        Auth::user()->password = $request->input('new_password');
        Auth::user()->save();

        return redirect(route('user.account', ['token' => null]))->with('alert', 'Пароль успешно изменен');

    }


}