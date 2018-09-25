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




$router->group(['middleware' => 'auth'], function () use ($router) {
 	$router->get('clients',  ['uses' => 'ClientController@index']);
 	$router->post('clients', ['uses' => 'ClientController@store']);
 	$router->get('clients/{id}', ['uses' => 'ClientController@show']);
 	$router->put('clients/{id}', ['uses' => 'ClientController@update']);
 	$router->delete('clients/{id}', ['uses' => 'ClientController@destroy']);
});





$router->group(['middleware' => 'auth'], function () use ($router) {
 	$router->get('users',  ['uses' => 'UsersController@index']);
 	$router->post('users', ['uses' => 'UsersController@store']);
 	$router->get('users/{id}', ['uses' => 'UsersController@show']);
 	$router->put('users/{id}', ['uses' => 'UsersController@update']);
 	$router->delete('users/{id}', ['uses' => 'UsersController@destroy']);
});

$router->group(['middleware' => 'auth'], function () use ($router) {
 	$router->get('userMobileNumbers',  ['uses' => 'UserMobileNumberController@index']);
 	$router->post('userMobileNumbers', ['uses' => 'UserMobileNumberController@store']);
 	$router->get('userMobileNumbers/{id}', ['uses' => 'UserMobileNumberController@show']);
 	$router->put('userMobileNumbers/{id}', ['uses' => 'UserMobileNumberController@update']);
 	$router->delete('userMobileNumbers/{id}', ['uses' => 'UserMobileNumberController@destroy']);
});






/*

$router->group(['middleware' => 'auth'], function () use ($router) {
 	$router->get('products',  ['uses' => 'ProductsController@index']);
 	$router->get('products/{id}', ['uses' => 'ProductsController@show']);
 	$router->put('products/{id}', ['uses' => 'ProductsController@update']);
 	$router->post('products', ['uses' => 'ProductsController@store']);
 	$router->delete('products/{id}', ['uses' => 'ProductsController@destroy']);

});




$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('authors',  ['uses' => 'AuthorController@showAllAuthors']);

    $router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);

    $router->post('authors', ['uses' => 'AuthorController@create']);

    $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);

    $router->put('authors/{id}', ['uses' => 'AuthorController@update']);
});
*/


