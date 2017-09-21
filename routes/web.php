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
})->name('main');





Route::group(['middleware' => 'guest'], function(){


    Route::get('/register', 'Auth\RegisterController@register');
    Route::post('/register', 'Auth\RegisterController@registerPost')->name('register');

    Route::get('/login', 'Auth\LoginController@index')->name('login');

    Route::get('/register/confirm/{token}', 'Auth\RegisterController@confirm')->name('user.confirm');

});







Route::group(['middleware' => ['auth'], 'prefix' => 'user'], function(){

    Route::get('/', 'UserController@index')->name('user.index');

});









Route::get('test-view', function(){
    return view('test-view');
});