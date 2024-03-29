<?php

use Illuminate\Support\Facades\Route;

Route::put('/users/{user}/update', 'UserController@update')->name('user.profile.update');

Route::delete('/users{user}/destroy', 'UserController@destroy')->name('user.destroy');

Route::middleware('role:admin')->group(function(){

  Route::get('/users', 'UserController@index')->name('users.index');

  Route::put('/users{user}/attach', 'UserController@attach')->name('user.role.attach');

  Route::put('/users{user}/detach', 'UserController@detach')->name('user.role.detach');


});

Route::get('/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit');
                                                    /*      passing view(method from PostPolicy) and post */
