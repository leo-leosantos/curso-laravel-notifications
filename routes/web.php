<?php

use Illuminate\Support\Facades\Broadcast;
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
Broadcast::routes();
$this->put('notification-read', 'NotificationController@markAsRead');
$this->put('notification-all-read', 'NotificationController@markAllAsRead');

$this->get('notifications', 'NotificationController@notifications')->name('notifications');



Route::resource('posts', 'Posts\PostController');
$this->post('comment', 'Posts\CommentController@store')->name('comment.store');

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




