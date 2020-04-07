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

$router->get("key", "Book@key");

// Book Routes
$router->get("books", "Book@show");
$router->group(["prefix" => "book"], function () use ($router) {
    $router->get("{id}", "Book@getBook");
    $router->post("insert", "Book@store");
    $router->post("update/{id}", "Book@update");
    $router->delete("delete/{id}", "Book@delete");
});
