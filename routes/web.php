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
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin.index');

Route::get('/post','App\Http\Controllers\PostController@show')->name('post');
Route::get('/', function(){
    return view('home');
})->name('home');





//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
