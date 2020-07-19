<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('country/{valute_id}/{from}/{to}', 'CountryController@country')->name('get_country');
