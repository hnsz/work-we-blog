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


Auth::routes();

Route::middleware(['auth'])->group(function () {
    
    Route::resource('/posts', 'PostController');
    // Route::get('/posts', 'PostController@index');
    // Route::get('/dashboard', 'DashboardController@index');
    // Route::get('posts/create', 'PostController@create');

    
});

// Route::get('posts/{post}/comments/', 'CommentController@index');
// Route::post('/posts/{post}/reply/', 'ReplyableController@reply' );




