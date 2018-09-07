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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', 'SessionsController@create')->name('login');
    Route::post('/login', 'SessionsController@store');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@create')->name('home');

    Route::get('/logout', 'SessionsController@destroy');

    Route::group(['namespace' => 'Admin'], function () {

        Route::get('/users', [
            'uses' => 'UserController@index'
        ]);

        Route::get('/users/create/{id?}', [
            'as' => 'users.create',
            'uses' => 'UserController@create'
        ]);

        Route::post('/create/user', [
            'as' => 'create.user',
            'uses' => 'UserController@store'
        ]);
    });

});
