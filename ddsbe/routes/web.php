<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => 'api'], function($router) {
    $router->get('users', 'userController@showUsers');

    $router->get('users/{id}', 'userController@showUser');

    $router->post('users', 'userController@addUser');

    $router->delete('users/{id}', 'userController@deleteUser');

    $router->patch('/users/{id}', 'userController@updateUser');
});