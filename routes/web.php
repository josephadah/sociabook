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

Route::resource('status', 'StatusController', ['except' => ['index', 'create']]);

Route::post('status/{id}/comment', 'CommentsController@store')->name('comments.store');

Route::get('/users', 'UsersController@index')->name('users.index');

Route::get('/', 'PagesController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('follows', 'FollowsController@store')->name('follows.store');
Route::delete('follows/{id}', 'FollowsController@destroy')->name('follows.destroy');

Route::get('{username}', 'UsersController@show')->name('users.profile');


