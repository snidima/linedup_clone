<?php
namespace App\Http\Controllers\Auth;

use App\Events\ForgetPassEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ForgetPassNotify;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Providers\JWT\JWTInterface;


class ForgetController extends Controller
{

    public function sendToEmail( Request $request, JWTInterface $JWT )
    {

        $user = User::where('email',$request->input('email'))->where('activated', true)->first();



        if( !$user ) return response('', 404);

        $credentials = [
            'created_at' => (string) Carbon::now(),
            'email' =>  $request->input('email'),
        ];
        $token = $JWT->encode( $credentials );

        $user->notify( new ForgetPassNotify( $token ) );

        return response('', 200);
    }


    public function checkToken( $token, JWTInterface $jwt )
    {
        try {
            $credentials = $jwt->decode( $token );
        } catch( JWTException $exception ){
            return redirect( route('main') );
        }

        $ttl = env('FORGET_EMAIL_TTL');
        $dateCreated = Carbon::parse( $credentials['created_at'] );
        $dateNow = Carbon::now();
        $diff = $dateNow->diffInMinutes( $dateCreated );

        if( $diff > $ttl )
            return redirect( route('main') );

        $user = User::where(array_only( $credentials, ['email'] ))->first();

        Auth::login( $user );

        return redirect(route('user.account', ['token' => $token]));

    }


}