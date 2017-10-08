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
    //USER REGISTER
    Route::get('/register', 'Auth\RegisterController@register');
    Route::post('/register', 'Auth\RegisterController@registerPost')->name('user.register');

    //USER LOGIN
    Route::get('/login', 'Auth\LoginController@index')->name('user.login');
    Route::post('/login', 'Auth\LoginController@loginPost');

    //USER CONFIRM
    Route::get('/register/confirm/{token}', 'Auth\RegisterController@confirm')->name('user.confirm');
});
//USER LOGOUT
Route::get('/user-quit', 'Auth\LoginController@quit')->name('user.quit');






Route::group(['middleware' => ['auth'], 'prefix' => 'user'], function(){

    Route::get('/', 'UserController@index')->name('user.main');

});





Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function(){

    Route::get('{vue_capture?}', 'Admin\MainController@index')->where('vue_capture', '[\/\w\.-]*');

    Route::group(['prefix' => 'ajax'], function(){


        Route::post('lessons', 'Admin\LessonController@index');
        Route::get('lesson/{id}', 'Admin\LessonController@lesson');
        Route::post('lesson/{id}', 'Admin\LessonController@lessonSave');
        Route::put('lessoninsert', 'Admin\LessonController@lessonInsert');


    });



});



Route::get('test', 'TestController@index');


