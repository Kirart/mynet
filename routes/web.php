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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::match(['get', 'post'], '/login', 'Auth\AuthController@login')->name('login');

Route::match(['get', 'post'], '/register', 'Auth\RegisterController@register')->name('register');


//Route::get('auth/login', 'Auth\AuthController@getLogin')->name('login');
Route::get('auth/logout', 'Auth\AuthController@logout')->name('logout');
//Route::get('auth/logout', 'Auth\AuthController@getLogout');
//
//// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');
