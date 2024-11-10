<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');

// user routes
$router->get('/users', 'UserController@index');
$router->get('/users/edit_user/(\d+)', 'UserController@edit');
$router->post('/users/edit_user/(\d+)', 'UserController@edit');
$router->get('/users/delete/(\d+)', 'UserController@delete');
$router->get('/users/create', 'UserController@create');
$router->post('/users/create', 'UserController@create');
//user playlists routes
$router->get('/user/id/(\d+)', 'UserController@getPlaylistsByUser');

//videos routes
$router->get('/videos', 'VideoController@index');
$router->get('/videos/create', 'VideoController@create');
$router->post('/videos/create', 'VideoController@create');
$router->get('/videos/edit/(\d+)', 'VideoController@edit');
$router->post('/videos/edit/(\d+)', 'VideoController@edit');
$router->get('/videos/delete/(\d+)', 'VideoController@delete');
$router->get('/videos/view/(\d+)', 'VideoController@find');

