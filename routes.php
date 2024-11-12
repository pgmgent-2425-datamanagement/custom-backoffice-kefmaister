<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');

// user routes
$router->get('/users', 'UserController@index');
$router->get('/users/edit/(\d+)', 'UserController@edit');
$router->post('/users/edit/(\d+)', 'UserController@edit');
$router->get('/users/delete/(\d+)', 'UserController@delete');
$router->get('/users/create', 'UserController@create');
$router->post('/users/create', 'UserController@create');
//user playlists routes
$router->get('/user/id/(\d+)', 'UserController@getPlaylistsByUser');

//videos routes
$router->get('/video', 'VideoController@index');
$router->get('/videos/create', 'VideoController@create');
$router->post('/videos/create', 'VideoController@create');
$router->get('/videos/edit/(\d+)', 'VideoController@edit');
$router->post('/videos/edit/(\d+)', 'VideoController@edit');
$router->get('/videos/delete/(\d+)', 'VideoController@delete');
$router->get('/videos/view/(\d+)', 'VideoController@find');

//playlist routes
$router->get('/playlists', 'PlaylistController@index');
$router->get('/playlists/create', 'PlaylistController@create');
$router->post('/playlists/create', 'PlaylistController@create');
$router->get('/playlists/edit/(\d+)', 'PlaylistController@edit');
$router->post('/playlists/edit/(\d+)', 'PlaylistController@edit');
$router->get('/playlist/delete/(\d+)', 'PlaylistController@delete');
$router->get('/playlist/view/(\d+)', 'PlaylistController@find');
$router->post('/playlist/add-video', 'PlaylistController@addVideo'); // New route for adding video
$router->get('/playlist/remove-video/(\d+)/(\d+)', 'PlaylistController@removeVideo'); // New route for removing video



//comments routes
$router->post('/comments/create', 'CommentController@create');

// file manager
$router->get('/files', 'FileManagerController@index');

$router->post('/files/delete', 'FileManagerController@delete');