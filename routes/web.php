<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('post', '\App\Http\Controllers\PostController@create')->name('post.create');
Route::post('post', '\App\Http\Controllers\PostController@store')->name('post.store');
Route::get('/posts', '\App\Http\Controllers\PostController@index')->name('posts');
Route::get('/article/{post:slug}', '\App\Http\Controllers\PostController@show')->name('post.show');
Route::post('/reply/store', '\App\Http\Controllers\CommentController@replyStore')->name('reply.add');