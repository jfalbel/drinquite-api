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

$router->get('/key',function(){
    return str_random(32);
});

//Metodos usuarios

$router->post('/users/login',['uses' => 'UsersController@getToken']);

$router->group(['middleware' => 'auth'], function() use ($router){
    $router->get('/users',['uses' => 'UsersController@index']);
    $router->post('/users',['uses' => 'UsersController@create']);
});

$router->group(['prefix' => 'api'], function() use ($router){});

//Metodos preguntas
$router->get('/preguntas/list',['uses' => 'PreguntasController@listPregunta']);
$router->get('/preguntas/set',['uses' => 'PreguntasController@setPregunta']);
$router->post('/preguntas',['uses' => 'PreguntasController@setPregunta']);
//$router->post('/preguntas',['uses' => 'PreguntasController@index']);

//Metodos Lanzamientos
$router->get('/lanzamientos',['uses' => 'LanzamientosController@get']);
$router->post('/lanzamientos',['uses' => 'LanzamientosController@set']);