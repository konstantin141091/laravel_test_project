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

//main page
Route::get('/', 'IndexController@index')->name('index');
//news
Route::resource('news', 'News\NewsController')->only(['index', 'show']);
//category
Route::resource('category', 'Categories\CategoriesController')->only(['index', 'show']);
//parser
Route::get('/parser', 'Parser\ParserController@index')->name('parser');
Route::post('/parser/save', 'Parser\ParserController@save')->name('parser.save');
Route::get('/parser/all', 'Parser\ParserController@all')->name('parser.all');


// auth
Route::group([
    'namespace' => 'Auth'
], function() {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register');
    Route::get('/auth/vk', 'SocialController@login')->name('vk.login');
    Route::get('/auth/vk/callback', 'SocialController@callback')->name('vk.callback');
    Route::get('/auth/fb', 'SocialController@loginVK')->name('vk.login');
    Route::get('/auth/fb/callback', 'SocialController@callbackVK')->name('vk.callback');
});




Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('profile', 'Profiles\ProfilesController@index')->name('profile.index');

    //admin
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => ['is_admin'],
        'namespace' => 'Admin'
    ], function () {
        Route::get('/', 'IndexController@index')->name('index');
        Route::resource('news', 'NewsController');
        Route::resource('category', 'CategoriesController');
        Route::resource('profiles', 'ProfilesController')
            ->except('show', 'create', 'destroy', 'store');
        Route::resource('resources', 'ParseResourcesController')->except('show');

    });
});





//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
