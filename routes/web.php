<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::get('/register', 'Auth\RegisterController@register');

Route::post('/register', 'Auth\RegisterController@registerPost');





Route::get('/testmail', function(){

    $user = new \App\Models\User();
    $user = $user->create(array(
        'name' => 'test',
        'email' => rand(0,5000),
        'password' => '456654',
    ));

});