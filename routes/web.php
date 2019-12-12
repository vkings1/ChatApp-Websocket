<?php

use App\Events\newMessage;

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
    broadcast(new newMessage('Some data'));
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chats', 'ChatsController@index');
Route::get('/message', 'ChatsController@fetchmessage');
Route::post('/messages', 'ChatsController@sendmessage');
