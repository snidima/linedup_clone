<?php

Route::get('/clients', 'Admin\Manager\IndexController@clients')->name('admin.manager.clients');
Route::get('/client/{id}', 'Admin\Manager\IndexController@client')->name('admin.manager.client');

Route::get('/billings', 'Admin\Manager\IndexController@billings')->name('admin.manager.billings');
Route::get('/billing/{id}', 'Admin\Manager\IndexController@billing')->name('admin.manager.billing');
Route::post('/billing/{id}', 'Admin\Manager\IndexController@billingPost')->name('admin.manager.billing.post');

Route::get('/newbilling', 'Admin\Manager\IndexController@billingAdd')->name('admin.manager.billing.add');
Route::post('/newbilling', 'Admin\Manager\IndexController@billingAddPost')->name('admin.manager.billing.add.post');