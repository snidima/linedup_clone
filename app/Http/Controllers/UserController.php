<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        return view('user.main');
    }

    public function courseInfo()
    {
        $courses = Course::with('lessons')->get();
        return $courses;
    }
}