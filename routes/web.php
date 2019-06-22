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

$router->get('/foo', function (){
    return 'Hello world';
});

$router->post(
        'auth/login',
        ['uses' => 'AuthController@authenticate']
    );

    $router->group(
        ['middleware' => 'jwt.auth'],
        function() use ($router) {
            $router->get('users', function() {
                $users = \App\User::all();
                return response()->json($users);
            });
        }
    );

    $router->group(
        ['middleware' => 'jwt.auth'],
        function() use ($router) {
            $router->get('products', function() {
                $products = \App\Product::all();
                return response()->json($products);
            });
        }
    );

    $router->group(['prefix' => 'api'], function () use ($router) {
    //product route
    $router->get('products', 'ProductController@index');
    $router->get('products/{id}', 'ProductController@show');
    $router->post('products', 'ProductController@store');
    $router->put('products/{id}', 'ProductController@update');
    $router->delete('products/{id}', 'ProductController@delete');

    });
