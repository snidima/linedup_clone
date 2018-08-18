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

    public function registerVK(Request $request)
    {
        $scope = [
            'notify' => 1,
            'status' => 1024,
            'email' => 4194304,
        ];

        $selectedScope = [
            $scope['notify'],
            $scope['status'],
            $scope['email'],
        ];

        if( $request->input('code') ){

            $q = http_build_query([
                'client_id' => 6658848,
                'client_secret' => 'hsItWC8jdrovy9TUgkTl',
                'redirect_uri' => route('user.registerVK'),
                'code' => $request->input('code')
            ]);
            $url = 'https://oauth.vk.com/access_token?'. $q;

            try{

                $res = json_decode( file_get_contents( $url ) );




                $q = http_build_query([
                    'user_ids' => $res->user_id,
                    'access_token' => $res->access_token,
                    'v' => 5.80,
                    'fields' => implode(',',[
                        'about',
                        'activities',
                        'bdate',
                        'blacklisted',
                        'blacklisted_by_me',
                        'books',
                        'can_post',
                        'can_see_all_posts',
                        'can_see_audio',
                        'can_send_friend_request',
                        'can_write_private_message',
                        'career',
                        'city',
                        'common_count',
                        'connections',
                        'contacts',
                        'counters',
                        'country',
                        'crop_photo',
                        'domain',
                        'education',
                        'exports',
                        'followers_count',
                        'friend_status',
                        'games',
                        'has_mobile',
                        'has_photo',
                        'home_town',
                        'interests',
                        'is_favorite',
                        'is_friend',
                        'is_hidden_from_feed',
                        'last_seen',
                        'lists',
                    ])
                ]);

                $url = "https://api.vk.com/method/users.get?$q";

                $res = json_decode( file_get_contents( $url ) );

                dd( $res );

            } catch ( \Exception $e ) {
                return redirect(route('user.registerVK'));
            }






        } else {
            $q = http_build_query([
                'client_id' => 6658848,
                'redirect_uri' => route('user.registerVK'),
                'response_type' => 'code',
                'display' =>'page',
                'v' => '5.80',
                'revoke' => 1,
                'scope' => array_sum( $selectedScope )
            ]);

            $url = 'https://oauth.vk.com/authorize?'. $q;
            return "<a href='$url'>enter</a>";
        }



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