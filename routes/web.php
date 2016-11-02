<?php

/* Guests Routes */
Route::get('/', 'PagesController@index')->name('pages.index');
Route::get('posts/{slug}', 'PagesController@show')->name('pages.show');

/* Auth Routes */
Route::get(
    'login',
    '\App\Http\Controllers\Auth\LoginController@showLoginForm'
)->name('auth.login');

Route::post(
    'login',
    '\App\Http\Controllers\Auth\LoginController@login'
)->name('auth.login');

Route::post(
    'logout',
    '\App\Http\Controllers\Auth\LoginController@logout'
)->name('auth.logout');

/* Admin Routes */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'PostController@index')->name('admin.home');
    Route::resource('posts', 'PostController');
});