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
    return view('home');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/posts', 'DashboardController@post');
Route::get('/dashboard/projects', 'DashboardController@project');
Route::get('/dashboard/careers', 'DashboardController@career');

Auth::routes([ 'register' => false ]);

Route::resource('projects', 'ProjectController');
Route::resource('posts', 'PostController');
Route::resource('careers', 'CareerController');

Route::get('/category/{id}', 'PostController@category')->name('category');
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
