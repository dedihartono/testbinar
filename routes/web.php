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

$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->get('products', 'ProductController@index');
    // $router->get('products/{id}', 'ProductController@show');
    // $router->post('products', 'ProductController@store');
    // $router->put('products/{id}', 'ProductController@update');
    // $router->delete('products/{id}', 'ProductController@delete');
    // $router->get('categories', 'CategoryController@index');
    // $router->get('categories/{id}', 'CategoryController@show');
    // $router->post('categories', 'CategoryController@store');
    // $router->put('categories/{id}', 'CategoryController@update');
    // $router->delete('categories/{id}', 'CategoryController@delete');
});

$router->group(['prefix' => 'v2'], function () use ($router) {
    $router->get('products', 'ProductController@index');
});

