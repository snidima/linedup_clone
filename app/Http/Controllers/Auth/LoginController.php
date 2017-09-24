<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ])->validate();

        dd( $request->all() );
    }
}