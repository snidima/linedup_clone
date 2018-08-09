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





Route::get('/', 'IndexController@index')->name('main');




Route::get('/buy/{id}', 'BuyCourseController@index')->name('buy');

Route::group(['prefix' => 'chat'], function() {
//    Route::post('auth', 'ChatController@auth');
    Route::post('send-message', 'ChatController@sendMessage');
    Route::post('get-message', 'ChatController@getMessages');
});




Route::group(['prefix' => 'ajax', 'middleware' => 'throttle'], function() {
    Route::get('user-check', 'UserController@userCheck');
    Route::post('promo-code-check', 'PromoController@check');
    Route::post('order-create', 'OrderController@create');
});


Route::group(['prefix' => 'payment-reception', 'middleware' => 'throttle'], function() {
    Route::post('yandex', 'PaymentReception@yandex');
});






Route::group(['middleware' => 'guest'], function(){
    //USER REGISTER
    Route::get('/register', 'Auth\RegisterController@register');
    Route::post('/register', 'Auth\RegisterController@registerPost')->name('user.register');

    //USER LOGIN
    Route::get('/login', 'Auth\LoginController@index')->name('user.login');
    Route::post('/login', 'Auth\LoginController@loginPost');

    //USER CONFIRM
    Route::get('/register/confirm/{token}', 'Auth\RegisterController@confirm')->name('user.confirm');

    //FORGET PASS
    Route::post('/login/forget', 'Auth\ForgetController@sendToEmail');
    Route::get('/login/forget/{token}', 'Auth\ForgetController@checkToken')->name('forget-pass');
});
//USER LOGOUT
Route::get('/user-quit', 'Auth\LoginController@quit')->name('user.quit');






Route::group(['middleware' => ['auth'], 'prefix' => 'user'], function(){

    Route::get('/', 'UserController@index')->name('user.main');


    Route::get('course/{id}', 'UserController@course')->name('user.course');
    Route::get('course-{id}/lesson-{id_lesson}', 'UserController@lesson')->name('user.lesson');
    Route::get('homework-download/course-{id}/lesson-{id_lesson}', 'UserController@homeworkDownload')->name('user.homework');



    Route::get('account', 'UserController@account')->name('user.account');





    Route::group(['prefix' => 'ajax'], function() {

//        Route::post('course-info', 'UserController@courseInfo');
        Route::post('homeworks-upload', 'UserController@fileUpload');
        Route::post('homeworks-download', 'UserController@fileDownload');
        Route::post('homeworks-delete', 'UserController@fileDelete');

    });


});




Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function(){

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::get('homeworks', 'Admin\HomeworkController@index')->name('admin.homeworks');
    Route::get('homework/{id}', 'Admin\HomeworkController@get')->name('admin.homework.get');
    Route::post('homework/{id}', 'Admin\HomeworkController@post')->name('admin.homework.post');


    Route::get('/', 'Admin\MainController@index');

    Route::group(['prefix' => 'ajax'], function(){


        Route::post('lessons', 'Admin\LessonController@index');
        Route::get('lesson/{id}', 'Admin\LessonController@lesson');
        Route::post('lesson/{id}', 'Admin\LessonController@lessonSave');
        Route::post('lesson-insert', 'Admin\LessonController@lessonInsert');
        Route::delete('lesson-delete/{id}', 'Admin\LessonController@lessonDelete');

        Route::post('courses', 'Admin\CourseController@index');
        Route::get('course/{id}', 'Admin\CourseController@lesson');
        Route::post('course/{id}', 'Admin\CourseController@lessonSave');
        Route::post('course-insert', 'Admin\CourseController@lessonInsert');
        Route::delete('course-delete/{id}', 'Admin\CourseController@lessonDelete');



        Route::get('course-composition', 'Admin\CourseCompositionController@index');
        Route::post('course-composition-save', 'Admin\CourseCompositionController@save');


    });



});



Route::get('test', 'TestController@index');


