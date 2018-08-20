<?php

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/', 'Admin\Administrator\IndexController@index');


Route::get('loginby/{id}', function ($id){
    \Illuminate\Support\Facades\Auth::loginUsingId($id);

    return 'Login by '. \Illuminate\Support\Facades\Auth::user()->email;
});


Route::group(['prefix' => 'ajax'], function(){


    Route::post('lessons', 'Admin\Administrator\LessonController@index');
    Route::get('lesson/{id}', 'Admin\Administrator\LessonController@lesson');
    Route::post('lesson/{id}', 'Admin\Administrator\LessonController@lessonSave');
    Route::post('lesson-insert', 'Admin\Administrator\LessonController@lessonInsert');
    Route::delete('lesson-delete/{id}', 'Admin\Administrator\LessonController@lessonDelete');

    Route::post('courses', 'Admin\Administrator\CourseController@index');
    Route::get('course/{id}', 'Admin\Administrator\CourseController@lesson');
    Route::post('course/{id}', 'Admin\Administrator\CourseController@lessonSave');
    Route::post('course-insert', 'Admin\Administrator\CourseController@lessonInsert');
    Route::delete('course-delete/{id}', 'Admin\Administrator\CourseController@lessonDelete');



    Route::get('course-composition', 'Admin\Administrator\CourseCompositionController@index');
    Route::post('course-composition-save', 'Admin\Administrator\CourseCompositionController@save');





});