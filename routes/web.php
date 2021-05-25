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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/rooms', 'RoomController@index')->name('rooms.index');
Route::get('/rooms/search', 'RoomController@search')->name('rooms.search');
Route::get('/rooms/create', 'RoomController@create')->name('rooms.create');
Route::post('/rooms', 'RoomController@store')->name('rooms.store');
Route::get('/rooms/{room}', 'RoomController@show')->name('rooms.show');

Route::resource('chats', 'ChatController');

Route::get('/chat/like/{id}', 'ChatController@like')->name('chat.like');
Route::get('/chat/unlike/{id}', 'ChatController@unlike')->name('chat.unlike');