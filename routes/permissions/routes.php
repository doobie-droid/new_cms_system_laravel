<?php
use Illuminate\Support\Facades\Route;


Route::get('/admin','App\Http\Controllers\PermissionController@index')->name('permissions.index');

Route::get('/admin/{permission}','App\Http\Controllers\PermissionController@edit')->name('permission.edit');

Route::put('/admin/{permission}','App\Http\Controllers\PermissionController@update')->name('permission.update');

Route::post('/admin/create','App\Http\Controllers\PermissionController@store')->name('permission.store');

Route::delete('/admin/{permission}','App\Http\Controllers\PermissionController@destroy')->name('permission.destroy');

Route::patch('/admin/{role}/attach','App\Http\Controllers\PermissionController@attach')->name('permission.attach');

Route::delete('/admin/{role}/detach','App\Http\Controllers\PermissionController@detach')->name('permission.detach');
