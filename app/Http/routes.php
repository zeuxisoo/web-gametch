<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['as' => 'web.'], function() {

    // Frontend
    Route::get('/', function () {
        return view('welcome');
    });

    // Backend
    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
        Route::get('/',        ['as' => 'home.index',   'uses' => 'HomeController@index']);
        Route::post('/signin', ['as' => 'home.signin',  'uses' => 'HomeController@signin']);
        Route::get('/signout', ['as' => 'home.signout', 'uses' => 'HomeController@signout']);

        Route::group(['middleware' => 'role.admin'], function() {
            Route::group(['prefix' => 'dashboard'], function() {
                Route::get('/', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);
            });
        });
    });
});
