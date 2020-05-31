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

$router->group(['prefix' => 'api'], function ($router) {
    $router->get('notes/actives', 'NoteController@by_active');
    $router->get('notes/deactives', 'NoteController@by_deactive');
    $router->get('notes', 'NoteController@show_all');
    $router->get('notes/{id}', 'NoteController@by_id');
    $router->post('notes', 'NoteController@create');
    $router->options('notes/close/{id}', 'NoteController@close');
    $router->options('notes/restore/{id}', 'NoteController@restore');
    $router->put('notes/{id}', 'NoteController@update');
    $router->delete('notes/{id}', 'NoteController@delete');
});

