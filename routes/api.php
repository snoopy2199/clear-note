<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/user/register', 'RegisterController@register');
Route::post('/user/forget_password', 'ForgetPasswordController@forgetPassword');
Route::post('/user/update', 'UserController@updateUser');
Route::delete('/user', 'UserController@deleteUser');

Route::post('/book', 'BookshelfController@createBook');
Route::patch('/book', 'BookshelfController@updateBook');
Route::delete('/book', 'BookshelfController@deleteBook');

Route::post('/note', 'NoteController@createNote');
Route::patch('/note', 'NoteController@updateNote');
Route::delete('/note', 'NoteController@deleteNote');

Route::get('/search', 'SearchController@search');

Route::post('/trash/recover', 'TrashController@recoverTrash');
Route::delete('/trash/delete', 'TrashController@deleteTrash');

Route::post('/feedback', 'FeedbackController@writeFeedback');