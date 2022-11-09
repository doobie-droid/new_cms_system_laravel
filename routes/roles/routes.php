<?php
use Illuminate\Support\Facades\Route;


Route::get('/admin','App\Http\Controllers\RoleController@index')->name('roles.index');

Route::get('/admin/{role}','App\Http\Controllers\RoleController@edit')->name('role.edit');

Route::put('/admin/{role}','App\Http\Controllers\RoleController@update')->name('role.update');

Route::post('/admin/create','App\Http\Controllers\RoleController@store')->name('role.store');

Route::delete('/admin/{role}','App\Http\Controllers\RoleController@destroy')->name('role.destroy');


