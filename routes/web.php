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


Route::get('oferta', function(){
    return view('oferta');
})->name('oferta');




Route::get('/buy/{id}', 'BuyCourseController@index')->name('buy');

//Route::group(['prefix' => 'chat'], function() {
////    Route::post('auth', 'ChatController@auth');
//    Route::post('send-message', 'ChatController@sendMessage');
//    Route::post('get-message', 'ChatController@getMessages');
//});




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

//    Route::get('/register/vk', 'Auth\RegisterController@registerVK')->name('user.registerVK');

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



    Route::get('account/{token?}', 'UserController@account')->name('user.account');
    Route::post('accountChangePass', 'UserController@changePass')->name('user.change-password');
    Route::post('accountChangePassWithToken/{token}', 'UserController@changePassWithToken')->name('user.change-password-with-token');


    Route::group(['prefix' => 'ajax'], function() {

        Route::post('homeworks-upload', 'UserController@fileUpload');
        Route::post('homeworks-download', 'UserController@fileDownload');
        Route::post('homeworks-delete', 'UserController@fileDelete');

    });


});








