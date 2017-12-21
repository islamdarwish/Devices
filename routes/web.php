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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('logout',function (){
    Auth::logout();
    return redirect('/');
});

Route::prefix('devices')->group(function () {
    Route::get("/", "DevicesController@indexView")->name('devices.index-view');
    Route::get("create", "DevicesController@createView")->name('devices.create-view');
    Route::get("edit/{device}", "DevicesController@editView")->name('devices.edit-view');;
    Route::get("{device}", "DevicesController@showView")->name('devices.show-view');;
});