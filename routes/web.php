<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group([ 'prefix' => 'auth' ], function () use ($router) {
    $router->post('/login', 'AuthController@authenticate');

    $router->group(['middleware' => 'db.transaction'], function() use ($router) {
        $router->post('/register', 'AuthController@register');
    });
});

$router->group([
    'middleware' => 'jwt.auth',
    'prefix' => 'api'
], function () use ($router) {
    $router->get('users', function () {
        $users = \App\User::all();
        return response()->json($users);
    });

    $router->get('/badges', 'BadgeController@index');
    $router->post('/badges', 'BadgeController@store');
    $router->get('/badges/{badgeId}', 'BadgeController@show');
    $router->put('/badges/{badgeId}', 'BadgeController@update');
    $router->delete('/badges/{badgeId}', 'BadgeController@delete');

    $router->get('/levels', 'LevelController@index');
    $router->post('/levels', 'LevelController@store');
    $router->get('/levels/{levelId}', 'LevelController@show');
    $router->put('/levels/{levelId}', 'LevelController@update');
    $router->delete('/levels/{levelId}', 'LevelController@delete');

});
