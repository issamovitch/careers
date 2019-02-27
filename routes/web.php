<?php

Auth::routes();

Route::post('/add', 'HomeController@add')->name("add");

Route::get('/', 'HomeController@index')->name('front');

Route::get('/home', 'HomeController@home')->name('home');

Route::get('/users', 'HomeController@users')->name('users');
Route::get('/add_user', 'HomeController@add_user')->name('add_user');
Route::post('/save_user', 'HomeController@save_user')->name('save_user');
Route::get('/edit_user/{id?}', 'HomeController@edit_user')->name('edit_user');
Route::post('/update_user', 'HomeController@update_user')->name('update_user');
Route::get('/delete_user/{id?}', 'HomeController@delete_user')->name('delete_user');


Route::get('/fields', 'HomeController@fields')->name('fields');
Route::get('/fields/add', 'HomeController@fields_add')->name('fields_add');
Route::post('/fields/save', 'HomeController@fields_save')->name('fields_save');
Route::get('/fields/edit/{id}', 'HomeController@fields_edit')->name('fields_edit');
Route::post('/fields/update', 'HomeController@fields_update')->name('fields_update');
Route::get('/fields/delete/{id}', 'HomeController@fields_delete')->name('fields_delete');


Route::get('/sub/index', 'HomeController@subs')->name('subs');
Route::get('/sub/show/{id}', 'HomeController@show_sub')->name('show_sub');
Route::get('/sub/delete/{id}', 'HomeController@delete_sub')->name('delete_sub');
Route::get('/sub/nominate/{id}', 'HomeController@nominate')->name('nominate');
Route::get('/sub/unnominate/{id}', 'HomeController@unnominate')->name('unnominate');
Route::get('/sub/denominate/{id}', 'HomeController@denominate')->name('denominate');
Route::get('/sub/undenominate/{id}', 'HomeController@undenominate')->name('undenominate');
Route::post('/sub/save_note/{id}', 'HomeController@save_note')->name('save_note');
Route::get('/sub/edit/{id}', 'HomeController@edit_sub')->name('edit_sub');
Route::post('/sub/update/{id}', 'HomeController@update_sub')->name('update_sub');
Route::post('/sub/export', 'HomeController@export')->name('export');
Route::post('/sub/export2', 'HomeController@export2')->name('export2');


Route::get('/settings', 'SettingsController@index')->name('settings');
Route::post('/save_settings1', 'SettingsController@save_settings1')->name('save_settings1');
Route::post('/save_settings2', 'SettingsController@save_settings2')->name('save_settings2');
Route::post('/save_job', 'SettingsController@save_job')->name('save_job');
Route::post('/update_job', 'SettingsController@update_job')->name('update_job');
Route::get('/delete_job/{id}', 'SettingsController@delete_job')->name('delete_job');
