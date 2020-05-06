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

$router->get('/getnotes','NoteController@getNote');
$router->post('/addnotes','NoteController@addNote');
$router->post('/updatenotes/{id}','NoteController@updateNote');
$router->get('/deletenotes/{id}','NoteController@deleteNote');
