<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');

$router->get('/users', 'UserController@index');
$router->get('/users/edit/(\d+)', 'UserController@edit');
$router->post('/users/edit/(\d+)', 'UserController@edit');
$router->get('/users/delete/(\d+)', 'UserController@delete');
$router->get('/user/id/(\d+)', 'UserController@getPlaylistsByUser');
$router->get('/users/create', 'UserController@create');
$router->post('/users/create', 'UserController@create');

