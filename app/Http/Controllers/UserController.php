<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        dd('hello', Auth::user()->name);
    }
}