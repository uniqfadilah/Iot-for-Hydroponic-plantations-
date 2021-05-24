<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/lux/{greenhouse}','simulasiController@createlux');
Route::post('/arduino/{greenhouse}','simulasiController@arduino');
Route::get('/arduino/{greenhouse}','simulasiController@getdata');