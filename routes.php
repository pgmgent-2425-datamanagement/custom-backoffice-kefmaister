<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');

$router->get('/users', 'UserController@index');
$router->get('/users/edit/(\d+)', 'UserController@find');
$router->post('/users/edit', 'UserController@update');