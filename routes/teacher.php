<?php



Route::get('homeworks', 'Admin\Teacher\HomeworksController@index')->name('admin.homeworks');

Route::get('homework/{id}', 'Admin\Teacher\HomeworksController@detail ')->name('admin.homework.get');

Route::post('homework/{id}', 'Admin\Teacher\HomeworksController@post')->name('admin.homework.post');

