<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Faker;

class TestController extends Controller
{

    public function index()
    {
        $faker = Faker\Factory::create();

        dd(App::environment());
    }
}