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

$router->get('/', 'ExampleController@index');

$router->post('auth/signup', 'AuthController@signup');
$router->post('auth/login', 'AuthController@authenticate');

$router->group(['prefix' => 'v1', 'middleware' => 'jwt.auth'], function () use ($router) {
    $router->get('products', 'ProductController@index');
    $router->get('products/{id}', 'ProductController@show');
    $router->post('products', 'ProductController@store');
    $router->put('products/{id}', 'ProductController@update');
    $router->delete('products/{id}', 'ProductController@delete');
});

$router->group(['prefix' => 'v2'], function () use ($router) {
    $router->get('products', 'ProductController@index');
});
