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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'LoginController@index')->name('login-form');
    Route::post('check-login', 'LoginController@checkLogin')->name('check-login');
    Route::get('log-out', 'LoginController@logOut')->name('log-out');
    Route::middleware('check.login')->group(function () {
        Route::resource('user', 'UserController');
    });
});
