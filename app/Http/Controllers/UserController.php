<?php
namespace App\Http\Controllers;


use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        return view('user.main');
    }

    public function courseInfo()
    {
        $now = Carbon::now();

        $courses = Course::
            where('date_start', '<=', $now)
            ->where('date_end', '>=', $now)
            ->where('active', true)
            ->with('lessons')->first();
        return $courses;
    }
}