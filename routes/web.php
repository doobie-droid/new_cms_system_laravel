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
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');

    Route::get('/admin/posts/create','App\Http\Controllers\PostController@create')->name('post.create');

    Route::post('/admin/posts/create','App\Http\Controllers\PostController@store')->name("post.store");

    Route::get('/post/{post}','App\Http\Controllers\PostController@show')->name('post');
});



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
