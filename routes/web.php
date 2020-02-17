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

use App\Http\Controllers\PostController;
use Illuminate\Routing\RouteGroup;

Route::view('/home', 'slash');
Route::view('/', 'slash');
Route::get('/logout', function () {Auth::logout(); return redirect('/home');});
Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::resource('/posts', 'PostController');
    Route::resource('/dashboard', 'DashboardController'); 
});

    
    

// Route::get('posts/{post}/comments/', 'CommentController@index');
// Route::post('/posts/{post}/reply/', 'ReplyableController@reply' );




