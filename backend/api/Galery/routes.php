<?php

/** @var \Illuminate\Routing\Router $router */
$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('/galery', 'GaleryController@getAll');
    $router->get('/galery/{id}', 'GaleryController@getById');
    $router->post('/galery', 'GaleryController@create');
    $router->post('/galery/{id}', 'GaleryController@update');
});
$router->delete('/galery/{id}', 'GaleryController@delete');

