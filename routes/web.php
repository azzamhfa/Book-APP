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

$router->get('/key', function(){
    return str_random(32);
});

$router->get('/books', 'BookController@index');
$router->get('/books/{id}', 'BookController@indexById');
$router->post('/books', 'BookController@store');
$router->put('/books/{id}', 'BookController@update');
$router->delete('/books/{id}', 'BookController@destroy');

$router->get('/authors', 'AuthorsController@index');
$router->get('/authors/{id}', 'AuthorsController@indexById');
$router->post('/authors', 'AuthorsController@store');
$router->put('/authors/{id}', 'AuthorsController@update');
$router->delete('/authors/{id}', 'AuthorsController@destroy');

