<?php
namespace App\Http\Controllers;



use Carbon\Carbon;


class IndexController extends Controller
{

    public function index()
    {

        $newxtMonday = Carbon::now()->startOfWeek()->addWeek(1);
        $seconds = $newxtMonday->diffInSeconds(Carbon::now());
        return view('index', [ 'seconds' => $seconds ]);
    }


}