<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Providers\JWT\JWTInterface;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{

    public function register(Request $request)
    {
        return view('auth.register');
    }

    public function registerPost( Request $request )
    {

        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users',
            'password' => 'required|max:100|min:3',
            'name' => 'required|max:100|min:3'
        ])->validate();
        
        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);
        $user ->save();


        return response()->json([
            'success' => true,
            'redirect' => route('user.login')
        ], 200);
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

        return redirect( route('user.main') );

    }

    public function confirmFailed()
    {
        return redirect( route('main') );
    }
}