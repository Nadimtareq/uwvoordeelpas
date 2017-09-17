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

Route::get('/', function () {
    return view('welcome');
});
Route::get('version', function(){
$laravel = app();
return "Your Laravel version is ".$laravel::VERSION;
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Satyendra
Route::post('send-sms','HomeController@send_sms');
Route::get('count-sms','HomeController@count');
Route::post('call-no','HomeController@call_no');
Route::post('push-sms','HomeController@push_sms');
Route::any('multi-sms','HomeController@multi_sms');
Route::any('createMessage/{phone}/{msg}','HomeController@createMessage');
