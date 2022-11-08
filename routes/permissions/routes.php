<?php
use Illuminate\Support\Facades\Route;


Route::get('/admin','App\Http\Controllers\PermissionController@index')->name('permissions.index');
