<?php
namespace App\Models\Observers;

use App\Notifications\ConfirmRegister;
use Carbon\Carbon;
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
        $credentials = [
            'created_at' => (string) Carbon::now(),
            'name' =>  $model->name,
            'email' =>  $model->email,
            'password' =>  $model->password,
        ];

        $token = $this->jwt->encode( $credentials );
        $model->notify(new ConfirmRegister( route('user.confirm', $token) ));

    }
}