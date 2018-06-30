<?php

$router->add('get', '/', function() {
    return "Index";
});

$router->add('get','/users', 'App\Controllers\UsersController::index');
$router->add('get','/users/(\d+)', 'App\Controllers\UsersController::show');
$router->add('post','/users', 'App\Controllers\UsersController::create');
$router->add('put','/users/(\d+)', 'App\Controllers\UsersController::update');
$router->add('delete','/users/(\d+)', 'App\Controllers\UsersController::delete');