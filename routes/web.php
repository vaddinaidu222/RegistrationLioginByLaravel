<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// as i am using browser i kept the all requests as get otherwise some are post,put,delete
Route::get('/posts', [App\Http\Controllers\PostController::class, 'store_post'])->middleware('auth'); // post
Route::get('/posts/{post_id}', [App\Http\Controllers\PostController::class, 'update_post'])->middleware('auth'); // put
Route::get('/posts/destroy/{post_id}', [App\Http\Controllers\PostController::class, 'destroy_post'])->middleware('auth'); // delete
Route::get('/posts/{post_id}/comments', [App\Http\Controllers\CommentController::class, 'store_comment'])->middleware('auth'); // post
Route::get('/comments/update/{comment_id}', [App\Http\Controllers\CommentController::class, 'update_comment'])->middleware('auth'); // put
Route::get('/comments/destroy/{comment}', [App\Http\Controllers\CommentController::class, 'destroy_comment'])->middleware('auth'); // delete

