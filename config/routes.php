<?php

use App\Controllers\UsersController;


$routes->add('get', '/', function() {
    return "Index";
});

$routes->add('get', '/projects', function() {
    return "Projetos";
});

$routes->add('get','/users/(\d+)', 'App\Controllers\UsersController::show');