<?php
namespace App\Models\Observers;

use App\Models\Role;
use App\Notifications\ConfirmRegister;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Tymon\JWTAuth\Providers\JWT\JWTInterface;

class UserObserver
{
    private $jwt;
    public function __construct( JWTInterface $JWT )
    {
        $this->jwt = $JWT;
    }

    public function created( $model )
    {
        if( App::environment() == 'production' ){
            $credentials = [
                'created_at' => (string) Carbon::now(),
                'name' =>  $model->name,
                'email' =>  $model->email,
                'password' =>  $model->password,
            ];

            $token = $this->jwt->encode( $credentials );
            $model->notify(new ConfirmRegister( route('user.confirm', $token) ));
        } else {
            $model->activated = true;
            $model->save();
        }

        $this->relateRole( $model );

    }

    public function relateRole( $model )
    {
        $defaultRole = Role::where(['slug' => 'client'])->first();
        $model->roles()->attach( $defaultRole->id );
    }
}