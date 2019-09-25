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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/posts', 'DashboardController@post')->name('posts');
Route::get('/dashboard/projects', 'DashboardController@project');
Route::get('/dashboard/careers', 'DashboardController@career');

Auth::routes([ 'register' => false ]);

Route::resource('posts', 'PostController');
Route::resource('projects', 'ProjectController', ['except' => ['index']]);
Route::resource('careers', 'CareerController', ['except' => ['index', 'show']]);

Route::get('/category/{id}', 'PostController@category')->name('category');
Route::resource('categories', 'CategoryController', ['except' => ['create']]);
