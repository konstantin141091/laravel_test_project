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

Route::get('/', 'IndexController@index')->name('index');
Route::resource('news', 'NewsController');
Route::resource('category', 'CategoriesController');

//admin
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'is_admin']
//    'namespace' => 'Admin'
], function () {
    Route::get('/', 'Admin\IndexController@index')->name('index');
    Route::get('/news', 'NewsController@adminNews')->name('news');
    Route::resource('profiles', 'Admin\ProfilesController')->except('show', 'create', 'destroy', 'store');
});

// auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
