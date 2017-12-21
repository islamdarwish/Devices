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

Route::prefix('devices')->group(function (){
    Route::get('/','DevicesController@index')->name('devices.index');
    Route::post('/','DevicesController@create')->name('devices.create');
    Route::put('{device}','DevicesController@update')->name('devices.update');
    Route::delete('{device}','DevicesController@delete')->name('devices.delete');
});
