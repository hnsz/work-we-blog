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

Route::view('/', 'std.slash');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('posts/create', 'PostController@create');
    //  POST: /posts, redir create with flashdata
});
Route::resource('/posts', 'PostController');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('posts/{post}/comments/', 'CommentController@index');

Auth::routes();


