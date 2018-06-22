<?php
use SON\Framework\Exceptions\HttpException;
use SON\Framework\Router;
use SON\Framework\Response;

require __DIR__.'/vendor/autoload.php';

$routes = new Router;

require __DIR__.'./config/containers.php';
require __DIR__.'./config/routes.php';

try {
    $result = $routes->run();
    $response = new Response;
    $params = [
        'container' => $container,
        'params' => $result['params']
    ];
    $response($result['action'], $params);
} catch (HttpException $e) {
    echo json_encode(['error' => $e->getMessage(), "code" => $e->getCode()]);
}