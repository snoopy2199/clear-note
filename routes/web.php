<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::pattern('id', '[0-9]+');

Route::get('/', 'BookshelfController@showBookshelf');

Route::get('/user_active/{id}/{token}', 'RegisterController@activateUser');
Route::get('/forget_password/{id}/{token}', 'ForgetPasswordController@showResetPassword');

Route::get('/note/{note_hash}', 'NoteController@showNote');

Route::get('/trash', 'TrashController@showTrash');

Route::get('/setting', 'UserController@showSetting');

Route::get('/about', function () {
    return view('about');
});

Route::get('/help', 'HelpController@showHelps');
Route::get('/help/{id}/{title?}', 'HelpController@showHelp');