<?php
use Illuminate\Support\Facades\Route;


Route::get('/admin','App\Http\Controllers\RoleController@index')->name('roles.index');

Route::post('/admin/create','App\Http\Controllers\RoleController@store')->name('role.store');

Route::delete('/admin/{role}','App\Http\Controllers\RoleController@destroy')->name('role.destroy');
