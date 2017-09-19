<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ConfirmRegister;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;


class RegisterController extends Controller
{
    public function register()
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

        $user->notify(new ConfirmRegister('segsegeg'));


        return $request->all();
    }
}