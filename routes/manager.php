<?php

Route::get('/clients', 'Admin\Manager\IndexController@clients')->name('admin.manager.clients');
Route::get('/client/{id}', 'Admin\Manager\IndexController@client')->name('admin.manager.client');