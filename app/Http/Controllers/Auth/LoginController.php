<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{

    public function index()
    {

        return view('auth.login');
    }

    public function loginPost(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|max:100|min:3',
        ])->validate();

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'activated' => true], $request->input('remember'))) {
            return response()->json([
                'redirect' => route('user.main')
            ]);
        } else{
            return response()->json([
                'commonError' => 'Не верные данные'
            ], 401);
        }
    }

    public function quit()
    {
        Auth::logout();
        return redirect(route('main'));
    }
}