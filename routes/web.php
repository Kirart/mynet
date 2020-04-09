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
    return view('main');
})->name('main');

Route::match(['get', 'post'], '/home', 'HomeController@index')->name('home');


Route::match(['get', 'post'], '/login', 'Auth\AuthController@login')->name('login');
Route::match(['get', 'post'], '/register', 'Auth\RegisterController@register')->name('register');
Route::get('auth/logout', 'Auth\AuthController@logout')->name('logout');
