<?php

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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::get('/post{post}', 'PostController@show')->name('post');

Route::get('/logout', 'HomeController@logout');


Route::middleware('auth')->group(function(){

  Route::get('/admin', 'AdminsController@index')->name('admin.index');


/*   Route::get('/admin/posts/index', 'PostController@index')->name('post.index');
  Route::get('/admin/posts/create', 'PostController@create')->name('post.create');
  Route::post('/admin/posts', 'PostController@store')->name('post.store');



  Route::delete('/admin/posts/{post}/destroy', 'PostController@destroy')->name('post.destroy');
  Route::patch('/admin/posts/{post}/update', 'PostController@update')->name('post.update');

  Route::get('/admin/users/{user}/profile', 'UserController@show')->name('user.profile.show');
  Route::put('/admin/users/{user}/update', 'UserController@update')->name('user.profile.update');


  Route::delete('/admin/users{user}/destroy', 'UserController@destroy')->name('user.destroy'); */



});

/*    Route::middleware('role:admin')->group(function(){

   Route::get('/admin/users', 'UserController@index')->name('users.index');


});

Route::get('/admin/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit'); */
                                                     /*      passing view(method from PostPolicy) and post */
