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
    Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);

    // Backend
    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
        Route::get('/',        ['as' => 'home.index',   'uses' => 'HomeController@index']);
        Route::post('/signin', ['as' => 'home.signin',  'uses' => 'HomeController@signin']);
        Route::get('/signout', ['as' => 'home.signout', 'uses' => 'HomeController@signout']);

        Route::group(['middleware' => 'role.admin'], function() {
            Route::group(['prefix' => 'dashboard'], function() {
                Route::get('/', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);
            });

            Route::group(['prefix' => 'game-category'], function() {
                Route::get('/create',    ['as' => 'game_category.create', 'uses' => 'GameCategoryController@create']);
                Route::post('/store',    ['as' => 'game_category.store',  'uses' => 'GameCategoryController@store']);
                Route::get('/manage',    ['as' => 'game_category.manage', 'uses' => 'GameCategoryController@manage']);
                Route::get('/edit/{id}', ['as' => 'game_category.edit',   'uses' => 'GameCategoryController@edit']);
                Route::post('/update',   ['as' => 'game_category.update', 'uses' => 'GameCategoryController@update']);
            });

            Route::group(['prefix' => 'game'], function() {
                Route::get('/create',    ['as' => 'game.create', 'uses' => 'GameController@create']);
                Route::post('/store',    ['as' => 'game.store',  'uses' => 'GameController@store']);
                Route::get('/manage',    ['as' => 'game.manage', 'uses' => 'GameController@manage']);
                Route::get('/edit/{id}', ['as' => 'game.edit',   'uses' => 'GameController@edit']);
                Route::post('/update',   ['as' => 'game.update', 'uses' => 'GameController@update']);
            });
        });
    });
});

//
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function($api) {
    $api->group(['namespace' => 'App\Api\Version1\Controllers'], function($api) {
        $api->group(['prefix' => 'auth'], function($api) {
            $api->post('/signup',  ['as' => 'api.auth.signup',  'uses' => 'AuthController@signup']);
            $api->post('/signin',  ['as' => 'api.auth.signin',  'uses' => 'AuthController@signin']);
            $api->post('/signout', ['as' => 'api.auth.signout', 'uses' => 'AuthController@signout']);
        });

        $api->group(['prefix' => 'user', 'middleware' => 'api.auth'], function($api) {
            $api->get('/me', ['as' => 'api.user.me', 'uses' => 'UserController@me']);
        });

        $api->group(['prefix' => 'game'], function($api) {
            $api->get('/all',       ['as' => 'api.game.all',   'uses' => 'GameController@all']);
            $api->get('/show/{id}', ['as' => 'api.game.show',  'uses' => 'GameController@show']);
        });

        $api->group(['prefix' => 'game-topic'], function($api) {
            $api->get('/all',       ['as' => 'api.game.topic.all',  'uses' => 'GameTopicController@all']);
            $api->get('/show/{id}', ['as' => 'api.game.topic.show', 'uses' => 'GameTopicController@show']);

            $api->group(['middleware' => 'api.auth'], function($api) {
                $api->post('/store', ['as' => 'api.game.topic.store', 'uses' => 'GameTopicController@store']);
            });
        });

        $api->group(['prefix' => 'game-topic-comment'], function($api) {
            $api->get('/all', ['as' => 'api.game.topic.comment.all',  'uses' => 'GameTopicCommentController@all']);

            $api->group(['middleware' => 'api.auth'], function($api) {
                $api->post('/store', ['as' => 'api.game.topic.comment.store', 'uses' => 'GameTopicCommentController@store']);
            });
        });
    });
});
