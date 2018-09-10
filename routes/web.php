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

        Route::get('/users/show/{$id}','UserController@show');

        Route::get('/users/create/{id?}', [
            'as' => 'users.create',
            'uses' => 'UserController@create'
        ]);

        Route::post('/create/user', [
            'as' => 'create.user',
            'uses' => 'UserController@store'
        ]);

        Route::get('api/users', [
            'uses' => 'UserController@getUsers'
        ]);

        //roles
        Route::get('/roles', [
            'as' => 'roles',
            'uses' => 'RoleController@index'
        ]);

        Route::get('/roles/create/{id?}', [
            'as' => 'roles.create',
            'uses' => 'RoleController@create'
        ]);

        Route::post('/roles/store/{id?}', [
            'as' => 'roles.store',
            'uses' => 'RoleController@store'
        ]);

        Route::get('/roles/show/{id}',['uses' => 'RoleController@show']);

        Route::get('api/roles', [
            'uses' => 'RoleController@getRoles'
        ]);

        Route::get('/roles/permissions/{id}', [
            'as' => 'roles.permissions',
            'uses' => 'RoleController@permissions'
        ]);

        Route::post('/roles/permissions/{id}', [
            'as' => 'roles.permissions',
            'uses' => 'RoleController@editPermissions'
        ]);
    });

    Route::group(['namespace' => 'Book'], function () {
        Route::post('api/book', [
            'uses' => 'BookController@store'
        ]);
        Route::get('api/books', [
            'uses' => 'BookController@index'
        ]);
        Route::get('api/book/{id}', [
            'uses' => 'BookController@show'
        ]);
    });
});

Route::get('{vue_capture?}', function () {
    if (!\Illuminate\Support\Facades\Auth::user()) {
        return redirect('/login');
    }
    return view('dashboard.index');
})->where('vue_capture', '[\/\w\.-]*');
