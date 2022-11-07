<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/',  'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function (){
    Route::get('admin/users/{user}/profile', 'App\Http\Controllers\UserController@show')->name('user.profile.show');

    Route::get('admin/users','App\Http\Controllers\UserController@index')->name('users.index');

    Route::delete('admin/user/{user}/destroy','App\Http\Controllers\UserController@destroy')->name('user.destroy');

    Route::put('admin/users/{user}/update','App\Http\Controllers\UserController@update')->name('user.profile.update');

    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');

    Route::get('/admin/posts', 'App\Http\Controllers\PostController@index')->name('post.index');

    Route::patch('/admin/posts/{post}/update','App\Http\Controllers\PostController@update')->name('post.update');

    Route::delete('/admin/posts/{post}','App\Http\Controllers\PostController@destroy')->name('post.destroy');

    Route::get('admin/posts/{post}/edit','App\Http\Controllers\PostController@edit')->middleware('can:view,post')->name('post.edit');

    Route::get('/admin/posts/create','App\Http\Controllers\PostController@create')->name('post.create');

    Route::post('/admin/posts/create','App\Http\Controllers\PostController@store')->name("post.store");

    Route::get('/post/{post}','App\Http\Controllers\PostController@show')->name('post');
});



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
