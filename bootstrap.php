<?php
use SON\Framework\Exceptions\HttpException;
use SON\Framework\Router;

require __DIR__.'/vendor/autoload.php';

$routes = new Router;

$routes->add('get', '/', function(){
    return "Index";
});

$routes->add('get', '/projects', function(){
    return "Projetos";
});

$routes->add('post','/projects/(\d+)', function($params){
    return "Projeto";
});

try {
    echo $routes->run();
} catch (HttpException $e) {
    echo json_encode(['error' => $e->getMessage(), "code" => $e->getCode()]);
}