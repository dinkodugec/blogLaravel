<?php

use Illuminate\Support\Facades\Route;

Route::get('/post{post}', 'PostController@show')->name('post');

Route::get('/posts/index', 'PostController@index')->name('post.index');
Route::get('/posts/create', 'PostController@create')->name('post.create');
Route::post('/posts', 'PostController@store')->name('post.store');



Route::delete('/posts/{post}/destroy', 'PostController@destroy')->name('post.destroy');
Route::patch('/posts/{post}/update', 'PostController@update')->name('post.update');

Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
Route::put('/users/{user}/update', 'UserController@update')->name('user.profile.update');


Route::delete('/users{user}/destroy', 'UserController@destroy')->name('user.destroy');
