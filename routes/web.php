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
  Route::patch('/admin/posts/{post}/update', 'PostController@update')->name('post.update');

  Route::get('/admin/posts/index', 'PostController@index')->name('post.index');
  Route::get('/admin/posts/create', 'PostController@create')->name('post.create');
  Route::post('/admin/posts', 'PostController@store')->name('post.store');
  Route::delete('/admin/posts/{post}/destroy', 'PostController@destroy')->name('post.destroy');




});