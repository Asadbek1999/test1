<?php

use Illuminate\Support\Facades\Http;
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
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/parse1', 'CurencyController@parse1')->name('parse1');
Route::get('/parse2', 'CurencyController@parse2')->name('parse2');
Route::get('/get_country', 'CountryController@get_country')->name('get_country');

Auth::routes();
