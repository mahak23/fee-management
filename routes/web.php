<?php

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

Route::namespace('School')->name('school.')->group(function () {
    // Login
    Route::get('/', 'AuthController@showLoginForm')->name('login');
    Route::post('/', 'AuthController@login');

    Route::middleware('school')->group(function () {
        // Dashboard
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        // Logout
        Route::get('logout', 'AuthController@logout')->name('logout');
    });
});
