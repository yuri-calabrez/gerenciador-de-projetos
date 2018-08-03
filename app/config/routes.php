<?php

$router->add('get', '/', function() {
    return file_get_contents(__DIR__.'/../../template/index.html');
});

$router->add('POST','/auth/register', 'App\Controllers\UsersController::register');
$router->add('POST','/auth/token', 'App\Controllers\UsersController::getToken');
$router->add('GET','/api/me', 'App\Controllers\UsersController::getCurrentUser');