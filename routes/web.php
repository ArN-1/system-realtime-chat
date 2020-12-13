<?php

use App\Events\MessagePush;
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



Auth::routes();

Route::get('/','ChatController@index')->middleware('auth');

Route::group(['prefix' => 'chats', 'middleware' => 'auth'],function(){
	Route::get('/p={username}','ChatController@ChatRoom');
  Route::get('/p={username}/messages','ChatController@getMessage');
	Route::post('/messages','ChatController@sendMessage');
});

// Route::get('/messages',function(){
// 	return App\Message::with('user')->get();
// });
//
// Route::post('/messages',function(){
// 	$user = Auth::user();
//
// 	$message = $user->messages()->create([
// 		'message' => request()->get('message'),
// 	]);
//
// 	event(new MessagePush($message,$user));
//
// 	return ['ok'];
// });
