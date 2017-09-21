<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ConfirmRegister;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Mockery\Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Providers\JWT\JWTInterface;


class RegisterController extends Controller
{

    public function register(Request $request)
    {
        return view('register');
    }

    public function registerPost( Request $request )
    {
        $user = new User();
        $user = $user->create(array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ));

        return $request->all();
    }

    public function confirm( $token, JWTInterface $jwt )
    {
        try {
            $credentials = $jwt->decode( $token );
        } catch( JWTException $exception ){
            return $this->confirmFailed();
        }

        $ttl = config('jwt.mail-confirm-ttl');
        $dateCreated = Carbon::parse( $credentials['created_at'] );
        $dateNow = Carbon::now();
        $diff = $dateNow->diffInMinutes( $dateCreated );

        if( $diff > $ttl )
            return $this->confirmFailed();

        $user = User::where(array_only( $credentials, ['name', 'email', 'password'] ))->first();

        if( !$user ) return $this->confirmFailed();
        if(  $user->activated ) return $this->confirmFailed();


        $user->activated = true;
        $user->save();

        Auth::login($user, true);

        return redirect( route('user.index') );

//        dd( $r );

    }

    public function confirmFailed()
    {
        return redirect( route('main') );
    }
}